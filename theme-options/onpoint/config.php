<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "onpoint_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'onpoint/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'OnPoint Options', 'onpoint_theme' ),
        'page_title'           => __( 'Manage Theme Options', 'onpoint_theme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'redux_demo',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'onpoint_theme' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'onpoint_theme' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'onpoint_theme' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'onpoint_theme' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'onpoint_theme' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'onpoint_theme' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'onpoint_theme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'onpoint_theme' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'onpoint_theme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'onpoint_theme' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'onpoint_theme' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Theme Options ', 'onpoint_theme' ),
        'id'               => 'general',
        'desc'             => __( 'These are the General Fields!', 'onpoint_theme' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'onpoint_theme' ),
        'id'               => 'general-items',
        'subsection'       => true,
        'customizer_width' => '450px',
        'icon' => 'el el-css',
        'fields'           => array(
            
            
            array(
                'id'       => 'logo-upload',
                'type'     => 'media',
                'title'    => __( 'Upload Logo', 'onpoint_theme' ),
                'desc'     => __( 'Upload Logo here if you want to Display on Header', 'onpoint_theme' ),
            ),
            
            array(
                'id'       => 'header-widget-1',
                'type'     => 'text',
                'title'    => __( 'Topbar Widget 1', 'onpoint_theme' ),
                'default'  => 'Widget 1',
            ),
            array(
                'id'       => 'header-widget-2',
                'type'     => 'text',
                'title'    => __( 'Topbar Widget 2', 'onpoint_theme' ),
                'default'  => 'Widget 2',
            ),
            array(
                'id'       => 'header-widget-3',
                'type'     => 'text',
                'title'    => __( 'Topbar Widget 3', 'onpoint_theme' ),
                'default'  => 'Widget 3',
            ),
        )
    ) );


    Redux::setSection($opt_name , array(
        'title' => __('Styling Of Header','onpoint_theme'),
        'id' => 'styles',
        'desc' => __('These are the styles of Header','onpoint_theme'),
        'customizer_width' => '400px',
        'icon' => 'el el-css',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'opt-sticky',
                'type' => 'checkbox',
                'title' => 'Enable/Disable Sticky Header',
                'subtitle' => 'Switch on/off Sticky Header from Here',
                'default' => 1,
            ),
            array(
                'id' => 'opt-ajax-search',
                'type' => 'checkbox',
                'title' => 'Enable/Disable Ajax Product Search',
                'subtitle' => 'Switch on/off Ajax Product Search From here',
                'default' => 1,
            ),
            array(
                'id' => 'opt-cart',
                'type' => 'checkbox',
                'title' => 'Enable/Disable Cart Icon on Header',
                'subtitle' => 'Switch on/off Cart Icon on Header',
                'default' => 1,
            ),
            array(
                'id' => 'topbar-bg-color',
                'type' => 'color',
                'title' => 'Choose Topbar Background Color',
                'subtitle' => 'Customize Topbar Background Color From here',
                'default' => '#000',
            ),
            array(
                'id' => 'topbar-link-color',
                'type' => 'color',
                'title' => 'Choose Topbar Link Color',
                'subtitle' => 'Customize Text Color From here',
                'default' => '#fff',
            ),
            array(
                'id' => 'header-bg-color',
                'type' => 'color',
                'title' => 'Choose Header Background Color',
                'subtitle' => 'Customize Header Background Color From here',
                'default' => '#fff',
            ),
            array(
                'id' => 'header-links-color',
                'type' => 'color',
                'title' => 'Choose Header Links Color',
                'subtitle' => 'Customize Header Link Color From here',
                'default' => '#000',
            ),
            array(
                'id' => 'header-links-color-hover',
                'type' => 'color',
                'title' => 'Choose Header Links Hover Color',
                'subtitle' => 'Customize Header Links Hover Color From here',
                'default' => '#000',
            ), 
        )
    ));

    // Blog Section 
Redux::setSection($opt_name , array(
    'title' => __('Blog Page Options','onpoint_theme'),
    'id' => 'blog-page',
    'desc' => __('These are the options of Blog Page','onpoint_theme'),
    'customizer_width' => '400px',
    'icon' => 'el el-css',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'excerpt-length',
            'type' => 'text',
            'title' => 'Enter Length of Excerpt',
            'default' => '320',
        ), 
        array(
            'id'       => 'opt-blog-layout',
            'type'     => 'select',
            'title'    => __('Select Layout Type ', 'onpoint_theme'), 
            'desc'     => __('Select Layout type for Blog Page.', 'onpoint_theme'),
            // Must provide key => value pairs for select options
            'options'  => array(
                '1' => 'Blog With Sidebar',
                '2' => 'Blog Without Sidebar',
            ),
            'default'  => '1',
        ),
    )
));
  

    // Blog Section 
    Redux::setSection($opt_name , array(
        'title' => __('Shop Page Options','onpoint_theme'),
        'id' => 'shop-page',
        'desc' => __('These are the options of Blog Page','onpoint_theme'),
        'customizer_width' => '400px',
        'icon' => 'el el-css',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'opt-shop-products',
                'type'     => 'select',
                'title'    => __('Select Products per Row ', 'onpoint_theme'), 
                'desc'     => __('Select Products per Row for Blog Page.', 'onpoint_theme'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    '1' => '4 Products',
                    '2' => '3 Produts',
                ),
                'default'  => '2',
            ),
        )
    ));
      

   // 404 Section 
   Redux::setSection($opt_name , array(
    'title' => __('404 Page Options','onpoint_theme'),
    'id' => '404-page',
    'desc' => __('These are the options of 404 Page','onpoint_theme'),
    'customizer_width' => '400px',
    'icon' => 'el el-exclamation-sign',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => '404-message',
            'type' => 'text',
            'title' => 'Enter Text of 404 Message',
            'default' => '404',
        ), 
       
    )
));
  
    // Blog Section 
    Redux::setSection($opt_name , array(
        'title' => __('Social Networking Options','onpoint_theme'),
        'id' => 'social-networking-options',
        'desc' => __('These are the options of Social Networking Settings','onpoint_theme'),
        'customizer_width' => '400px',
        'icon' => 'el el-css',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'facebook',
                'type' => 'checkbox',
                'default' => '1',
                'title' => 'Facebook'
            ), 
            array(
                'id' => 'instagram',
                'type' => 'checkbox',
                'default' => '1',
                'title' => 'Instagram'
            ), 
            array(
                'id' => 'twitter',
                'type' => 'checkbox',
                'default' => '1',
                'title' => 'Twitter'
            ), 
            array(
                'id' => 'pinterest',
                'type' => 'checkbox',
                'default' => '1',
                'title' => 'Pinterest'
            ), 
            array(
                'id' => 'vimeo',
                'type' => 'checkbox',
                'default' => '0',
                'title' => 'Vimeo'
            ), 
            array(
                'id' => 'youtube',
                'type' => 'checkbox',
                'default' => '0',
                'title' => 'Youtube'
            ), 
            array(
                'id' => 'linkedin',
                'type' => 'checkbox',
                'default' => '0',
                'title' => 'LinkedIn'
            ), 
            array(
                'id' => 'snapchat',
                'type' => 'checkbox',
                'default' => '0',
                'title' => 'Snapchat'
            ), 
        )
    ));

    // Heading Styles
    Redux::setSection($opt_name , array(
        'title' => __('Text Options','onpoint_theme'),
        'id' => 'text-styles',
        'desc' => __('These are the options of OnPoint Text','onpoint_theme'),
        'customizer_width' => '400px',
        'icon' => 'el el-bold',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'font-family-h1',
                'title' => 'Heading 1 Font Family',
                'type' => 'select',
                'desc' => __('Select Font Family for Heading 1','onpoint_theme'),
                'options' => array(
                    '1' => 'PlayFair Display',
                    '2' => 'Oswald',
                    '3' => 'Poppins',
                ),
                'default' => '1',
            ),
            array(
                'id' => 'font-family-h2',
                'title' => 'Heading 2 Font Family',
                'type' => 'select',
                'desc' => __('Select Font Family for Heading 2','onpoint_theme'),
                'options' => array(
                    '1' => 'PlayFair Display',
                    '2' => 'Oswald',
                    '3' => 'Poppins',
                ),
                'default' => '1',
            ),
            array(
                'id' => 'font-family-h3',
                'title' => 'Heading 3 Font Family',
                'type' => 'select',
                'desc' => __('Select Font Family for Heading 3','onpoint_theme'),
                'options' => array(
                    '1' => 'PlayFair Display',
                    '2' => 'Oswald',
                    '3' => 'Poppins',
                ),
                'default' => '1',
            ),
            array(
                'id' => 'font-family-h4',
                'title' => 'Heading 4 Font Family',
                'type' => 'select',
                'desc' => __('Select Font Family for Heading 4','onpoint_theme'),
                'options' => array(
                    '1' => 'PlayFair Display',
                    '2' => 'Oswald',
                    '3' => 'Poppins',
                ),
                'default' => '1',
            ),
            array(
                'id' => 'font-family-h5',
                'title' => 'Heading 5 Font Family',
                'type' => 'select',
                'desc' => __('Select Font Family for Heading 5','onpoint_theme'),
                'options' => array(
                    '1' => 'PlayFair Display',
                    '2' => 'Oswald',
                    '3' => 'Poppins',
                ),
                'default' => '1',
            ),
            array(
                'id' => 'font-family-p',
                'title' => 'Paragraph Font Family',
                'type' => 'select',
                'desc' => __('Select Font Family for Paragraph','onpoint_theme'),
                'options' => array(
                    '1' => 'PlayFair Display',
                    '2' => 'Oswald',
                    '3' => 'Poppins',
                ),
                'default' => '1',
            ),
        )
    ));
   
// Footer Section 
Redux::setSection($opt_name , array(
    'title' => __('Footer Options','onpoint_theme'),
    'id' => 'footer',
    'desc' => __('These are the options of Footer','onpoint_theme'),
    'customizer_width' => '400px',
    'icon' => 'el el-css',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'opt-footer-nav',
            'type' => 'checkbox',
            'title' => 'Enable/Disable Footer Navigation',
            'subtitle' => 'Switch on/off Sticky Footer Navigation',
            'default' => 1,
        ),
        array(
            'id' => 'footer-bg-color',
            'type' => 'color',
            'title' => 'Choose Footer Background Color',
            'subtitle' => 'Customize Footer Background Color From here',
            'default' => '#000',
        ),
        array(
            'id' => 'header-text-color',
            'type' => 'color',
            'title' => 'Choose Footer Text Color',
            'subtitle' => 'Customize Footer Text Color From here',
            'default' => '#fff',
        ),
        array(
            'id' => 'copyright-text',
            'type' => 'text',
            'title' => 'Enter Footer Copyright Text',
            'subtitle' => 'Footer Copyright Text Here',
            'default' => '© Everything Cheetah 2019 | Made With Love By Three Cheetahs',
        ),
    )
));
  
    

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'onpoint_theme' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'onpoint_theme' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'onpoint_theme' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

