<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "rs_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'RSConstruction/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

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
        'menu_title'           => __( 'RS Options', 'batiment' ),
        'page_title'           => __( 'RS Options', 'batiment' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,
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
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
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

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>batiment Theme</p>', 'batiment' ), $v );
    } else {
        $args['intro_text'] = __( '<p>batiment Theme</p>', 'batiment' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSbatiment
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'batiment' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'batiment' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'batiment' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'batiment' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'batiment' );
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
     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => __( 'General Sections', 'batiment' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => __( 'Upload Default Logo', 'batiment' ),
                'subtitle' => __( 'Upload your logo', 'batiment' ),
                'url'=> true
                
            ),

            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    => __( 'Upload Your Light', 'batiment' ),
                'subtitle' => __( 'Upload your light logo', 'batiment' ),
                'url'=> true
                
            ),

             array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'batiment' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'batiment' ),
                    'type'     => 'text',
                    'default'  => '30px'
                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => __( 'Upload Your Sticky Logo', 'batiment' ),
                'subtitle' => __( 'Upload your sticky logo', 'batiment' ),
                'url'=> true                
            ),


             array(
                    'id'       => 'sticky-logo-height',                               
                    'title'    => esc_html__( 'Sticky Logo Height', 'batiment' ),
                    'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'batiment' ),
                    'type'     => 'text',
                    'default'  => '30px'
                    
            ),


            
            array(
            'id'       => 'rs_favicon',
            'type'     => 'media',
            'title'    => __( 'Upload Favicon', 'batiment' ),
            'subtitle' => __( 'Upload your faviocn here', 'batiment' ),
            'url'=> true            
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => __('Sticky Menu', 'batiment'),
                'subtitle' => __('You can show or hide sticky menu here', 'batiment'),
                'default'  => false,
            ),

                array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => __('Show Searh Icon at Menu Area', 'batiment'),
                'subtitle' => __('You can show or hide search here', 'batiment'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'off_canvas',
                'type'     => 'switch', 
                'title'    => __('Show off Canvas', 'batiment'),
                'subtitle' => __('You can show or hide off canvas here', 'batiment'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'show_preloader',
                'type'     => 'switch', 
                'title'    => __('Show Preloader', 'batiment'),
                'subtitle' => __('You can show or hide preloader', 'batiment'),
                'default'  => false,
            ),  
                
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => __('Go to Top', 'batiment'),
                'subtitle' => __('You can show or hide here', 'batiment'),
                'default'  => false,
            ),  


            
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'batiment' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => __('Header Top Area', 'batiment'),
            'desc'   => __('', 'batiment')
        ),
        
        array(
                'id'       => 'show-top',
                'type'     => 'switch', 
                'title'    => __('Show Top Bar', 'batiment'),
                'subtitle' => __('You can select top bar show or hide', 'batiment'),
                'default'  => false,
            ),

        array(
                'id'       => 'show-top-mobile',
                'type'     => 'switch', 
                'title'    => __('Hide Top Bar On Mobile', 'batiment'),
                'subtitle' => __('Hide top bar on small device', 'batiment'),
                'default'  => true,
            ),  

         array(
                    'id'       => 'welcome-text',                               
                    'title'    => __( 'Top Bar Welcome Text', 'batiment' ),
                    'subtitle' => __( 'Top Bar Welcome Text Add Here', 'batiment' ),
                    'type'     => 'text',
                    
            ),

         
      
        array(
                'id'       => 'show-social',
                'type'     => 'switch', 
                'title'    => __('Show Social Icons at Header', 'batiment'),
                'subtitle' => __('You can select Social Icons show or hide', 'batiment'),
                'default'  => true,
            ),  
                    
          array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => __('Header Area', 'batiment'),
            'desc'   => __('', 'batiment')
        ),


          array(
                    'id'       => 'phone-pretext',                               
                    'title'    => __( ' Phone Number Pre Text', 'batiment' ),
                    'subtitle' => __( 'Enter Phone Number Pre Text', 'batiment' ),
                    'type'     => 'text',
                    
            ),
        
         array(
                    'id'       => 'phone',                               
                    'title'    => __( ' Phone Number', 'batiment' ),
                    'subtitle' => __( 'Enter Phone Number', 'batiment' ),
                    'type'     => 'text',
                    
            ),

           array(
                    'id'       => 'email-pretext',                               
                    'title'    => __( ' E-mail Pre Text', 'batiment' ),
                    'subtitle' => __( 'Enter E-mail Pre Text', 'batiment' ),
                    'type'     => 'text',
                    
            ),
       
        array(
                    'id'       => 'top-email',                               
                    'title'    => __( 'Email Address', 'batiment' ),
                    'subtitle' => __( 'Enter Email Address', 'batiment' ),
                    'type'     => 'text',
                    'validate' => 'email',
                    'msg'      => 'Email Address Not Valid',
                    
            ),  

         array(
                    'id'       => 'location-pretext',                               
                    'title'    => __( 'Location Title', 'batiment' ),
                    'subtitle' => __( 'Pre Text', 'batiment' ),
                    'type'     => 'text',
                    
            ),
       
        array(
                    'id'       => 'top-location',                               
                    'title'    => __( 'Add Location', 'batiment' ),
                    'subtitle' => __( 'Enter Address Here', 'batiment' ),
                    'type'     => 'text',                   
                    
            ),  
            
        array(
                'id'       => 'quote',                               
                'title'    => __( 'Quote Button Text', 'batiment' ),                  
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => __( 'Quote Button Link', 'batiment' ),
                'subtitle' => __( 'Enter Quote Button Link Here', 'batiment' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);  
   

Redux::setSection( $opt_name, array(
'title'            => __( 'Header Layout', 'batiment' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection' =>true,      
'fields'           => array(    
                    
                    array(
                        'id'       => 'header_layout',
                        'type'     => 'image_select',
                        'title'    => __('Header Layout', 'batiment'), 
                        'subtitle' => __('Select header layout. Choose between 1, 2 ,3 or 4 layout.', 'batiment'),
                        'options'  => array(
                            'style1'      => array(
                                'alt'   => 'Header Style 1', 
                                'img'   => get_template_directory_uri().'/libs/img/style_1.png'
                                
                            ),
                            'style2'      => array(
                                'alt'   => 'Header Style 2', 
                                'img'   => get_template_directory_uri().'/libs/img/style_2.png'
                            ),
                            'style3'      => array(
                                'alt'   => 'Header Style 3', 
                                'img'  => get_template_directory_uri().'/libs/img/style_3.png'
                            ),
                            'style4'      => array(
                                'alt'   => 'Header Style 4', 
                                'img'   => get_template_directory_uri().'/libs/img/style_4.png'
                            ),
                            'style5'      => array(
                                'alt'   => 'Header Style 5', 
                                'img'   => get_template_directory_uri().'/libs/img/style_5.png'
                            ),
                            'style6'      => array(
                                'alt'   => 'Header Style 6', 
                                'img'   => get_template_directory_uri().'/libs/img/style_6.png'
                            ),
                            
                        ),
                        'default' => 'style1'
                    ),                           
                    
            )
        ) 

);


//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'batiment' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'batiment' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#363636',                        
                    'validate'  => 'color',                        
                ),    

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#e88e2e',                        
                    'validate'  => 'color',                        
                ), 

                 array(
                    'id'        => 'toolbar_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Icon Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ), 

                 array(
                    'id'        => 'toolbar_social_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Social Icon Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ), 

                 array(
                    'id'        => 'toolbar_social_icon_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Social Icon Hover Color','batiment'),
                    'subtitle'  => esc_html__('Pick color', 'batiment'),    
                    'default'   => '#e88e2e',                        
                    'validate'  => 'color',                        
                ),             
        )
    )
);
                                   

    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Style', 'batiment' ),
        'id'               => 'stle',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Global Style', 'batiment' ),
        'desc'   => __( 'Style your theme', 'batiment' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => __('Body Backgroud Color','batiment'),
                            'subtitle'  => __('Pick body background color', 'batiment'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => __('Text Color','batiment'),
                            'subtitle'  => __('Pick text color', 'batiment'),
                            'default'   => '#666666',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                        'id'        => 'primary_color',
                        'type'      => 'color', 
                        'title'     => __('Primary Color','batiment'),
                        'subtitle'  => __('Select Primary Color.', 'batiment'),
                        'default'   => '#e88e2e',
                        'validate'  => 'color',                        
                        ), 

                        array(
                        'id'        => 'secondary_color',
                        'type'      => 'color', 
                        'title'     => __('Secondary Color','batiment'),
                        'subtitle'  => __('Select Secondary Color.', 'batiment'),
                        'default'   => '#363636',
                        'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => __('Link Color','batiment'),
                            'subtitle'  => __('Pick Link color', 'batiment'),
                            'default'   => '#e88e2e',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => __('Link Hover Color','batiment'),
                            'subtitle'  => __('Pick link hover color', 'batiment'),
                            'default'   => '#000',
                            'validate'  => 'color',                        
                        ),    
                            
                        array(
                            'id'        => 'footer_bg_color',
                            'type'      => 'color',
                            'title'     => __('Footer Bg Color','batiment'),
                            'subtitle'  => __('Pick color.', 'batiment'),
                            'default'   => '#252525',
                            'validate'  => 'color',                        
                        ),  
                       
                 ) 
            ) 
    ); 

       
    
    //Menu settings
     Redux::setSection( $opt_name, array(
        'title'  => __( 'Main Menu', 'batiment' ),
        'desc'   => __( 'Main Menu Style Here', 'batiment' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => __('Main Menu Text Color','batiment'),
                            'subtitle'  => __('Pick color', 'batiment'),    
                            'default'   => '#fff',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Main Menu Text Hover Color','batiment'),
                            'subtitle'  => __('Pick color', 'batiment'),           
                            'default'   => '#e88e2e',                 
                            'validate'  => 'color',                        
                        ), 
                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => __('Main Menu Text Active Color','batiment'),
                            'subtitle'  => __('Pick color', 'batiment'),
                            'default'   => '#e88e2e',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu Background Color','batiment'),
                            'subtitle'  => __('Pick bg color', 'batiment'),
                            'default'   => '#303745',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => __('Dropdown Menu Text Color','batiment'),
                            'subtitle'  => __('Pick text color', 'batiment'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu Hover Text Color','batiment'),
                            'subtitle'  => __('Pick text color', 'batiment'),
                            'default'   => '#e88e2e',
                            'validate'  => 'color',                        
                        ),     
                        
                        
                        array(
                            'id'        => 'drop_text_hoverbg_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu item Hover Background Color','batiment'),
                            'subtitle'  => __('Pick text color', 'batiment'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_border_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu item Seperate Border Color','batiment'),
                            'subtitle'  => __('Pick a color', 'batiment'),             
                            'default'   => '#fff',               
                            'validate'  => 'color',                        
                        ),              
                        
                        
                )
            )
        );
    
    
    
    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'batiment' ),
        'id'     => 'typography',
        'desc'   => __( 'You can specify your body and heading font here','batiment'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'batiment' ),
                'subtitle' => __( 'Specify the body font properties.', 'batiment' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '16px',
                    'font-family' => 'Lato',
                    'font-weight' => '400',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => __( 'Navigation Font', 'batiment' ),
                'subtitle' => __( 'Specify the menu font properties.', 'batiment' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#303745',                    
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '15px',                    
                    'font-weight' => 'Normal',
                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => __( 'Heading H1', 'batiment' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'batiment' ),
                'default'     => array(
                    'color'       => '#303745',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '48px',
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => __( 'Heading H2', 'batiment' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'batiment' ),
                'default'     => array(
                    'color'       => '#303745',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '36px',
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => __( 'Heading H3', 'batiment' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'batiment' ),
                'default'     => array(
                    'color'       => '#303745',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '24px',
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => __( 'Heading H4', 'batiment' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'batiment' ),
                'default'     => array(
                    'color'       => '#303745',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => __( 'Heading H5', 'batiment' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'batiment' ),
                'default'     => array(
                    'color'       => '#303745',
                    'font-style'  => '700',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '17px',
                    'line-height' => '27px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => __( 'Heading H6', 'batiment' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'batiment' ),
                'default'     => array(
                    'color'       => '#303745',
                    'font-style'  => '700',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '16x',
                    'line-height' => '20px'
                ),
                ),
                
                )
            )
                    
   
    );

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog', 'batiment' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog Settings', 'batiment' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                            array(
                                    'id'       => 'blog_banner_main', 
                                    'url'      => true,     
                                    'title'    => __( 'Blog Page Banner', 'batiment' ),                 
                                    'type'     => 'media',                                  
                            ),  
                            
                            array(
                                    'id'       => 'blog_title',                               
                                    'title'    => __( 'Blog  Title', 'batiment' ),
                                    'subtitle' => __( 'Enter Blog  Title Here', 'batiment' ),
                                    'type'     => 'text',                                   
                            ),
                            
                            array(
                                'id'       => 'blog-layout',
                                'type'     => 'image_select',
                                'title'    => __('Select Blog Layout', 'batiment'), 
                                'subtitle' => __('Select your blog layout', 'batiment'),
                                'options'  => array(
                                    'full'      => array(
                                        'alt'   => 'Blog Style 1', 
                                        'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                                    ),
                                    '2right'      => array(
                                        'alt'   => 'Blog Style 2', 
                                        'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                                    ),
                                    '2left'      => array(
                                        'alt'   => 'Blog Style 3', 
                                        'img'  => get_template_directory_uri().'/libs/img/2cl.png'
                                    ),                                  
                                ),
                                'default' => '2right'
                            ),                      
                        
                            array(
                                'id'       => 'blog-grid',
                                'type'     => 'select',
                                'title'    => __('Select Blog Gird', 'batiment'),                   
                                'desc'     => __('Select your blog gird layout', 'batiment'),
                                 //Must provide key => value pairs for select options
                                'options'  => array(
                                        '12'=>'1 Column',                                   
                                        '6' => '2 Column',                                          
                                        '4' => '3 Column',
                                        '3' => '4 Column'
                                        ),
                                    'default'  => '12',                                  
                            ),  
                                    
                            array(
                                'id'       => 'blog-author-post',
                                'type'     => 'select',
                                'title'    => __('Show Author Info', 'batiment'),                   
                                'desc'     => __('Select author info show or hide', 'batiment'),
                                 //Must provide key => value pairs for select options
                                'options'  => array(                                            
                                        'show' => 'Show',
                                        'hide' => 'Hide'
                                        ),
                                    'default'  => 'show',
                                
                            ), 
            
                         array(
                                'id'       => 'blog-readmore',
                                'type'     => 'switch',
                                'title'    => __('Show ReadMore', 'batiment'),                   
                                'desc'     => __('You can show/hide readmore at blog page', 'batiment'),
                                
                                'default'  => true,
                            ), 
                            
                        )
                    ) 
    
            );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Post', 'batiment' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                    'id'       => 'blog_banner', 
                                    'url'      => true,     
                                    'title'    => __( 'Blog Single page banner', 'batiment' ),                  
                                    'type'     => 'media',
                                    
                            ),  
                           
                            array(
                                    'id'       => 'blog-comments',
                                    'type'     => 'select',
                                    'title'    => __('Show Comment', 'batiment'),                   
                                    'desc'     => __('Select comments show or hide', 'batiment'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => 'Show',
                                            'hide' => 'Hide'
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-author',
                                    'type'     => 'select',
                                    'title'    => __('Show Ahthor Info', 'batiment'),                   
                                    'desc'     => __('Select author info show or hide', 'batiment'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => 'Show',
                                            'hide' => 'Hide'
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-post',
                                    'type'     => 'select',
                                    'title'    => __('Show Related Post', 'batiment'),                  
                                    'desc'     => __('Choose related product show or hide', 'batiment'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => 'Show',
                                            'hide' => 'Hide'
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                        )
                ) 
    
    
    );

    
    /*Portfolio Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Portfolio Section', 'batiment' ),
        'id'               => 'portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-camera',
        'fields'           => array(
        
            array(
                    'id'       => 'portfolio_single_image', 
                    'url'      => true,     
                    'title'    => __( 'Portfolio Single page banner image', 'batiment' ),                   
                    'type'     => 'media',
                    
            ),  
            
            array(
                    'id'       => 'portfolio_slug',                               
                    'title'    => __( 'Portfolio Slug', 'batiment' ),
                    'subtitle' => __( 'Enter Portfolio Slug Here', 'batiment' ),
                    'type'     => 'text',
                    'default'  => 'portfolios', 
                    
                ), 
             
             )
         ) 
    );


        /*Team Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Team Section', 'batiment' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(
        
            array(
                    'id'       => 'team_single_image', 
                    'url'      => true,     
                    'title'    => __( 'Team Single page banner image', 'batiment' ),                    
                    'type'     => 'media',
                    
            ),  
            
            array(
                    'id'       => 'team_slug',                               
                    'title'    => __( 'Team Slug', 'batiment' ),
                    'subtitle' => __( 'Enter team slug here', 'batiment' ),
                    'type'     => 'text',
                    'default'  => 'teams', 
                    
                ),     
             )
         ) 
    );

    /*Services Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Services Section', 'batiment' ),
        'id'               => 'service',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(        
            array(
                'id'       => 'team_single_image2', 
                'url'      => true,     
                'title'    => __( 'Services Single page banner image', 'batiment' ),                    
                'type'     => 'media',
                    
            ), 
            array(
                    'id'       => 'service_slug',                               
                    'title'    => __( 'Service Slug', 'batiment' ),
                    'subtitle' => __( 'Enter team slug here', 'batiment' ),
                    'type'     => 'text',
                    'default'  => 'service', 
                    
                ),      
            )
        ) 
    );

    

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Woocommerce', 'batiment' ),    
    'icon'   => 'el el-shopping-cart',    
        ) 
    ); 

    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Shop', 'batiment' ),
    'id'               => 'shop_layout',
    'customizer_width' => '450px',
    'subsection' =>'true',      
    'fields'           => array(                      
            array(
                'id'       => 'shop_banner', 
                'url'      => true,     
                'title'    => esc_html__( 'Shop page banner', 'batiment' ),                    
                'type'     => 'media',
            ), 
            array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'batiment'), 
                    'subtitle' => esc_html__('Select your shop layout', 'batiment'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => 'Shop Style 1', 
                            'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                        ),
                        'right-col'      => array(
                            'alt'   => 'Shop Style 2', 
                            'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                        ),
                        'left-col'      => array(
                            'alt'   => 'Shop Style 3', 
                            'img'  => get_template_directory_uri().'/libs/img/2cl.png'
                        ),                                  
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'batiment' ),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Row', 'batiment' ),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'batiment' ),
                    'on'       => esc_html__( 'Enabled', 'batiment' ),
                    'off'      => esc_html__( 'Disabled', 'batiment' ),
                    'default'  => true,
                ), 

                 array(
                'id'       => 'disable-sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Sidebar Disable For Single Product Page', 'batiment'),                
                'default'  => true,
            ), 
               
            )
        ) 
    );


    Redux::setSection( $opt_name, array(
        'title'  => __( 'Social Icons', 'batiment' ),
        'desc'   => __( 'Add your social icon here', 'batiment' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => __( 'Facebook Link', 'batiment' ),
                        'subtitle' => __( 'Enter Facebook Link', 'batiment' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => __( 'Twitter Link', 'batiment' ),
                        'subtitle' => __( 'Enter Twitter Link', 'batiment' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => __( 'Rss Link', 'batiment' ),
                        'subtitle' => __( 'Enter Rss Link', 'batiment' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => __( 'Pinterest Link', 'batiment' ),
                        'subtitle' => __( 'Enter Pinterest Link', 'batiment' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => __( 'Linkedin Link', 'batiment' ),
                        'subtitle' => __( 'Enter Linkedin Link', 'batiment' ),
                        'type'     => 'text',
                        
                    ),
                     array(
                        'id'       => 'google',                               
                        'title'    => __( 'Google Plus Link', 'batiment' ),
                        'subtitle' => __( 'Enter Google Plus  Link', 'batiment' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => __( 'Instagram Link', 'batiment' ),
                        'subtitle' => __( 'Enter Instagram Link', 'batiment' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => __( 'Youtube Link', 'batiment' ),
                        'subtitle' => __( 'Enter Youtube Link', 'batiment' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => __( 'Tumblr Link', 'batiment' ),
                        'subtitle' => __( 'Enter Tumblr Link', 'batiment' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => __( 'Vimeo Link', 'batiment' ),
                        'subtitle' => __( 'Enter Vimeo Link', 'batiment' ),
                        'type'     => 'text',                       
                    ),         
            ) 
        ) 
    );
    
    
   
    Redux::setSection( $opt_name, array(
    'title'  => __( 'Footer Option', 'batiment' ),
    'desc'   => __( 'Footer style here', 'batiment' ),
    'icon'   => 'el el-th-large',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(
                

                array(
                        'id'       => 'footer_logo',
                        'type'     => 'media',
                        'title'    => __( 'Footer Logo', 'batiment' ),
                        'subtitle' => __( 'Upload your footer logo', 'batiment' ),                  
                    ),
                
                array(
                        'id'       => 'show-social2',
                        'type'     => 'switch', 
                        'title'    => __('Show Social Icons at Footer', 'batiment'),
                        'subtitle' => __('You can select Social Icons show or hide', 'batiment'),
                        'default'  => true,
                    ),                      
                       
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => __( 'Footer CopyRight', 'batiment' ),
                    'subtitle' => __( 'Change your footer copyright text ?', 'batiment' ),
                    'default'  => '&copy; 2018 All Rights Reserved',
                ),  

                 array(
                        'id'       => 'copyright_bg',
                        'type'     => 'color',
                        'title'    => __( 'Copyright Background', 'batiment' ),
                        'subtitle' => __( 'Copyright Background Color', 'batiment' ),                  
                    ),
                           

              
            ) 
        ) 
    ); 

    Redux::setSection( $opt_name, array(
                'title'            => __( 'Footer Layout', 'batiment' ),
                'id'               => 'footer_layout',
                'customizer_width' => '450px',
                'subsection' =>'true',      
                'fields'           => array(    
                    
                    array(
                        'id'       => 'footer_layout',
                        'type'     => 'image_select',
                        'title'    => __('Header Layout', 'batiment'), 
                        'subtitle' => __('Select header layout. Choose between 1, 2 ,3 or 4 layout.', 'batiment'),
                        'options'  => array(
                            'style1'      => array(
                                'alt'   => 'Footer Style 1', 
                                'img'   => get_template_directory_uri().'/libs/img/style1.png'
                                
                            ),
                            'style2'      => array(
                                'alt'   => 'Footer Style 2', 
                                'img'   => get_template_directory_uri().'/libs/img/style2.png'
                            ),
                            'style3'      => array(
                                'alt'   => 'Footer Style 3', 
                                'img'  => get_template_directory_uri().'/libs/img/style3.png'
                            ),
                            'style4'      => array(
                                'alt'   => 'Footer Style 4', 
                                'img'   => get_template_directory_uri().'/libs/img/style4.png'
                            ),
                            'style5'      => array(
                                'alt'   => 'Footer Style 5', 
                                'img'   => get_template_directory_uri().'/libs/img/style5.png'
                            ),
                            
                        ),
                        'default' => 'style1'
                    ),                           
                    
            )
        ) 

);
    
    
    Redux::setSection( $opt_name, array(
    'title'  => __( '404 Error Page', 'batiment' ),
    'desc'   => __( '404 details  here', 'batiment' ),
    'icon'   => 'el el-error-alt',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(

                array(
                        'id'       => 'title_404',
                        'type'     => 'text',
                        'title'    => __( 'Title', 'batiment' ),
                        'subtitle' => __( 'Enter title for 404 page', 'batiment' ), 
                        'default'  => '404',                
                    ),  
                
                array(
                        'id'       => 'text_404',
                        'type'     => 'text',
                        'title'    => __( 'Text', 'batiment' ),
                        'subtitle' => __( 'Enter text for 404 page', 'batiment' ),  
                        'default'  => 'Page Not Found',             
                    ),                      
                       
                
                array(
                        'id'       => 'back_home',
                        'type'     => 'text',
                        'title'    => __( 'Back to Home Button Label', 'batiment' ),
                        'subtitle' => __( 'Enter label for "Back to Home" button', 'batiment' ),
                        'default'  => 'Back to Homepage',   
                                    
                    ),                
            
                                  
            ) 
        ) 
    ); 
    


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
    
    //add_filter('redux/options/' . $this->args['opt_name'] . '/compiler', array( $this, 'compiler_action' ), 10, 3);

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
     * so you must use get_template_directory_uri()() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'batiment' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'batiment' ),
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
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

