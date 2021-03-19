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
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Redux Edit Frame', 'redux-framework-demo' ),
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
        //'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_icon'       => 'dashicons dashicons-editor-table',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        //'global_variable'      => '',
        'global_variable'      => 'selimrezaswadhin',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        //'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        //'page_priority'        => null,
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        //'menu_icon'            => get_template_directory_uri().'/assets/img/2-col-portfolio.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        //'page_slug'            => 'redux_demo',
        'page_slug'            => 'selim_demo',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        //'save_defaults'        => true,
        'save_defaults'        => false,
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
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/Selim-Reza-Swadhin',
        'title' => 'Visit me on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/',
        'title' => 'Like me on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/SrSwadhin',
        'title' => 'Follow me on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/',
        'title' => 'Find me on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'redux-framework-demo' );

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


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

//Main Section
Redux::setSection($opt_name, array(
	'title'=>__('Header', 'RA'),
	'id'=>'header',
	'desc'=>__('This is header section area','RA'),
	//'customizer_width' => '400px',
	'icon'=>'el el-check'
));

//Sub Section Start
Redux::setSection($opt_name, array(
	'title'=>__('Logo', 'RA'),
	'id'=>'mediaa-gallery',
	'desc'=>__('This is logo area','RA'),
	'subsection'=>true,
	//'customizer_width' => '400px',
	'icon'=>'el el-address-book',
	'fields'=>array(

		//logo upload
		array(
			'id'       => 'optta-logo',
			'type'     => 'gallery',
			'title'    => __( 'Enter your logo', 'RA' ),
			'subtitle' => __( 'You can upload any kinds of logo', 'RA' ),
			'desc'     => __( 'This is logo description area.', 'RA' )
		),

		//logo text
		array(
			'id'       => 'optt-text',
			'type'     => 'text',
			'title'    => __( 'Enter your logo text', 'RA' ),
			'subtitle' => __( 'You can upload any kinds of text', 'RA' ),
			'desc'     => __( 'This is logo description text area.', 'RA' )
		),
		//banner ads upload
		array(
			'id'       => 'optt-bannerads',
			'type'     => 'media',
			//'url'      => true,
			'title'    => __( 'Enter your banner', 'RA' ),
			'subtitle' => __( 'You can upload any kinds of banner', 'RA' ),
			'desc'     => __( 'This is banner size 1000px/2000px.', 'RA' ),
			'compiler'=>true,
			'default'=>array(
				//'url'=> get_template_directory_uri().'/wp-content/uploads/2021/03/hosneara1.jpg'
				//'url'=> 'http://localhost/ReduxTutorial/wp-content/uploads/2021/03/bl6.jpg'
				'url'=> 'http://localhost/ReduxTutorial/wp-content/uploads/2021/03/safinahali.jpg'
			)
		),
	)
));

//Sub Section Banner Ads Start
Redux::setSection($opt_name, array(
	'title'=>__('Banner Ads', 'RA'),
	'id'=>'media-banner-gallery',
	'desc'=>__('This is banner area','RA'),
	'subsection'=>true,
	//'customizer_width' => '400px',
	'icon'=>'el el-address-book',
	'fields'=>array(

		//banner ads upload
		array(
			'id'       => 'banner-ads-gallery',
			'type'     => 'switch',
			'title'    => __( 'Enter your banner', 'RA' ),
			'subtitle' => __( 'You can upload any kinds of banner', 'RA' ),
			'desc'     => __( 'This is banner description area.', 'RA' ),
			'default'=> 0,
			'on'=>'Enable',
			'off'=>'Disable'
		),
	)
));


Redux::setSection($opt_name, array(
	'title'=>__('Favicon', 'RA'),
	'id'=>'favicon-gallery',
	'desc'=>__('This is favicon area','RA'),
	'subsection'=>true,
	//'customizer_width' => '400px',
	'icon'=>'el el-address-book',
	'fields'=>array(

	//favicon upload
	array(
		'id'       => 'optt-favicon',
		'type'     => 'gallery',
		'title'    => __( 'Enter your favicon', 'RA' ),
		'subtitle' => __( 'You can upload any kinds of logo', 'RA' ),
		'desc'     => __( 'This is favicon description area.', 'RA' )
	),
	)
));

//Footer Section
Redux::setSection($opt_name, array(
	'title'=>__('Footer', 'RA'),
	'id'=>'footer',
	'desc'=>__('This is footer section area','RA'),
	//'customizer_width' => '400px',
	'icon'=>'el el-check'
));

//Sub Section Start
Redux::setSection($opt_name, array(
	'title'=>__('Footer', 'RA'),
	'id'=>'footer-copyright',
	'desc'=>__('This is footer area','RA'),
	'subsection'=>true,
	//'customizer_width' => '400px',
	'icon'=>'el el-address-book',
	'fields'=>array(
		//footer text
		array(
			'id'       => 'footer-right',
			'type'     => 'text',
			'title'    => __( 'Enter your text', 'RA' ),
			'subtitle' => __( 'You can upload any kinds of logo', 'RA' ),
			'desc'     => __( 'This is favicon description area.', 'RA' ),
			'default'=>'Write here'
		),
		//footer text

	)
)
);

//Sub Section Start
Redux::setSection($opt_name, array(
		'title'=>__('Developer URL', 'RA'),
		'id'=>'footer-developer-url',
		'desc'=>__('This is footer developer area','RA'),
		'subsection'=>true,
		//'customizer_width' => '400px',
		'icon'=>'el el-address-book',
		'fields'=>array(
			//footer text
			array(
				'id'       => 'footer-devv-url',
				'type'     => 'text',
				'title'    => __( 'Enter developer url', 'RA' ),
				'subtitle' => __( 'You can upload any kinds of logo', 'RA' ),
				'desc'     => __( 'This is favicon description area.', 'RA' ),
				'default'=>'Write Developer Url'
			),
		)
	)
);

//Sub Section Start
Redux::setSection($opt_name, array(
		'title'=>__('Developer Name', 'RA'),
		'id'=>'footer-developer-name',
		'desc'=>__('This is footer developer area','RA'),
		'subsection'=>true,
		//'customizer_width' => '400px',
		'icon'=>'el el-address-book',
		'fields'=>array(
			//footer text
			array(
				'id'       => 'footer-devv-name',
				'type'     => 'text',
				'title'    => __( 'Enter developer name', 'RA' ),
				'subtitle' => __( 'You can upload any kinds of logo', 'RA' ),
				'desc'     => __( 'This is favicon description area.', 'RA' ),
				'default'=>'Write Developer Name'
			),
		)
	)
);

//Sub Section color button Start
Redux::setSection($opt_name, array(
		'title'=>__('Footer Background', 'RA'),
		'id'=>'footer-background',
		'desc'=>__('This is footer developer area','RA'),
		'subsection'=>true,
		'icon'=>'el el-address-book',
		'fields'=>array(
			//footer text
			array(
				'id'       => 'footer-back',
				'type'     => 'color',
				'title'    => __( 'Select Color', 'RA' ),
				'default'=>'#45ed36',
				//'mode'     => 'background',
				'validate'=>'color'
			),
		)
	)
);


//Sub Section footer widget color button Start
Redux::setSection($opt_name, array(
		'title'=>__('Footer Widget Background', 'RA'),
		'id'=>'footer-background-widget',
		'desc'=>__('This is footer developer area','RA'),
		'subsection'=>true,
		'icon'=>'el el-address-book',
		'fields'=>array(
			//footer text
			array(
				'id'       => 'footer-back-widget',
				'type'     => 'color',
				'title'    => __( 'Select Color', 'RA' ),
				'default'=>'#45ed36',
				//'mode'     => 'background',
				'validate'=>'color'
			),
		)
	)
);

//Sub Section switch button Start
Redux::setSection($opt_name, array(
		'title'=>__('Footer Switch', 'RA'),
		'id'=>'footer-switch',
		'desc'=>__('This is footer developer area','RA'),
		'subsection'=>true,
		'icon'=>'el el-address-book',
		'fields'=>array(
			//footer switch
			array(
				'id'       => 'footer-backswitch',
				'type'     => 'switch',
				'title'    => __( 'Switch', 'RA' ),
				'default'=>false
			),
		)
	)
);

//Sub Section social network Start
Redux::setSection($opt_name, array(
		'title'=>__('Social Network', 'RA'),
		'id'=>'footer-social',
		'desc'=>__('This is footer social area','RA'),
		'subsection'=>true,
		'icon'  => 'el el-twitter',
		'fields'=>array(
			//footer social network
			array(
				'id'       => 'footer-social-network',
				'type'     => 'sortable',
				'title'    => __( 'Social Link', 'RA' ),
				'label'=>true,
				'options'=>array(
					'Facebook'=>'Enter your facebook url',
					'Twitter'=>'Enter your twitter url',
					'Instagram'=>'Enter your instagram url',
					'LinkedIn'=>'Enter your linkedin url'
				)
			),
		)
	)
);

/*    Redux::setSection( $opt_name, array(
        'title'            => __( 'Basic Fields', 'redux-framework-demo' ),
        'id'               => 'basic',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );


   Redux::setSection( $opt_name, array(
        'title'            => __( 'Checkbox', 'redux-framework-demo' ),
        'id'               => 'basic-checkbox',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
        'fields'           => array()
)
)
*/



    // -> START Editors


    // -> START Color Selection



    // -> START Design Fields


    // -> START Media Uploads


    // -> START Presentation Fields


    // -> START Switch & Button Set


    // -> START Select Fields


    // -> START Slider / Spinner


    // -> START Typography


    // -> START Additional Types


    // -> START Validation


    // -> START Required






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

