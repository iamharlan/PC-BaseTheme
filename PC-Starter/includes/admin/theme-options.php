<?php 


// Custom Control to output helpers
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Prefix_Custom_Content' ) ) :
class Prefix_Custom_Content extends WP_Customize_Control {

   public $content = ''; // Whitelist content parameter
   public function render_content() {
      if ( isset( $this->label ) ) {
         echo '<span class="customize-control-title">' . $this->label . '</span>';
      }
      if ( isset( $this->content ) ) {
         echo $this->content;
      }
      if ( isset( $this->description ) ) {
         echo '<span class="description customize-control-description">' . $this->description . '</span>';
      }
   }
}
endif;


// Customizer functions for Custom Content, Colors and Images
function pc_customize_register( $wp_customize ) {

   // Theme Options Section in Customizer
   $wp_customize->add_panel( 'pc_theme_options', array(
      'title' => __( 'Theme Options' ),
      'description' => esc_html__( 'Custom theme options for SEO Theme.' ),
      'priority' => 160, // Default is 160
      'capability' => 'edit_theme_options', // Default is edit_theme_options
      'theme_supports' => '', // Rarely needed
      'active_callback' => '', // Rarely needed
   ));

      // Theme Color Options Section
      $wp_customize->add_section( 'pc_theme_colors_settings', array(
         'title' => __( 'Theme Color Options', 'seotheme' ),
         'description' => esc_html__( 'Sets the primary accent color for the theme.' ),
         'panel' => 'pc_theme_options', // Only needed if adding your Section to a Panel
         'priority' => 160, // Default is 160
         'capability' => 'edit_theme_options', // Default is edit_theme_options
         'theme_supports' => '', // Rarely needed
         'active_callback' => '', // Rarely needed
         'description_hidden' => 'false', // Rarely needed. Default is False
      ));

         // Colors Helper
         $wp_customize->add_setting( 'color-helper', array() );
         $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'color-helper', array(
            'section' => 'pc_theme_colors_settings',
            'priority' => 10,
            'label' => __( 'Accent Color', 'seotheme' ),
            'content' => __( 'Use the color picker to choose your accent color for links, buttons, etc. <em>Default is blue.</em>', 'seotheme' ) . '</p>',
            // 'description' => __( 'Helper for color schemes.', 'seotheme' ),
         )));

         // Color Settings and Controls
         $wp_customize->add_setting( 'pc_accent_color_setting', array(
            'default' => '#00A8f0'
         ));
         $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pc_accent_color_setting', array(
            'label' => __('Theme Accent Color', 'seotheme'),
            'section' => 'pc_theme_colors_settings',
            'settings'=> 'pc_accent_color_setting',
            'priority' => 20, // Optional. Order priority to load the control. Default: 10
         )));

      // Social Media Profiles Section
      $wp_customize->add_section( 'pc_socialsection', array(
         'title' => __( 'Social Media Profiles' ),
         'description' => esc_html__( 'Enter your social media links for display in the footer.' ),
         'panel' => 'pc_theme_options', // Only needed if adding your Section to a Panel
         'priority' => 160, // Default is 160
         'capability' => 'edit_theme_options', // Default is edit_theme_options
         'theme_supports' => '', // Rarely needed
         'active_callback' => '', // Rarely needed
         'description_hidden' => 'false', // Rarely needed. Default is False
      ));

         // Social Helper
         $wp_customize->add_setting( 'social-helper', array() );
         $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'social-helper', array(
            'section' => 'pc_socialsection',
            'priority' => 10,
            'label' => __( 'Social Profiles', 'seotheme' ),
            'content' => __( 'Please enter the links to your social profiles. Be sure to enter the full link, including the <em>https://</em>', 'seotheme' ) . '</p>',
            // 'description' => __( 'Helper for social profile links.', 'seotheme' ),
         )));

         // Facebook Profile 
         $wp_customize->add_setting( 'pc_facebookprofile_setting', array(
            'default' => '', // Optional.
            'transport' => 'refresh', // Optional. 'refresh' or 'postMessage'. Default: 'refresh'
            'type' => 'theme_mod', // Optional. 'theme_mod' or 'option'. Default: 'theme_mod'
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'theme_supports' => '', // Optional. Rarely needed
            'validate_callback' => '', // Optional. The name of the function that will be called to validate Customizer settings
            'sanitize_callback' => '', // Optional. The name of the function that will be called to sanitize the input data before saving it to the database
            'sanitize_js_callback' => '', // Optional. The name of the function that will be called to sanitize the data before outputting to javascript code. Basically to_json.
            'dirty' => false, // Optional. Rarely needed. Whether or not the setting is initially dirty when created. Default: False
         ));
         $wp_customize->add_control( 'pc_facebookprofile_control', array(
            'label' => __( 'Facebook Profile Link' ),
            'description' => esc_html__( 'Enter the full link to your Facebook profile.' ),
            'section' => 'pc_socialsection',
            'priority' => 20, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'settings'=>'pc_facebookprofile_setting',
            'capability' => 'edit_theme_options', // Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'facebook-link',
               'style' => 'border: 1px solid black',
               'placeholder' => __( 'https://...' ),
            )
         ));

         // Twitter Profile
         $wp_customize->add_setting( 'pc_twitterprofile_setting', array(
            'default' => '', // Optional.
         ));
         $wp_customize->add_control( 'pc_twitterprofile_control', array(
            'label' => __( 'Twitter Profile Link' ),
            'description' => esc_html__( 'Enter the full link to your Twitter profile.' ),
            'section' => 'pc_socialsection',
            'priority' => 20, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'settings'=>'pc_twitterprofile_setting',
            'capability' => 'edit_theme_options', // Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'twitter-link',
               'style' => 'border: 1px solid black',
               'placeholder' => __( 'https://...' ),
            )
         ));

         // Instagram Profile
         $wp_customize->add_setting( 'pc_instagramprofile_setting', array(
            'default' => '', // Optional.
         ));
         $wp_customize->add_control( 'pc_instagramprofile_control', array(
            'label' => __( 'Instagram Profile Link' ),
            'description' => esc_html__( 'Enter the full link to your Instagram profile.' ),
            'section' => 'pc_socialsection',
            'priority' => 20, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'settings'=>'pc_instagramprofile_setting',
            'capability' => 'edit_theme_options', // Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'instagram-link',
               'style' => 'border: 1px solid black',
               'placeholder' => __( 'https://...' ),
            )
         ));

         // Youtube Profile
         $wp_customize->add_setting( 'pc_youtubeprofile_setting', array(
            'default' => '', // Optional.
         ));

         $wp_customize->add_control( 'pc_youtubeprofile_control', array(
            'label' => __( 'Youtube Profile Link' ),
            'description' => esc_html__( 'Enter the full link to your Youtube profile.' ),
            'section' => 'pc_socialsection',
            'priority' => 20, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'settings'=>'pc_youtubeprofile_setting',
            'capability' => 'edit_theme_options', // Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'youtube-slink',
               'style' => 'border: 1px solid black',
               'placeholder' => __( 'https://...' ),
            )
         ));

};
add_action( 'customize_register', 'pc_customize_register' );

?>