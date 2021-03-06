<?php
/**
 * Anti-Flash-White functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Anti-Flash-White
 */



if ( ! function_exists( 'anti_flash_white_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function anti_flash_white_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Anti-Flash-White, use a find and replace
	 * to change 'Anti-Flash-White' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'anti-flash-white', get_template_directory() . '/languages' );

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
	// register_nav_menus( array(
	// 	'primary' => esc_html__( 'Primary', 'Anti-Flash-White' ),
	// ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'anti_flash_white_custom_background_args', array(
		'default-color' => 'f0f0f0',
		'default-image' => get_template_directory_uri() . '/inc/texture.png',
		'default-repeat'         => 'tile',
		'default-position-x'     => '',
		'default-attachment'     => 'fixed',
	) ) );


}
endif;
add_action( 'after_setup_theme', 'anti_flash_white_setup' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


// boostrap registraion menu

add_action( 'after_setup_theme', 'wpt_setup' );	
// if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {  
        register_nav_menu( 'primary', __( 'Primary navigation', 'Anti-Flash-White' ) );
    } 
    // endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anti_flash_white_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'anti_flash_white_content_width', 640 );
}
add_action( 'after_setup_theme', 'anti_flash_white_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anti_flash_white_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'Anti-Flash-White' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'Anti-Flash-White' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'Anti-Flash-White' ),
		'id'            => 'sidebar_2',
		'description'   => esc_html__( 'Add widgets here.', 'Anti-Flash-White' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woo Sidebar', 'Anti-Flash-White' ),
		'id'            => 'woo-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'Anti-Flash-White' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'anti_flash_white_widgets_init' );

/**
 * Enqueue scripts and styles placed in head.
 */
function anti_flash_white_styles() {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' , array(), '3.3.6');

	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/inc/font-awesome/css/font-awesome.min.css', array(), '4.6.3');
	wp_enqueue_style( 'jssocial-style', get_template_directory_uri() . '/css/theme.css', array(), '4.6.3');
	wp_enqueue_style( 'jssocials-style-flat', get_template_directory_uri() . '/inc/jssocials/jssocials.css', array(), '1.2.1');
	wp_enqueue_style( 'custom-bootstrap-style', get_template_directory_uri() . '/inc/jssocials/jssocials-theme-flat.css', array(), '1.2.1');


}
add_action( 'wp_enqueue_scripts', 'anti_flash_white_styles' );


/**
 * Enqueue scripts placed in footer.
 */
function anti_flash_white_scripts() {

	wp_enqueue_script( 'js-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.12.4', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true );

	wp_enqueue_style( 'Anti-Flash-White-style', get_stylesheet_uri() );

	wp_enqueue_script( 'Anti-Flash-White-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'Anti-Flash-White-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'JS-socialss', get_template_directory_uri() . '/inc/jssocials/jssocials.min.js', array(), '1.2.1', true );

	wp_enqueue_script( 'theme-customs', get_template_directory_uri() . '/js/theme.js', array(), '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anti_flash_white_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require_once('wp_bootstrap_navwalker.php');

add_action( 'init', 'cd_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function cd_add_editor_styles() {

    add_editor_style( get_stylesheet_uri() );

}



function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <?php edit_comment_link( __( '(Edit)','Anti-Flash-White' ), '  ', '' );  ?>
    <div class="comment-author vcard">
        <span class="fa fa-comment-o fa-2x"></span>
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">said on</span>','Anti-Flash-White' ), get_comment_author_link() ); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s at %2$s' ,'Anti-Flash-White'), get_comment_date(),  get_comment_time() ); ?></a>


    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ,'Anti-Flash-White' ); ?></em>
         
    <?php endif; ?>

   

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }


add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ,'Anti-Flash-White' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ,'Anti-Flash-White' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ,'Anti-Flash-White' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
    );
    
    return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun','Anti-Flash-White' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-success'; // since WP 4.1
    
    return $args;
}

//Read More
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('<br/>Read More...', 'Anti-Flash-White') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function custom_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'Anti-Flash-White' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<button class="nav-btn btn btn-success pull-left">%link</button>', _x( '<i class="fa fa-chevron-left"></i> %title', 'Previous post link', 'Anti-Flash-White' ) );
				next_post_link(     '<button class="nav-btn btn btn-success pull-right">%link</button>',     _x( '%title <i class="fa fa-chevron-right"></i>', 'Next post link',     'Anti-Flash-White' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7"><main id="main" class="site-main" role="main">';
}

function my_theme_wrapper_end() {
  echo '</main></div>';
}
?>