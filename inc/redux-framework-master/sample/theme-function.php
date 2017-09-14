<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

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
        'opt_name'             => $ts_theme,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'TS Theme Option', 'redux-framework-demo' ),
        'page_title'           => __( 'TS Theme Option', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-site',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'ts_theme_option',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
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
        'href'  => '#',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => '#',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => '#',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => '#',
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
        $args['intro_text'] = sprintf( __( '<p>Hi ! Your every headache about this site will find in this theme panel </p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Hi ! Your every headache about this site will find in this theme panel  </p>', 'redux-framework-demo' );

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
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    // -> START Basic Fields
	
	// General
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'General', 'redux-framework-demo' ),
        'id'               => 'ts-general-main',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cog'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Basic Elements', 'redux-framework-demo' ),
        'id'               => 'ts-general-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
			array(
                'id'       => 'ts_feature_post_icon',
				'type'     => 'media', 
				'url'      => true,
				'title'    => __('Icon for list', 'redux-framework-demo'),
				'subtitle' => __('List icon like bullet/square/circle e.t.c', 'redux-framework-demo'),
				'default'  => array(
					'url'=> get_theme_file_uri().'/assets/img/bullet-dot.png',
				),

			),
			array(
                'id'       => 'ts_res_menu_icon',
				'type'     => 'media', 
				'url'      => true,
				'title'    => __('Responsive Menubar icon', 'redux-framework-demo'),
				'subtitle' => __('It will be visible on responsive view', 'redux-framework-demo'),
				'default'  => array(
					'url'=> get_theme_file_uri().'/assets/img/responsive-bar.png',
				),

			)
		)
	)
);

Redux::setSection( $opt_name, array(
        'title'            => __( 'Color', 'redux-framework-demo' ),
        'id'               => 'ts-general-color-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
			array(
				'id'       => 'ts_link_color',
				'type'     => 'color',
				'title'    => __('All link Color', 'redux-framework-demo'), 
				'subtitle' => __('Pick a link color for the theme', 'redux-framework-demo'),
				'default'  => '#2bbd3e',
				'validate' => 'color',
			),
			array(
				'id'       => 'ts_link_color_hover',
				'type'     => 'color',
				'title'    => __('All link hover Color', 'redux-framework-demo'), 
				'subtitle' => __('Pick a link color for hover', 'redux-framework-demo'),
				'default'  => '#dbdbdb',
				'validate' => 'color',
			),
			array(
				'id'       => 'ts_link_color_active',
				'type'     => 'color',
				'title'    => __('All link active Color', 'redux-framework-demo'), 
				'subtitle' => __('Pick a link color for active', 'redux-framework-demo'),
				'default'  => '#2bbd3e',
				'validate' => 'color',
			),
			array( 
				'id'       => 'ts_header_border_color',
				'type'     => 'color',
				'title'    => __('Header Border Option', 'redux-framework-demo'),
				'subtitle' => __('Only color validation can be done on this field type', 'redux-framework-demo'),
				'validate' => 'color',
				'default'  => '#ededed',
			)
		)
	)
);

// Comments

Redux::setSection( $opt_name, array(
        'title'            => __( 'Comments Area', 'redux-framework-demo' ),
        'id'               => 'ts-comment-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
			array(
                'id'       => 'ts_comment_title',
				'type'     => 'text',
				'title'    => __('Comments Title', 'redux-framework-demo'),
				'default'  => 'Leave a Reply'

			),
			array(
                'id'       => 'ts_comment_btn',
				'type'     => 'text',
				'title'    => __('Submit Button', 'redux-framework-demo'),
				'default'  => 'Submit'

			)
		)
	)
);


	// Header
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'redux-framework-demo' ),
        'id'               => 'ts-header-main',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Option', 'redux-framework-demo' ),
        'id'               => 'logo-upload',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'All header elements in there', 'redux-framework-demo' )  ,
        'fields'           => array(
			 array(
                'id'       => 'ts_upload_logo',
				'type'     => 'media', 
				'url'      => true,
				'title'    => __('Upload Logo', 'redux-framework-demo'),
				'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),
				'default'  => array(
					'url'=> get_theme_file_uri().'/assets/img/logo-2.png',
				),

			),
			array(
				'id'       => 'ts_logo_dimensions',
				'type'     => 'dimensions',
				'units'    => 'px',
				'title'    => __('Logo Resize', 'redux-framework-demo'),
				'subtitle' => __('Allow you to choose width/height', 'redux-framework-demo'),
			),
			array(
				'id'             => 'ts_header_logo_spacing',
				'type'           => 'spacing',
				'mode'           => 'absolute',
				'units'          => 'px',
				'units_extended' => 'false',
				'top'	   		 => true,
				'bottom'   		 => true,
				'left'	   		 => true,
				'right'	   		 => true,
				'title'          => __('Make space on logo', 'redux-framework-demo'),
				'subtitle'       => __('Allow you to choose the spacing or margin they want.', 'redux-framework-demo'),
				'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'redux-framework-demo'),
				
			),
		)
	)
);


	// Content
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Content', 'redux-framework-demo' ),
        'id'               => 'ts-content-main',
        'desc'             => __( 'All content and page', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-website-alt'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Home page', 'redux-framework-demo' ),
        'id'               => 'ts-content-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'All Home page elements in there', 'redux-framework-demo' )  ,
        'fields'           => array(
			array(
                'id'       => 'ts_header_text',
				'type'     => 'editor',
				'title'    => __('Header Text', 'redux-framework-demo'),
				'subtitle' => __('This is basick editor to update header content', 'redux-framework-demo'),
				'default'  => 'Hola, I am the Chief Sumo at Sumo.com  AppSumo.com, where we help entrepreneurs kick more ass. Before that, I was a cubicle monkey at Intel, #30 at Facebook and #4 at Mint. These are my stories on marketing, starting a business, personal improvement, and productivity tips.',

			),
			array(
                'id'       => 'ts_post_title',
				'type'     => 'text',
				'title'    => __('Post Title', 'redux-framework-demo'),
				'subtitle' => __('Add post from admin menu', 'redux-framework-demo'),
				'default'  => 'Latest posts:',

			),
			array(
                'id'       => 'ts_feature_post_title',
				'type'     => 'text',
				'title'    => __('Feature List Title', 'redux-framework-demo'),
				'default'  => 'Best articles to start with:',

			),
			array(
				'id'       => 'ts_newsletter_area_switch',
				'type'     => 'switch', 
				'title'    => __('Enable/Dsable Newslatter', 'redux-framework-demo'),
				'default'  => false,
			),
			array(
                'id'       => 'ts_newsletter_title',
				'type'     => 'text',
				'title'    => __('News letter title', 'redux-framework-demo'),
				'default'  => 'Get new posts via email:',
			),
			array(
                'id'       => 'ts_newsletter_area',
				'type'     => 'editor',
				'title'    => __('News letter area', 'redux-framework-demo'),
				'subtitle' => __('This is basick editor', 'redux-framework-demo'),

			),
			array(
                'id'       => 'ts_category_title',
				'type'     => 'text',
				'title'    => __('Categories List Title', 'redux-framework-demo'),
				'default'  => 'Categories on Tristben:',

			),
			array(
				'id'       => 'ts_archive_area_switch',
				'type'     => 'switch', 
				'title'    => __('Enable/Dsable Archive', 'redux-framework-demo'),
				'default'  => true,
			),
			array(
                'id'       => 'ts_archives_title',
				'type'     => 'text',
				'title'    => __('Monthly archives Title', 'redux-framework-demo'),
				'subtitle' => __('Title from archive area', 'redux-framework-demo'),
				'default'  => 'Monthly archives on Tristben:',

			),
			array(
                'id'       => 'ts_archives_link',
				'type'     => 'text',
				'title'    => __('Monthly archives link', 'redux-framework-demo'),
				'subtitle' => __('Archives page link', 'redux-framework-demo'),
				'default'  => 'http://okdork.com/archives/',

			),
			array(
                'id'       => 'ts_search_head_line',
				'type'     => 'text',
				'title'    => __('Search Area Title', 'redux-framework-demo'),
				'subtitle' => __('Head line', 'redux-framework-demo'),
				'default'  => 'Thanks again for coming by. If you like what you have read please',

			),
			array(
                'id'       => 'ts_search_sub_line',
				'type'     => 'text',
				'title'    => __('Search Area Subitle', 'redux-framework-demo'),
				'subtitle' => __('Sub line', 'redux-framework-demo'),
				'default'  => 'If you have a specific question, search here:',

			),
			array(
                'id'       => 'ts_search_place_holder',
				'type'     => 'text',
				'title'    => __('Search Input Placeholder', 'redux-framework-demo'),
				'subtitle' => __('Input text', 'redux-framework-demo'),
				'default'  => 'What are you looking?',

			),
			array(
                'id'       => 'ts_related_pots_category',
				'type'     => 'text',
				'title'    => __('Related post tile', 'redux-framework-demo'),
				'default'  => 'Related Post',

			),
		)
	)
);

// Search
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Search', 'redux-framework-demo' ),
        'id'               => 'ts-search-main',
        'desc'             => __( 'All search elements', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-search-alt'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Search Elements', 'redux-framework-demo' ),
        'id'               => 'ts-search-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
			array(
                'id'       => 'ts_serch_text',
				'type'     => 'text', 
				'url'      => true,
				'title'    => __('Message', 'redux-framework-demo'),
				'subtitle' => __('Not found notification', 'redux-framework-demo'),
				'default'  => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',

			),
			array(
                'id'       => 'ts_search_back_home',
				'type'     => 'text', 
				'url'      => true,
				'title'    => __('Back to Home', 'redux-framework-demo'),
				'default'  => 'Back to',

			)
		)
	)
);


// 404
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( '404', 'redux-framework-demo' ),
        'id'               => 'ts-404-main',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-error'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( '404 Elements', 'redux-framework-demo' ),
        'id'               => 'ts-404-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
			array(
                'id'       => 'ts_404_img',
				'type'     => 'media', 
				'url'      => true,
				'title'    => __('404 Image', 'redux-framework-demo'),
				'subtitle' => __('Image about 404', 'redux-framework-demo'),
				'default'  => array(
					'url'=> get_theme_file_uri().'/assets/img/404img2.gif',
				),

			),
			array(
                'id'       => 'ts_404_text',
				'type'     => 'text', 
				'url'      => true,
				'title'    => __('404 text', 'redux-framework-demo'),
				'subtitle' => __('Notification about 404', 'redux-framework-demo'),
				'default'  => 'ops!!! Page not found',

			)
		)
	)
);


	// Footer
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'redux-framework-demo' ),
        'id'               => 'ts-footer-opt',
        'customizer_width' => '400px',
        'icon'             => 'el el-flag'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Info', 'redux-framework-demo' ),
        'id'               => 'ts-footer-info',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'All Footer elements in there', 'redux-framework-demo' )  ,
        'fields'           => array(
			array(
                'id'       => 'ts_site_info',
				'type'     => 'text',
				'title'    => __('Copyright text', 'redux-framework-demo'),
				'subtitle' => __('This is copyright text for footer', 'redux-framework-demo'),
				'default'  => 'All right reserved & copyright by Nishan Mazumder © 2020 Noah Kagan',

			),
			array(
                'id'       => 'ts_footer_image',
				'type'     => 'media',
				'url'		=> true,
				'title'    => __('Footer logo', 'redux-framework-demo'),
				'subtitle' => __('Upload your footer logo', 'redux-framework-demo'),
				'default'  => array(
					'url'=> get_theme_file_uri().'/assets/img/logo-2.png',
				),

			),
			array(
                'id'       => 'ts_footer_image_dimension',
				'type'     => 'dimensions',
				'title'    => __('Footer logo resize', 'redux-framework-demo'),
				'subtitle' => __('Allow you to choose width/height to footer logo', 'redux-framework-demo'),
				'units'    => 'px',
				
			),
			array(
				'id'             => 'ts_footer_image_spacing',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => __('Make space on logo', 'redux-framework-demo'),
				'subtitle'       => __('Allow you to choose the spacing or margin they want.', 'redux-framework-demo'),
				'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'redux-framework-demo'),
				'default'            => array(
					'margin-top'     => '10px',
					'units'   => 'px', 
				),
				
			)
		)
	)
);
	
		// Code Editor
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Code Editor', 'redux-framework-demo' ),
        'id'               => 'ts-code-editor-main',
        'desc'             => __( 'General area for some elements.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-file-edit'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Edit CSS', 'redux-framework-demo' ),
        'id'               => 'ts-code-editor-main-sub',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' )  ,
        'fields'           => array(
			array(
                'id'       => 'ts-code-edit-css',
				'type'     => 'ace_editor', 
				'mode'     => 'css',
				'theme'    => 'monokai',
				'title'    => __('You may edit theme css', 'redux-framework-demo'),

			)
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
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
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

