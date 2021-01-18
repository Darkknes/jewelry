<?php
/**
 * jewelry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jewelry
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'jewelry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jewelry_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on jewelry, use a find and replace
		 * to change 'jewelry' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jewelry', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'jewelry' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'jewelry_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'jewelry_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jewelry_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jewelry_content_width', 640 );
}
add_action( 'after_setup_theme', 'jewelry_content_width', 0 );


function jewelry_styles() {
	wp_enqueue_style ('base', get_stylesheet_directory_uri (). '/assets/css/all.css');
	wp_enqueue_style ('grid', get_stylesheet_directory_uri (). '/assets/css/grid.css');
	wp_enqueue_style ('bootstrap', get_stylesheet_directory_uri (). '/assets/css/bootstrap.css');
	wp_enqueue_style ('font', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	wp_enqueue_style ('fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
}

add_action( 'wp_enqueue_scripts', 'jewelry_styles' );




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jewelry_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jewelry' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jewelry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'jewelry_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jewelry_scripts() {
	wp_enqueue_style( 'jewelry-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jewelry-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jewelry-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jewelry_scripts' );

function add_script(){
	wp_enqueue_script( 'base', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
	wp_enqueue_script( 'bases', get_template_directory_uri() . '/assets/js/bootstrap.js');
	wp_enqueue_script( 'bases','https://cdnjs.cloudflare.com/ajax/libs/jquery-compat/3.0.0-alpha1/jquery.min.js');

}
add_action('wp', 'add_script');


add_filter( 'tc_skip_development_directories', '__return_true' );

function wpdocs_add_post_link( $html ){
	$html = str_replace( '<a ', '<a class="page-link" ', $html );
	return $html;
}
add_filter( 'next_post_link', 'wpdocs_add_post_link' );
add_filter( 'previous_post_link', 'wpdocs_add_post_link' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//Add classes Menu

function add_classes_on_li($classes, $item, $args) {
	$classes[] = 'nav-item';
	return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass) {
	return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

//Comment

function my_comments_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="container dropping">
				<div class="row dropping">
					<div class="col-md-1 dropping">
						<?php echo get_avatar( $comment); ?>
					</div>

					<div class="col-md-11 dropping">
						<div class="row dropping">
							<div class="col-md-12 dropping">
								<div class="comment-content">							
									<div class="comment_author">
										<?php comment_author( $comment ); ?>-
									</div>
									<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'REPLY', 'jewelry' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
									<p class="dates"><?php comment_date('M d'); ?></p>
								</div>
								<div class="comment-content comment_text">
									<?php comment_text(); ?>										
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</li>
	<?php
}

//Remove fields cookies 

function remove_comment_fields_cookies($fields) {
	unset($fields['cookies']);
	return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields_cookies');

//Remove fields url 

function remove_comment_fields_url($fields) {
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields_url');


function sixteen_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'sixteen_move_comment_field_to_bottom' );

//Pagination

function wp_corenavi() {
	global $wp_query;
	$total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
	$a['total'] = $total;
	$a['mid_size'] = 3;
	$a['end_size'] = 1;
	$a['prev_text'] = '<';
	$a['next_text'] = '>'; 

	if ( $total > 1 ) echo '<nav class="pagination">';
	echo paginate_links( $a );
	if ( $total > 1 ) echo '</nav>';
}




