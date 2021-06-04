<?php

    // Enqueue CSS and JS
        function theme_enqueue_scripts() {
            // Reset, Grid, and Main CSS file
            wp_enqueue_style('custom-reset', get_template_directory_uri().'/styles/wp-reset-min.css');
            wp_enqueue_style('grid', get_template_directory_uri().'/styles/grid-min.css');
            wp_enqueue_style('minified-css', get_template_directory_uri().'/styles/style-min.css');
            
            // Fonts
            // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Karla:wght@200..800&display=swap', array(), null );
            wp_enqueue_style('fontawesome-main', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');
            wp_enqueue_style('fontawesome-shims', 'https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css');

            /* Add JS */
            wp_register_script('custom-js', get_template_directory_uri().'/scripts/scripts-min.js', 'jquery', '', 1);
            wp_enqueue_script('jquery');
            wp_enqueue_script('custom-js'); 
            }
        add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


    // Extra Admin Functions
        require_once( __DIR__ . '/includes/admin/theme-options.php');
        require_once( __DIR__ . '/includes/admin/common-functions.php');


    // ACF Include

        // Define path and URL to the ACF plugin.
        define( 'ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
        define( 'ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

        // Include the ACF plugin.
        include_once( ACF_PATH . 'acf.php' );

        // Customize the url setting to fix incorrect asset URLs.
        add_filter('acf/settings/url', 'my_acf_settings_url');
        function my_acf_settings_url( $url ) {
            return ACF_URL;
        }

        // (Optional) Hide the ACF admin menu item.
        // add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
        // function my_acf_settings_show_admin( $show_admin ) {
        //     return false;
        // }

        // Save individual field groups and fields to theme
        add_filter('acf/settings/save_json', 'acf_json_save_point');
        function acf_json_save_point( $path ) {
            $path = get_stylesheet_directory() . '/includes/acf/acf-json';
            return $path;    
        }        

    // Customizer Updates
        require_once( __DIR__ . '/includes/scssphp/scss.inc.php');

        if (is_customize_preview()) {
            add_action('wp_head', function() {
                $compiler = new ScssPhp\ScssPhp\Compiler();
         
                $source_scss = get_stylesheet_directory() . '/styles/style.scss';
                $scssContents = file_get_contents($source_scss);
                $import_path = get_stylesheet_directory() . '/styles';
                $compiler->addImportPath($import_path);
         
                $variables = [
                    '$primaryaccent' => get_theme_mod('pc_accent_color_setting', '#00A8f0'),
                ];
                $compiler->setVariables($variables);
         
                $css = $compiler->compile($scssContents);
                if (!empty($css) && is_string($css)) {
                    echo '<style type="text/css">' . $css . '</style>';
                }
            });
        }

        add_action('customize_save_after', function() {
            $compiler = new ScssPhp\ScssPhp\Compiler();
         
            $source_scss = get_stylesheet_directory() . '/styles/style.scss';
            $scssContents = file_get_contents($source_scss);
            $compiler->setFormatter('ScssPhp\ScssPhp\Formatter\Compressed');
            $import_path = get_stylesheet_directory() . '/styles';
            $compiler->addImportPath($import_path);
            $target_css = get_stylesheet_directory() . '/styles/style-min.css';
         
            $variables = [
                '$primaryaccent' => get_theme_mod('pc_accent_color_setting', '#00A8f0'),
            ];      
            $compiler->setVariables($variables);
         
            $css = $compiler->compile($scssContents);
            if (!empty($css) && is_string($css)) {
                file_put_contents($target_css, $css);
            }
        });


?>