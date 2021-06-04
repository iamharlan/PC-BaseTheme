<?php 

    // HTML5 Shim for Older Browsers
        function add_ie_html5_shim () {
            echo '<!--[if lt IE 9]>';
            echo '<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
            echo '<![endif]-->';
            }
        add_action('wp_head', 'add_ie_html5_shim'); 


    // Clean Up Header
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'print_emoji_detection_script', 7 );
        remove_action('wp_print_styles', 'print_emoji_styles' );
        remove_action('wp_head', 'start_post_rel_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'adjacent_posts_rel_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
        function pc_cleanup_query_string( $src ){ $parts = explode( '?', $src ); return $parts[0]; } 
        add_filter( 'script_loader_src', 'pc_cleanup_query_string', 15, 1 ); 
        add_filter( 'style_loader_src', 'pc_cleanup_query_string', 15, 1 );


    // Theme Supports
        if (function_exists('add_theme_support')) {
            // Add Automatic Feed Links
            add_theme_support('automatic-feed-links');
            // Custom Logo             
            add_theme_support( 'custom-logo' );
            // Post Thumbnails
            add_theme_support('post-thumbnails');
            }

    // Register Sidebars
        if ( function_exists('register_sidebar') )
            
            register_sidebar(array(
                'name' => 'Sidebar',
                'id' => 'sidebar',
                'before_widget' => '<div class="widget %1$s %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            ));
            register_sidebar(array(
                'name' => 'Footer Left',
                'id' => 'footer-left',
                'before_widget' => '<div class="widget %1$s %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            ));
            register_sidebar(array(
                'name' => 'Footer Center',
                'id' => 'footer-center',
                'before_widget' => '<div class="widget %1$s %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            ));
            register_sidebar(array(
                'name' => 'Footer Right',
                'id' => 'footer-right',
                'before_widget' => '<div class="widget %1$s %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            ));

        remove_filter( 'widget_title', 'esc_html' );


    // Register Menus
        register_nav_menus( array(
            'menu' => 'Main Menu',
            'footer-menu-center' => 'Footer Menu Center',
            'footer-menu-right' => 'Footer Menu Right'
            ));


    // Login Page Logo Change
        function my_login_logo() { 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?> 
            <style type="text/css"> 
            body.login div#login h1 a {
            background-image: url('<?php echo $image[0]; ?>');
            background-size:contain;
            padding-bottom: 0px; 
            width:100%;
            } 
            </style>
            <?php 
            } add_action( 'login_enqueue_scripts', 'my_login_logo' );

            add_filter( 'login_headerurl', 'custom_loginlogo_url' );
            function custom_loginlogo_url($url) {
                return get_bloginfo( 'url' );
        }


    // Block Editor CSS
        add_action('admin_head', 'blockeditor_css');

        function blockeditor_css() {
          echo 
          '<style>
            .wp-block {max-width: 80%;}
          </style>';
        }


    // Reduce Default Excerpt Length
        add_filter( 'excerpt_length', function( $length ) { return 20; } );        


    // Remove Jump on Read More
        function remove_more_jump_link($link) { 
            $offset = strpos($link, '#more-');
            if ($offset) {
            $end = strpos($link, '"',$offset);
            }
            if ($end) {
            $link = substr_replace($link, '', $offset, $end-$offset);
            }
            return $link;
            }
        add_filter('the_content_more_link', 'remove_more_jump_link');
 
?>