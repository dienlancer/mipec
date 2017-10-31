<?php
require_once get_template_directory() . '/inc/customizer.php';
global $customizerGlobal;
$customizerGlobal = new CustomizerControl();
add_filter( 'nav_menu_link_attributes', 'wp_nav_menu_link', 10, 3 );
function wp_nav_menu_link( $atts, $item, $args ) {	
	if(in_array("current-menu-item", $item->classes)){
		$class = 'active'; 
    	$atts['class'] = $class;    
	}
    return $atts;
}
add_action('init', 'zendvn_theme_register_menus');
function zendvn_theme_register_menus(){
	register_nav_menus(
		array(			
			'footer-menu' 			=> __('Footer menu'),
			'main-menu' 			=> __('Main menu'),
			'mobile-menu' 			=> __('Mobile menu'),
			'dropdown-menu' 		=> __('Dropdownmenu'),
			'rau-sach-menu' 		=> __('Rau sạch'),
			'thit-hai-san-menu' 	=> __('Thịt hải sản'),
			'thuc-pham-kho-menu' 	=> __('Thực phẩm khô'),		
			'support-menu' 			=> __('Hỗ trợ'),		
			'category-article-menu' => __('Danh mục bài viết'),	
			'category-product-menu' => __('Danh mục sản phẩm'),			
		)
	);
}
add_action('after_setup_theme', 'zendvn_theme_support');
function zendvn_theme_support(){
	add_theme_support( 'post-formats', array('aside','image','gallery','video','audio') );
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
	
}
add_action('widgets_init', 'zendvn_theme_widgets_init');
function zendvn_theme_widgets_init(){	
	$themeName="noithatkimcuong";	
	register_sidebar(array(
		'name'          => __( 'UserTop', $themeName ),
		'id'            => 'user-top-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'SearchWidget', $themeName ),
		'id'            => 'search-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'ContactWidget', $themeName ),
		'id'            => 'contact-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'SaleProductWidget', $themeName ),
		'id'            => 'sale-product-widget',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '<div class="title-pro"><h3 class="title-pro-product" >',
		'after_title'   => '</h3></div>',
		'after_widget'  => ''				
	));
	register_sidebar(array(
		'name'          => __( 'FeaturedProductWidget', $themeName ),
		'id'            => 'featured-product-widget',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '<div class="title-pro"><h3 class="title-pro-product" >',
		'after_title'   => '</h3></div>',
		'after_widget'  => ''				
	));
	register_sidebar(array(
		'name'          => __( 'SlideShowWidget', $themeName ),
		'id'            => 'slideshow-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'CategoryWidget', $themeName ),
		'id'            => 'category-widget',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '<div class="title-pro "><h3 class="title-pro-name title-product">',
		'after_title'   => '</h3></div>',
		'after_widget'  => ''				
	));
	register_sidebar(array(
		'name'          => __( 'HotNewsWidget', $themeName ),
		'id'            => 'hot-news-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3 class="footer-title h-title">',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'FeaturedArticleWidget', $themeName ),
		'id'            => 'featured-article-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'ContactOrderWidget', $themeName ),
		'id'            => 'contact-order-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'PartnerWidget', $themeName ),
		'id'            => 'partner-widget',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '<div class="title_phongthuy"><h3>',
		'after_title'   => '</h3></div>',
		'after_widget'  => ''				
	));
	register_sidebar(array(
		'name'          => __( 'InstructionWidget', $themeName ),
		'id'            => 'instruction-widget',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '<div class="title_phongthuy"><h3>',
		'after_title'   => '</h3></div>',
		'after_widget'  => ''			
	));
	register_sidebar(array(
		'name'          => __( 'PhongThuyWidget', $themeName ),
		'id'            => 'phong-thuy-widget',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '<div class="title_phongthuy"><h3>',
		'after_title'   => '</h3></div>',
		'after_widget'  => ''					
	));
	register_sidebar(array(
		'name'          => __( 'SloganWidget', $themeName ),
		'id'            => 'slogan-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'FacebookFanpageWidget', $themeName ),
		'id'            => 'facebook-fanpage-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3 class="footer-title h-title">',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'			
	));
	register_sidebar(array(
		'name'          => __( 'CopyrightWidget', $themeName ),
		'id'            => 'copy-right-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3 class="footer-title h-title">',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'TopThucPhamBanChay_1', $themeName ),
		'id'            => 'top-ban-chay-1-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'RauSachWidget', $themeName ),
		'id'            => 'rau-sach-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'TopThucPhamBanChay_2', $themeName ),
		'id'            => 'top-ban-chay-2-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'ThitHaiSanWidget', $themeName ),
		'id'            => 'thit-hai-san-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'TopThucPhamBanChay_3', $themeName ),
		'id'            => 'top-ban-chay-3-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'ThucPhamKhoWidget', $themeName ),
		'id'            => 'thuc-pham-kho-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'CustomerWidget', $themeName ),
		'id'            => 'customer-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h2 class="top-sales-header h-title">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'AboutWidget', $themeName ),
		'id'            => 'about-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3 class="footer-title h-title">',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));	
	register_sidebar(array(
		'name'          => __( 'CategoryArticleWidget', $themeName ),
		'id'            => 'category-article-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3 class="page-title-left h-title">',
		'after_title'   => '</h1>',
		'after_widget'  => '</div>'				
	));		
	register_sidebar(array(
		'name'          => __( 'CategoryProductWidget', $themeName ),
		'id'            => 'category-product-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3 class="page-title-left h-title">',
		'after_title'   => '</h1>',
		'after_widget'  => '</div>'				
	));		
}
add_action("wp_enqueue_scripts",function(){
	wp_deregister_script("jquery");
	wp_deregister_script("jquery-migrate");
});
add_action('wp_enqueue_scripts', 'zendvn_theme_register_js');
function zendvn_theme_register_js(){	
	wp_register_script('vjquery', get_template_directory_uri() . '/js/jquery-3.2.1.js',array(),"1.0",false);
	wp_enqueue_script('vjquery');
	wp_register_script('bootstrap_min', get_template_directory_uri() . '/js/bootstrap.js',array(),"1.0",false);
	wp_enqueue_script('bootstrap_min');
	
	/* begin ddsmoothmenu */
	wp_register_script('ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js',array(),"1.0",false);
	wp_enqueue_script('ddsmoothmenu');
	/* end ddsmoothmenu */
	wp_register_script('jquery_fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js',array(),"1.0",false);
	wp_enqueue_script('jquery_fancybox');
	wp_register_script('jquery_fancybox_buttons', get_template_directory_uri() . '/js/jquery.fancybox-buttons.js',array(),"1.0",false);
	wp_enqueue_script('jquery_fancybox_buttons');
	wp_register_script('jquery_fancybox_thumbs', get_template_directory_uri() . '/js/jquery.fancybox-thumbs.js',array(),"1.0",false);
	wp_enqueue_script('jquery_fancybox_thumbs');
	wp_register_script('jquery_fancybox_media', get_template_directory_uri() . '/js/jquery.fancybox-media.js',array(),"1.0",false);
	wp_enqueue_script('jquery_fancybox_media');		
	/* begin nivo-slider */
	wp_register_script('jquery_nivo_slider', get_template_directory_uri() . '/nivo-slider/jquery.nivo.slider.js',array(),"1.0",false);
	wp_enqueue_script('jquery_nivo_slider');	
	/* end nivo-slider */
	/* begin owlslider */
	wp_register_script('owl_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js',array(),"1.0",false);
	wp_enqueue_script('owl_carousel');
	/* end owlslider */
	/* begin simplyscroll */
	wp_register_script('jquery_simplyscroll', get_template_directory_uri() . '/js/jquery.simplyscroll.min.js',array(),"1.0",false);
	wp_enqueue_script('jquery_simplyscroll');
	/* end simplyscroll */
	/* begin bxslider */
	wp_register_script('jquery_bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js',array(),"1.0",false);
	wp_enqueue_script('jquery_bxslider');
	/* end bxslider */
	/* begin elevatezoom */
	wp_register_script('jquery_elevatezoom', get_template_directory_uri() . '/js/jquery.elevatezoom-3.0.8.min.js',array(),"1.0",false);
	wp_enqueue_script('jquery_elevatezoom');
	/* end elevatezoom */	
	wp_register_script('custom', get_template_directory_uri() . '/js/custom.js',array(),"1.0",false);
	wp_enqueue_script('custom');			
}
add_action('wp_footer', 'footer_script_code');
add_action('wp_head', 'header_script_code');
function header_script_code(){
	$strScript='<script type="text/javascript" language="javascript">
        ddsmoothmenu.init({
            mainmenuid: "smoothmainmenu", 
            orientation: "h", 
            classname: "ddsmoothmenu",
            contentsource: "markup" 
        });       
    </script>';
    echo $strScript;
}
function footer_script_code(){
	$strScript= '<script type=\'text/javascript\'>
	var wpexLocalize = {
		"mobileMenuOpen" : "Browse Categories",
		"mobileMenuClosed" : "Close navigation",
		"homeSlideshow" : "false",
		"homeSlideshowSpeed" : "7000",
		"UsernamePlaceholder" : "Username",
		"PasswordPlaceholder" : "Password",
		"enableFitvids" : "true"
	};	
	</script>
	';
	echo $strScript;
}
add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');
function zendvn_theme_register_style(){
	global $wp_styles;	
	wp_register_style('font_awesome_min', get_template_directory_uri() . '/css/font-awesome.css',array(),'1.0','all');
	wp_enqueue_style('font_awesome_min');
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css',array(),'1.0','all');
	wp_enqueue_style('bootstrap');	
	/* begin ddsmoothmenu */
	wp_register_style('ddsmoothmenu', get_template_directory_uri() . '/css/ddsmoothmenu.css',array(),'1.0','all');
	wp_enqueue_style('ddsmoothmenu');
	/* end ddsmoothmenu */
	wp_register_style('jquery_fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css',array(),'1.0','all');
	wp_enqueue_style('jquery_fancybox');
	wp_register_style('jquery_fancybox_buttons', get_template_directory_uri() . '/css/jquery.fancybox-buttons.css',array(),'1.0','all');
	wp_enqueue_style('jquery_fancybox_buttons');
	wp_register_style('jquery_fancybox_thumbs', get_template_directory_uri() . '/css/jquery.fancybox-thumbs.css',array(),'1.0','all');
	wp_enqueue_style('jquery_fancybox_thumbs');
	wp_register_style('hover', get_template_directory_uri() . '/css/hover.css',array(),'1.0','all');
	wp_enqueue_style('hover');
	wp_register_style('pagination',get_template_directory_uri() . '/css/pagination.css',array(),'1.0','all');
	wp_enqueue_style('pagination');
	/* begin css nivo-slider */
	wp_register_style('jquerysctipttop',get_template_directory_uri() . '/css/jquerysctipttop.css',array(),'1.0','all');
	wp_enqueue_style('jquerysctipttop');	
	wp_register_style('default',get_template_directory_uri() . '/nivo-slider/themes/default/default.css',array(),'1.0','all');
	wp_enqueue_style('default');
	wp_register_style('light',get_template_directory_uri() . '/nivo-slider/themes/light/light.css',array(),'1.0','all');
	wp_enqueue_style('light');
	wp_register_style('dark',get_template_directory_uri() . '/nivo-slider/themes/dark/dark.css',array(),'1.0','all');
	wp_enqueue_style('dark');
	wp_register_style('bar',get_template_directory_uri() . '/nivo-slider/themes/bar/bar.css',array(),'1.0','all');
	wp_enqueue_style('bar');
	wp_register_style('nivo-slider',get_template_directory_uri() . '/nivo-slider/nivo-slider.css',array(),'1.0','all');
	wp_enqueue_style('nivo-slider');	
	/* end css nivo-slider */
	/* begin owlslider */
	wp_register_style('owl_carousel', get_template_directory_uri() . '/css/owl.carousel.css',array(),'1.0','all');
	wp_enqueue_style('owl_carousel');
	/* end owlslider */
	/* css simplyscroll */
	wp_register_style('simplyscroll', get_template_directory_uri() . '/css/jquery.simplyscroll.css',array(),'1.0','all');
	wp_enqueue_style('simplyscroll');
	/* end simplyscroll */
	/* css simplyscroll */
	wp_register_style('jquery_bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css',array(),'1.0','all');
	wp_enqueue_style('jquery_bxslider');
	/* end simplyscroll */
	/*begin dropdownmenu*/
	wp_register_style('dropdownmenu',get_template_directory_uri() . '/css/dropdownmenu.css',array(),'1.0','all');
	wp_enqueue_style('dropdownmenu');
	/*end dropdownmenu*/
	/*begin tab*/
	wp_register_style('tab',get_template_directory_uri() . '/css/tab.css',array(),'1.0','all');
	wp_enqueue_style('tab');
	/*end tab*/
	wp_register_style('template',get_template_directory_uri() . '/css/template.css',array(),'1.0','all');
	wp_enqueue_style('template');	
	wp_register_style('custom',get_template_directory_uri() . '/css/custom.css',array(),'1.0','all');
	wp_enqueue_style('custom');	
}

















