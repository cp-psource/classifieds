<?php

/**
 * Classifieds Core BuddyPress Class
 **/
if (!class_exists('Classifieds_Core_BuddyPress')):
    class Classifieds_Core_BuddyPress extends Classifieds_Core
    {

        /**
         * Constructor. Hooks the whole module to the 'bp_init" hook.
         *
         * @return void
         **/
        function __construct()
        {

            parent::__construct(); //Inheritance

        }

        function init()
        {
            global $wp, $wp_rewrite;

            parent::init(); //Inheritance

            /* Set BuddyPress active state */
            $this->bp_active = true;

            /* Add navigation */
            add_action('wp', array(&$this, 'add_navigation'), 2);

            /* Add navigation */
            add_action('admin_menu', array(&$this, 'add_navigation'), 2);

            /* Enqueue styles */
            add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'), 99);

            add_action('bp_template_content', array(&$this, 'process_page_requests'));

            /* template for  page */
            //add_action( 'template_redirect', array( &$this, 'handle_nav' ) );
            add_action('template_redirect', array(&$this, 'handle_page_requests'));

            add_filter('page_link', array(&$this, 'fix_menu_page_links'), 999, 3);

            add_filter('author_link', array(&$this, 'on_author_link'));
        }

        function fix_menu_page_links($link, $postID, $sample)
        {
            global $bp;
            $my_kleinanzeigen_page = get_post($this->my_kleinanzeigen_page_id);
            if ($postID == $this->my_kleinanzeigen_page_id) {
                if (is_user_logged_in()) {
                    $user_domain = (!empty($bp->displayed_user->domain)) ? $bp->displayed_user->domain : $bp->loggedin_user->domain;
                    $link = $user_domain . $bp->kleinanzeigen->slug . '/' . $my_kleinanzeigen_page->post_name . '/';
                } else {
                    $link = bp_get_signup_page();
                }
            }

            return $link;
        }

        /**
         * Add BuddyPress navigation.
         *
         * @return void
         **/
        function add_navigation()
        {
            global $bp;

            /** Only add menu if current user can create kleinanzeigen */
            if (!$this->current_user->has_cap('create_kleinanzeigen')) {
                return;
            }

            $kleinanzeigen_page = get_post($this->kleinanzeigen_page_id);
            $my_kleinanzeigen_page = get_post($this->my_kleinanzeigen_page_id);
            $default_sub_slug = bp_is_my_profile() ? $my_kleinanzeigen_page->post_name : 'all';

            if (!@is_object($bp->kleinanzeigen)) {
                $bp->kleinanzeigen = new stdClass;
            }

            $bp->kleinanzeigen->slug = $kleinanzeigen_page->post_name;
            /* Construct URL to the BuddyPress profile URL */
            $user_domain = (!empty($bp->displayed_user->domain)) ? $bp->displayed_user->domain : $bp->loggedin_user->domain;
            $parent_url = $user_domain . $bp->kleinanzeigen->slug . '/';

            if (0 < $kleinanzeigen_page->ID)
                $nav_title = $kleinanzeigen_page->post_title;
            else
                $nav_title = 'Kleinanzeigen';

            bp_core_new_nav_item(array(
                'name' => __($nav_title, $this->text_domain),
                'slug' => $bp->kleinanzeigen->slug . '/' . $default_sub_slug . '/',
                'position' => 100,
                'show_for_displayed_user' => true,
                'screen_function' => array(&$this, 'load_template'),
                'item_css_id' => $bp->kleinanzeigen->slug
            ));

            if (bp_is_my_profile()) {

                if (0 < $my_kleinanzeigen_page->ID)
                    $nav_title = $my_kleinanzeigen_page->post_title;
                else
                    $nav_title = 'Meine Kleinanzeigen';

                bp_core_new_subnav_item(array(
                    'name' => __($nav_title, $this->text_domain),
                    'slug' => $my_kleinanzeigen_page->post_name,
                    'parent_url' => $parent_url,
                    'parent_slug' => $bp->kleinanzeigen->slug,
                    'screen_function' => array(&$this, 'load_template'),
                    'position' => 10,
                    'user_has_access' => true
                ));

                if ($this->use_credits && !$this->is_full_access()) {
                    bp_core_new_subnav_item(array(
                        'name' => __('Mein Guthaben', $this->text_domain),
                        'slug' => 'my-credits',
                        'parent_url' => $parent_url,
                        'parent_slug' => $bp->kleinanzeigen->slug,
                        'screen_function' => array(&$this, 'load_template'),
                        'position' => 10,
                        'user_has_access' => true
                    ));
                }
                if (current_user_can('create_kleinanzeigen')) {
                    bp_core_new_subnav_item(array(
                        'name' => __('Neue Anzeige erstellen', $this->text_domain),
                        'slug' => 'create-new',
                        'parent_url' => $parent_url,
                        'parent_slug' => $bp->kleinanzeigen->slug,
                        'screen_function' => array(&$this, 'load_template'),
                        'position' => 10,
                        'user_has_access' => true
                    ));
                }
            } else {
                //display author classifids page
                bp_core_new_subnav_item(array(
                    'name' => __('Alle', $this->text_domain),
                    'slug' => 'all',
                    'parent_url' => $parent_url,
                    'parent_slug' => $bp->kleinanzeigen->slug,
                    'screen_function' => array(&$this, 'load_template'),
                    'position' => 10,
                    'user_has_access' => true
                ));
            }
        }

        /**
         * Load BuddyPress theme template file for plugin specific page.
         *
         * @return void
         **/
        function load_template()
        {
            /* This is generic BuddyPress plugins file. All other functions hook
            * themselves into the plugins template hooks. Each BuddyPress component
            * "members", "groups", etc. offers different plugin file and different hooks */

            bp_core_load_template('members/single/plugins', true);
        }


        /**
         * Load the content for the specific kleinanzeigen component and handle requests
         *
         * @global object $bp
         * @return void
         **/
        function process_page_requests()
        {
            global $bp;

            //Component meine-kleinanzeigen page
            if ($bp->current_component == $this->kleinanzeigen_page_slug && $bp->current_action == $this->my_kleinanzeigen_page_slug) {

                if (isset($_POST['edit'])) {
                    if (wp_verify_nonce($_POST['_wpnonce'], 'verify'))
                        $this->render_front('update_kleinanzeige', array('post_id' => (int)$_POST['post_id']));
                    else
                        die(__('Sicherheitsüberprüfung fehlgeschlagen!', $this->text_domain));
                } elseif (isset($_POST['update_kleinanzeige'])) {
                    /* The credits required to renew the kleinanzeige for the selected period */
                    $credits_required = $this->get_credits_from_duration($_POST[$this->custom_fields['duration']]);
                    /* If user have more credits of the required credits proceed with renewing the ad */
                    if ($this->is_full_access() || $this->user_credits >= $credits_required) {
                        /* Update ad */
                        $this->update_ad($_POST, $_FILES);
                        /* Save the expiration date */
                        $this->save_expiration_date($_POST['post_id']);

                        if (!$this->is_full_access()) {
                            /* Update new credits amount */
                            $this->transactions->credits -= $credits_required;
                        } else {
                            //Check one_time
                            if ($this->transactions->billing_type == 'one_time') $this->transactions->status = 'used';
                        }

                        $this->render_front('meine-kleinanzeigen', array('action' => 'edit', 'post_title' => $_POST['post_title']));
                    } else {
                        $this->render_front('edit-ad', array('post_id' => (int)$_POST['post_id'], 'cl_credits_error' => '1'));
                    }
                } elseif (isset($_POST['confirm'])) {
                    if (wp_verify_nonce($_POST['_wpnonce'], 'verify')) {
                        if ($_POST['action'] == 'end') {
                            $this->process_status((int)$_POST['post_id'], 'private');
                            $this->render_front('meine-kleinanzeigen', array('action' => 'end', 'post_title' => $_POST['post_title']));
                        } elseif ($_POST['action'] == 'renew') {
                            /* The credits required to renew the kleinanzeige for the selected period */
                            $credits_required = $this->get_credits_from_duration($_POST[$this->custom_fields['duration']]);
                            /* If user have more credits of the required credits proceed with renewing the ad */
                            if ($this->is_full_access() || $this->user_credits >= $credits_required) {
                                /* Process the status of the post */
                                $this->process_status((int)$_POST['post_id'], 'publish');
                                /* Save the expiration date */
                                $this->save_expiration_date($_POST['post_id']);

                                if (!$this->is_full_access()) {
                                    /* Update new credits amount */
                                    $this->transactions->credits -= $credits_required;
                                } else {
                                    //Check one_time
                                    if ($this->transactions->billing_type == 'one_time') $this->transactions->status = 'used';
                                }
                                /* Set the proper step which will be loaded by "page-meine-kleinanzeigen.php" */
                                $this->render_front('meine-kleinanzeigen', array('action' => 'renew', 'post_title' => $_POST['post_title']));
                            } else {
                                $this->render_front('meine-kleinanzeigen', array('cl_credits_error' => '1'));
                            }
                        } elseif ($_POST['action'] == 'delete') {
                            wp_delete_post($_POST['post_id']);
                            $this->render_front('meine-kleinanzeigen', array('action' => 'delete', 'post_title' => $_POST['post_title']));
                        }
                    } else {
                        die(__('Sicherheitsüberprüfung fehlgeschlagen!', $this->text_domain));
                    }
                } else {
                    $this->render_front('meine-kleinanzeigen');
                }
            } //Component create-new page
            elseif ($bp->current_component == $this->kleinanzeigen_page_slug && $bp->current_action == 'create-new') {

                if (isset($_POST['update_kleinanzeige'])) {

                    // The credits required to create the kleinanzeige for the selected period
                    $credits_required = $this->get_credits_from_duration($_POST[$this->custom_fields['duration']]);
                    // If user have more credits of the required credits proceed with create the ad
                    if ($this->is_full_access() || $this->user_credits >= $credits_required) {
                        global $bp;
                        /* Create ad */
                        $post_id = $this->update_ad($_POST);
                        /* Save the expiration date */
                        $this->save_expiration_date($post_id);

                        if (!$this->is_full_access()) {
                            /* Update new credits amount */
                            $this->transactions->credits -= $credits_required;
                        } else {
                            //Check one_time
                            if ($this->transactions->billing_type == 'one_time') $this->transactions->status = 'used';
                        }

                        $this->js_redirect(trailingslashit($bp->loggedin_user->domain) . $this->kleinanzeigen_page_slug . '/' . $this->my_kleinanzeigen_page_slug);

                    } else {
                        //save ad if have not credits but select draft
                        if (isset($_POST['status']) && 'draft' == $_POST['status']) {
                            /* Create ad */
                            $post_id = $this->update_ad($_POST);
                            $this->js_redirect(trailingslashit($bp->loggedin_user->domain) . $this->kleinanzeigen_page_slug . '/' . $this->my_kleinanzeigen_page_slug);
                        } else {
                            $this->render_front('update-kleinanzeige', array('cl_credits_error' => '1'));
                        }
                    }
                } else {
                    $this->render_front('update-kleinanzeige', array());
                }

            } //Component my-credits page
            elseif ($bp->current_component == $this->kleinanzeigen_page_slug && $bp->current_action == 'my-credits') {
                //redirect on checkout page
                if (isset($_POST['purchase'])) {
                    $this->js_redirect(get_permalink($this->checkout_page_id));
                    exit;
                }
                //show credits page
                $this->render_front('my-credits');
            } //Component Author kleinanzeigen page (kleinanzeigen/all)
            elseif ($bp->current_component == $this->kleinanzeigen_page_slug && $bp->current_action == 'all') {
                //show author kleinanzeigen page
                $this->render_front('meine-kleinanzeigen');
            } //default for kleinanzeigen page
            elseif ($bp->current_component == $this->kleinanzeigen_page_slug) {
                if (bp_is_my_profile()) {
                    $this->js_redirect(trailingslashit($bp->loggedin_user->domain) . $this->kleinanzeigen_page_slug . '/' . $this->my_kleinanzeigen_page_slug);
                } else {
                    $this->js_redirect(trailingslashit($bp->displayed_user->domain) . $this->kleinanzeigen_page_slug . '/' . 'all');
                }
            }
        }

        /**
         * Handle $_REQUEST for main pages.
         *
         * @uses set_query_var() For passing variables to pages
         * @return void|die() if "_wpnonce" is not verified
         **/
        function handle_page_requests()
        {
            global $bp, $wp_query;

            /* Handles request for kleinanzeigen page */

            $templates = array();

            $taxonomy = (empty($wp_query->query_vars['taxonomy'])) ? '' : $wp_query->query_vars['taxonomy'];

            $page_template = locate_template(array('page.php', 'index.php'));

            $logged_url = trailingslashit($bp->loggedin_user->domain) . $this->kleinanzeigen_page_slug . '/';


            if (is_feed()) {
                return;
            } elseif ($bp->current_component == $this->kleinanzeigen_page_slug && $bp->current_action == '') {
                $this->process_page_requests();
                return;
            } elseif (is_page($this->my_kleinanzeigen_page_id)) {
                /* Set the proper step which will be loaded by "page-meine-kleinanzeigen.php" */
                $this->js_redirect($logged_url . $this->my_kleinanzeigen_page_slug . '/active', true);
            } elseif (is_post_type_archive('kleinanzeigen')) {
                /* Set the proper step which will be loaded by "page-meine-kleinanzeigen.php" */
                $templates = array('page-kleinanzeigen.php');
                if (!$this->kleinanzeigen_template = locate_template($templates)) {
                    $this->kleinanzeigen_template = $page_template;
                    $wp_query->post_count = 1;
                    add_filter('the_title', array(&$this, 'page_title_output'), 10, 2);
                    add_filter('the_content', array(&$this, 'kleinanzeigen_content'));
                }
                add_filter('template_include', array(&$this, 'custom_kleinanzeigen_template'));
                $this->is_kleinanzeigen_page = true;
            } elseif (is_archive() && in_array($taxonomy, array('kleinanzeigen_categories', 'kleinanzeigen_tags'))) {
                /* Set the proper step which will be loaded by "page-meine-kleinanzeigen.php" */
                $templates = array('page-kleinanzeigen.php');
                if (!$this->kleinanzeigen_template = locate_template($templates)) {
                    $this->kleinanzeigen_template = $page_template;
                    $wp_query->post_count = 1;
                    add_filter('the_title', array(&$this, 'page_title_output'), 10, 2);
                    add_filter('the_content', array(&$this, 'kleinanzeigen_content'));
                }
                add_filter('template_include', array(&$this, 'custom_kleinanzeigen_template'));
                $this->is_kleinanzeigen_page = true;
            } elseif (is_single() && 'kleinanzeigen' == get_query_var('post_type')) {
                $templates = array('single-kleinanzeigen.php');
                if (!$this->kleinanzeigen_template = locate_template($templates)) {
                    $this->kleinanzeigen_template = $page_template;
                    add_filter('the_content', array(&$this, 'single_content'));
                }
                add_filter('template_include', array(&$this, 'custom_kleinanzeigen_template'));
                $this->is_kleinanzeigen_page = true;
            } elseif (is_page($this->my_credits_page_id)) {
                wp_redirect($logged_url . 'my-credits');
                exit;
                $templates = array('page-my-credits.php');
                if (!$this->kleinanzeigen_template = locate_template($templates)) {
                    $this->kleinanzeigen_template = $page_template;
                    add_filter('the_content', array(&$this, 'my_credits_content'));
                }
                add_filter('template_include', array(&$this, 'custom_kleinanzeigen_template'));
                $this->is_kleinanzeigen_page = true;
            } elseif (is_page($this->checkout_page_id)) {
                $templates = array('page-checkout.php');
                if (!$this->kleinanzeigen_template = locate_template($templates)) {
                    $this->kleinanzeigen_template = $page_template;
                    add_filter('the_content', array(&$this, 'checkout_content'));
                }
                add_filter('template_include', array(&$this, 'custom_kleinanzeigen_template'));
                $this->is_kleinanzeigen_page = true;
            } elseif (is_page($this->signin_page_id)) {
                $templates = array('page-signin.php');
                if (!$this->kleinanzeigen_template = locate_template($templates)) {
                    $this->kleinanzeigen_template = $page_template;
                    add_filter('the_title', array(&$this, 'delete_post_title')); //after wpautop
                    add_filter('the_content', array(&$this, 'signin_content'));
                }
                add_filter('template_include', array(&$this, 'custom_kleinanzeigen_template'));
                $this->is_kleinanzeigen_page = true;
            } //Classifieds update pages
            elseif (is_page($this->add_kleinanzeige_page_id) || is_page($this->edit_kleinanzeige_page_id)) {
                wp_redirect($logged_url . 'create-new/?' . http_build_query($_GET));
                exit;
            } /* If user wants to go to My Classifieds main page  */
            elseif (isset($_POST['go_my_kleinanzeigen'])) {
                wp_redirect(get_permalink($this->my_kleinanzeigen_page_id));
            } /* If user wants to go to My Classifieds main page  */
            elseif (isset($_POST['purchase'])) {
                wp_redirect(get_permalink($this->checkout_page_id));
            } else {
                /* Set the proper step which will be loaded by "page-meine-kleinanzeigen.php" */
                set_query_var('cf_action', 'meine-kleinanzeigen');
            }

            //load  specific items
            if ($this->is_kleinanzeigen_page) {
                add_filter('edit_post_link', array(&$this, 'delete_edit_post_link'));
            }

        }

        /**
         * Classifieds Content.
         *
         * @return void
         **/
        function kleinanzeigen_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            require($this->custom_kleinanzeigen_template('kleinanzeigen'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * Update Classifieds.
         *
         * @return void
         **/
        function update_kleinanzeige_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            $this->render_front('update-kleinanzeige', array('post_id' => $_POST['post_id']));
            //require($this->template_file('update-kleinanzeige'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * My Classifieds.
         *
         * @return void
         **/
        function my_kleinanzeigen_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            require($this->custom_kleinanzeigen_template('meine-kleinanzeigen'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * My Classifieds.
         *
         * @return void
         **/
        function checkout_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            require($this->custom_kleinanzeigen_template('checkout'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * Signin.
         *
         * @return void
         **/
        function signin_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            require($this->custom_kleinanzeigen_template('signin'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * My Classifieds Credits.
         *
         * @return void
         **/
        function my_credits_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            require($this->custom_kleinanzeigen_template('page-my-credits'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * Single Classifieds.
         *
         * @return void
         **/
        function single_content($content = null)
        {
            if (!in_the_loop()) return $content;
            ob_start();
            require($this->custom_kleinanzeigen_template('single-kleinanzeigen'));
            $new_content = ob_get_contents();
            ob_end_clean();
            return $new_content;
        }

        /**
         * Enqueue styles.
         *
         * @return void
         **/
        function enqueue_scripts()
        {
            if (is_page($this->add_kleinanzeige_page_id) || is_page($this->edit_kleinanzeige_page_id)) {
                wp_enqueue_script('thickbox');
                wp_enqueue_style('thickbox');
            }
            if (file_exists(get_template_directory() . '/style-bp-kleinanzeigen.css'))
                wp_enqueue_style('style-kleinanzeigen', get_template_directory() . '/style-bp-kleinanzeigen.css');
            elseif (file_exists($this->plugin_dir . 'ui-front/buddypress/style-bp-kleinanzeigen.css'))
                wp_enqueue_style('style-kleinanzeigen', $this->plugin_url . 'ui-front/buddypress/style-bp-kleinanzeigen.css');
        }

        function on_author_link($link)
        {
            global $post, $bp;
            if ($post->post_type == 'kleinanzeigen') {
                if (get_current_user_id() == $post->post_author) {
                    $link = bp_core_get_user_domain($post->post_author) . $bp->kleinanzeigen->slug . '/meine-kleinanzeigen';
                } elseif (is_user_logged_in()) {
                    $link = bp_core_get_user_domain($post->post_author) . $bp->kleinanzeigen->slug . '/all';
                }else{
                    $link = bp_core_get_user_domain($post->post_author);
                }
            }
            return $link;
        }

    }

    /* Initiate Class */
//Only gets called if code is included by bp_include action from Buddypress
    global $Classifieds_Core;
    $Classifieds_Core = new Classifieds_Core_BuddyPress();

endif;
