<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'cherry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cherry_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replaces
		 * to change 'cherry' to the name of your theme in all the template files.
		 */
		// load_theme_cherry( 'cherry', get_template_directory() . '/languages' );

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

		add_theme_support( 'custom-header' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary', 'cherry' ),
				'footer-menu' => __( 'Footer Menu', 'cherry' ),
				'social-menu' => __( 'Social Links Menu', 'cherry' ),
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
			)
		);

		/*
		* Thêm chức năng post format
		*/
		add_theme_support( 'post-formats',
			array(
					'video',
					'image',
					'link',
					'gallery',
					'quote',
					'audio'
	
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'cherry' ),
					'shortName' => __( 'S', 'cherry' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'cherry' ),
					'shortName' => __( 'M', 'cherry' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'cherry' ),
					'shortName' => __( 'L', 'cherry' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'cherry' ),
					'shortName' => __( 'XL', 'cherry' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

	}
endif;
add_action( 'after_setup_theme', 'cherry_setup' );



////-----------------------------------------------------------------------------------------LOAD MENU---------------------------------------------------------------------------------

if ( ! function_exists( 'cherry_menu' ) ) {
	function cherry_menu( $slug ) {
	$menu = array(
		'theme_location' => $slug,
		'container' => 'nav',
		'container_class' => $slug,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</s>'
	);
	wp_nav_menu( $menu );
	}
}

/*
////-----------------------------------------------------------------------------------------Tạo sidebar cho theme----------------------------------------------------------------------------------

 */
$sidebar = array(
	'name' => __('Main Sidebar', 'cherry'),
	'id' => 'main-sidebar',
	'description' => 'Main sidebar for Cherry theme',
	'class' => 'main-sidebar',
	'before_title' => '<div class="sidebar__tittle">',
	'after_sidebar' => '<div/>'
  );
  register_sidebar( $sidebar );


  //--------------------------------------------------------------------------------------- Register and load Footer sidebar-----------------------------------------------------------------

  register_sidebar( array(
	'name' => 'Footer block',
	'id' => 'footer-sidebar',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<p class="Footer__tittle">',
	'after_title' => '</p>',
	) );



//--------------------------------------------------------------------------------Register and load the Footer widget-----------------------------------------------------------------
class My_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'my-text',  // Base ID
            'My Text'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="Footer__descript">';
 
        echo esc_html__( $instance['text'], 'cherry' );
 
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'cherry' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'cherry' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'cherry' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'cherry' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
$my_widget = new My_Widget();


 //-------------------------------------------------------------------------------- Class footer_widget ends here-----------------------------------------------

//-------------------------------------------------------------------------------- Social link Customizer-----------------------------------------------
function themeslug_customize_register( $wp_customize ) {
// Do stuff with $wp_customize, the WP_Customize_Manager object.

$wp_customize->add_section('cherry_social_media', array(
	'title'    => __('Social media links', 'cherry'),
	'description' => '',
	'priority' => 120,
));

//  =============================
//  = Facebook             =
//  =============================
$wp_customize->add_setting('facebook', array(
	'default'        => 'facebook.com',
	'capability'     => 'edit_theme_options',
	'type'           => 'theme_mod',

));

$wp_customize->add_control('cherry_link_face', array(
	'label'      => __('Face Book', 'cherry'),
	'section'    => 'cherry_social_media',
	'settings'   => 'facebook',
));
//===========================================Twitter
$wp_customize->add_setting('twitter', array(
	'default'        => 'twitter.com',
	'capability'     => 'edit_theme_options',
	'type'           => 'theme_mod',

));
$wp_customize->add_control('cherry_link_twitter', array(
	'label'      => __('Twitter', 'cherry'),
	'section'    => 'cherry_social_media',
	'settings'   => 'twitter',
));
//=========================================== Google plus
$wp_customize->add_setting('googleplus', array(
	'default'        => '',
	'capability'     => 'edit_theme_options',
	'type'           => 'theme_mod',

));

$wp_customize->add_control('cherry_link_googleplus', array(
	'label'      => __('Google plus', 'cherry'),
	'section'    => 'cherry_social_media',
	'settings'   => 'googleplus',
));

//=========================================== pinterest
$wp_customize->add_setting('pinterest', array(
	'default'        => 'asfsaf',
	'capability'     => 'edit_theme_options',
	'type'           => 'theme_mod',

));

$wp_customize->add_control('cherry_link_pinterest', array(
	'label'      => __('Pinterest', 'cherry'),
	'section'    => 'cherry_social_media',
	'settings'   => 'pinterest',
));
}
add_action( 'customize_register', 'themeslug_customize_register' );

//----------------------------------------------------------------------- Cutome Media for blog single------------------------------------------

function blog_social_customize_register( $wp_customize ) {

	$wp_customize->add_section('blog_single_media', array(
		'title'    => __('Author media links', 'cherry'),
		'description' => '',
		'priority' => 199,
	));
	
	//  =============================
	//  = Facebook             =
	//  =============================
	$wp_customize->add_setting('facebook_single', array(
		'default'        => 'facebook.com',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	
	$wp_customize->add_control('author_face', array(
		'label'      => __('Face Book', 'cherry'),
		'section'    => 'blog_single_media',
		'settings'   => 'facebook_single',
	));
	//===========================================Twitter
	$wp_customize->add_setting('twitter_single', array(
		'default'        => 'twitter.com',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	$wp_customize->add_control('author_twitter', array(
		'label'      => __('Twitter', 'cherry'),
		'section'    => 'blog_single_media',
		'settings'   => 'twitter_single',
	));
	//=========================================== Google plus
	$wp_customize->add_setting('googleplus_single', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	
	$wp_customize->add_control('author_googleplus', array(
		'label'      => __('Google plus', 'cherry'),
		'section'    => 'blog_single_media',
		'settings'   => 'googleplus_single',
	));
	
	//=========================================== pinterest
	$wp_customize->add_setting('pinterest_single', array(
		'default'        => 'asfsaf',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	
	$wp_customize->add_control('author_pinterest', array(
		'label'      => __('Pinterest', 'cherry'),
		'section'    => 'blog_single_media',
		'settings'   => 'pinterest_single',
	));
}
add_action( 'customize_register', 'blog_social_customize_register' );
//---------------------------------------------------------------------------------Copyright
function copyright_customize_register( $wp_customize ) {
	$wp_customize->add_section('cherry_copy_right', array(
		'title'    => __('Copyright', 'cherry'),
		'description' => '',
		'priority' => 200,
	));
	$wp_customize->add_setting('copyright', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));	
	$wp_customize->add_control('cherry_copyright', array(
		'label'      => __('Text', 'cherry'),
		'section'    => 'cherry_copy_right',
		'settings'   => 'copyright',
	));

}
add_action( 'customize_register', 'copyright_customize_register' );


 
////-----------------------------------------------------------------------------------------//load stylesheet----------------------------------------------------------------------------------

function load_stylesheet()
{
	wp_register_style('fontawsome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css','all');
	wp_enqueue_style('fontawsome');

	wp_register_style('calendar-style', get_template_directory_uri() . '/css/jsCalendar.css','all');
	wp_enqueue_style('calendar-style');

	wp_register_style('main-style', get_template_directory_uri() . '/css/style.css','all');
	wp_enqueue_style('main-style');

	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css','all');
	wp_enqueue_style('normalize');

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap-grid.min.css','all');
	wp_enqueue_style('bootstrap');

	
	wp_register_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css','all');
	wp_enqueue_style('slick-theme');

	wp_register_style('slick', get_template_directory_uri() . '/slick/slick.css','all');
	wp_enqueue_style('slick');

	wp_register_style('custom', get_template_directory_uri() . '/style.css','all');
	wp_enqueue_style('custom');
	

}
add_action('wp_enqueue_scripts','load_stylesheet');


// function addjs()
// {
// 	wp_register_script('jquery', get_template_directory_uri() .  '/js/jquery-3.4.1.js',array('jquery')); 
// 	wp_enqueue_script('jquery');

// 	wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'));
// 	wp_enqueue_script( 'isotope' );

// 	wp_register_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'));
// 	wp_enqueue_script( 'main-js');
// }
// add_action('wp_footer','addjs');