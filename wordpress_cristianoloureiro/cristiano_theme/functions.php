<?php

function cristiano_setup() {

	load_theme_textdomain( 'cristiano' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );



	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'	=> __( 'Top Menu', 'cristiano' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	//add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );
	$args = array(
		'width'         => 4626,
		'height'        => 3120,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
	);
	add_theme_support( 'custom-header', $args );

}

function cristiano_scripts() {

	wp_register_style('cristiano_css_main', get_template_directory_uri() . '/assets/css/main.css');
	wp_register_style('cristinao_css_fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('cristiano_css_main');
	wp_enqueue_style('cristinao_css_fontawesome');
	
	//wp_enqueue_script( 'jquery' );
	wp_enqueue_script('cristiano_js_jquery',  get_template_directory_uri() . '/assets/js/jquery.min.js');
	wp_enqueue_script('cristiano_js_skel',  get_template_directory_uri() . '/assets/js/skel.min.js');
	wp_enqueue_script('cristiano_js_util',  get_template_directory_uri() . '/assets/js/util.js');
	wp_enqueue_script('cristiano_js_main',  get_template_directory_uri() . '/assets/js/main.js');
}

// create custom plugin settings menu
add_action('admin_menu', 'cristiano_theme_create_menu');

function cristiano_theme_create_menu() {

	//create new top-level menu
	add_menu_page('Theme Settings', 'Theme Settings', 'administrator', __FILE__, 'cristiano_theme_settings_page'  );

	//call register settings function
	add_action( 'admin_init', 'register_cristiano_theme_settings' );
}


function register_cristiano_theme_settings() {
	//register our settings
	register_setting( 'cristiano-theme-settings-group', 'cr_theme_banner_title' );
	register_setting( 'cristiano-theme-settings-group', 'cr_theme_banner_text' );
	register_setting( 'cristiano-theme-settings-group', 'cr_theme_footer_text' );
	register_setting( 'cristiano-theme-settings-group', 'cr_theme_index_cat' );
	register_setting( 'cristiano-theme-settings-group', 'cr_theme_index_cat_count' );
}

function cristiano_theme_settings_page() {
?>
<div class="wrap">
<h1>Theme Options</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'cristiano-theme-settings-group' ); ?>
    <?php do_settings_sections( 'cristiano-theme-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Banner Title</th>
        <td><input style="width:100%" type="text" name="cr_theme_banner_title" value="<?php echo esc_attr( get_option('cr_theme_banner_title') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Banner Text</th>
        <td><input  style="width:100%" type="text" name="cr_theme_banner_text" value="<?php echo esc_attr( get_option('cr_theme_banner_text') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Footer Text</th>
        <td><textarea  style="width:100%" name="cr_theme_footer_text"><?php echo esc_attr( get_option('cr_theme_footer_text') ); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Homepage Articles Category</th>
        <td>
        	<?php wp_dropdown_categories(array('name' => 'cr_theme_index_cat', 'selected' => get_option('cr_theme_index_cat'))); ?>
        
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">Homepage Article count (default 4)</th>
        <td><input  style="width:100%" type="text" name="cr_theme_index_cat_count" value="<?php echo esc_attr( get_option('cr_theme_index_cat_count') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php }



add_action( 'after_setup_theme', 'cristiano_setup' );
add_action( 'wp_enqueue_scripts', 'cristiano_scripts' );
