<!DOCTYPE html>
<?php 
global $customizerGlobal;
?>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php 
        wp_title('|', true,'right');
        bloginfo('name');
        ?>
    </title>    
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri() . '/';?>js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head();?>    
    
</head>
<body>
    <?php
/*require_once get_template_directory()."/check-page.php";
new CheckPage();*/ 
global $zController,$zendvn_sp_settings;
$zController->getController("/frontend","ProductController");
$page_id_register_member = $zController->getHelper('GetPageId')->get('_wp_page_template','register-member.php');  
$page_id_account = $zController->getHelper('GetPageId')->get('_wp_page_template','account.php');
$page_id_security = $zController->getHelper('GetPageId')->get('_wp_page_template','security.php');  
$page_id_history = $zController->getHelper('GetPageId')->get('_wp_page_template','history.php');  
$page_id_cart = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');   
$page_id_search = $zController->getHelper('GetPageId')->get('_wp_page_template','search.php');          
$register_member_link = get_permalink($page_id_register_member);
$account_link = get_permalink($page_id_account);
$security_link=get_permalink($page_id_security);
$history_link=get_permalink($page_id_history );
$cart_link=get_permalink($page_id_cart );
$search_link = get_permalink($page_id_search);  
$ssName="vmuser";
$ssNameCart="vmart";
$ssValue="userlogin";
$ssValueCart="zcart";
$arrUser=array();
$ssUser     = $zController->getSession('SessionHelper',$ssName,$ssValue);
$ssCart     = $zController->getSession('SessionHelper',$ssNameCart,$ssValueCart);
$arrUser = @$ssUser->get($ssValue)["userInfo"];
$arrCart = @$ssCart->get($ssValueCart)["cart"];   
$contacted_phone=$zendvn_sp_settings['contacted_phone'];
$email_to=$zendvn_sp_settings['email_to'];
$address=$zendvn_sp_settings['address'];
$to_name=$zendvn_sp_settings['to_name'];
$telephone=$zendvn_sp_settings['telephone'];
$website=$zendvn_sp_settings['website'];
$opened_time=$zendvn_sp_settings['opened_time'];
$opened_date=$zendvn_sp_settings['opened_date'];
$contaced_name=$zendvn_sp_settings['contacted_name'];
$facebook_url=$zendvn_sp_settings['facebook_url'];
$twitter_url=$zendvn_sp_settings['twitter_url'];
$google_plus=$zendvn_sp_settings['google_plus'];
$youtube_url=$zendvn_sp_settings['youtube_url'];
$instagram_url=$zendvn_sp_settings['instagram_url'];
$pinterest_url=$zendvn_sp_settings['pinterest_url'];     
$quantity=0; 
if(count($arrCart) > 0){
foreach($arrCart as $cart){    
    $quantity+=(int)$cart['product_quantity'];
}
}
?>    
<header class="header">
    <div ><center><img src="<?php echo site_url( '/wp-content/uploads/topbar.png',  null ) ?>" /></center></div>
<div class="bg-header padding-top-15">
    <div class="container">
        <div>
            <div class="col-lg-3">
                <center><a href="<?php echo home_url(); ?>">                
                    <img src="<?php echo $customizerGlobal->general_section('site-logo');?>" />
                </a></center>
            </div>      
            <div class="col-lg-5 no-padding"> 
                <div class="margin-top-15">
                    <nav class="header-action">
                        <a href="/mipec/trung-tam-ho-tro" class="header-action-item"><i class="fa fa-question-circle" aria-hidden="true"></i>Hỗ trợ</a>
                        <?php                                                              
                                if(empty($arrUser)){
                                    ?>
                        <a href="<?php echo $register_member_link; ?>" class="header-action-item"><i class="fa fa-unlock" aria-hidden="true"></i>Đăng ký</a>
                        <a href="<?php echo $account_link; ?>" class="header-action-item"><i class="fa fa-user" aria-hidden="true"></i>Đăng nhập</a>
                                    <?php
                                }else{                                     
                                    ?>
                                    <a class="header-action-item" href="<?php echo $account_link; ?>"><?php echo $arrUser["username"]; ?></a>
                                    <a class="header-action-item" href="<?php echo $security_link; ?>">Đổi mật khẩu</a>                                
                                    <a class="header-action-item" href="<?php echo $history_link; ?>">Invoice</a>
                                    <a class="header-action-item" href="<?php echo site_url() . "/index.php?action=logout"; ?>">Logout</a>
                                    <?php                                     
                                }
                                ?>                                                                      
                    </nav>            
                    <div class="box-search margin-top-5">
                        <form action="<?php echo $search_link; ?>" method="get">
                            <input type="text" name="q" autocomplete="off" placeholder="Tìm kiếm sản phẩm" value="">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>                     
            </div>
            <div class="col-lg-4 no-padding">
                <div class="col-lg-8">
                    <div class="address-mamay">
                        <div class="address"><?php echo $address; ?></div>
                        <div class="hotline h-title">Hotline: <?php echo $contacted_phone; ?></div>
                    </div>                
                </div>
                <div class="col-lg-4  no-padding">
                    <div class="cart">
                        <a href="<?php echo $cart_link; ?>">
                            <i class="fa fa-shopping-basket icon-cart" aria-hidden="true"></i>
                        </a>
                        <span class="cart-number cart-count" id="cart-total"><?php echo $quantity; ?></span>                                
                    </div>                    
                </div>
                <div class="clr"></div>         
            </div>
            <div class="clr"></div>
        </div>  
        <div class="menu margin-top-15">
            <div class="col-lg-3 no-padding">                
                <div class="dropdownmenu">
                    <ul id="dropdown-mainmenu" class="dropdownmainmenu">
                        <li>                            
                            <a href="#">
                                <i class="fa fa-bars icon-bars" aria-hidden="true"></i>
                                <span class="h-title">Danh mục</span>
                                <i class="fa fa-angle-down icon-angle-down" aria-hidden="true"></i>
                            </a>
                            <?php     
                            $args = array( 
                                'menu'              => '', 
                                'container'         => '', 
                                'container_class'   => '', 
                                'container_id'      => '', 
                                'menu_class'        => 'dd-menu', 
                                'menu_id'           => 'ddmenu', 
                                'echo'              => true, 
                                'fallback_cb'       => 'wp_page_menu', 
                                'before'            => '', 
                                'after'             => '', 
                                'link_before'       => '', 
                                'link_after'        => '', 
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
                                'depth'             => 3, 
                                'walker'            => '', 
                                'theme_location'    => 'dropdown-menu' 
                            );
                            wp_nav_menu($args);
                            ?>                                           
                        </li>                        
                    </ul>                                
                    <div class="clr"></div>
                </div>
            </div>
            <div class="col-lg-6">                
                <div id="smoothmainmenu" class="ddsmoothmenu">
                    <?php     
                    $args = array( 
                        'menu'              => '', 
                        'container'         => '', 
                        'container_class'   => '', 
                        'container_id'      => '', 
                        'menu_class'        => 'mainmenu', 
                        'menu_id'           => 'main-menu', 
                        'echo'              => true, 
                        'fallback_cb'       => 'wp_page_menu', 
                        'before'            => '', 
                        'after'             => '', 
                        'link_before'       => '', 
                        'link_after'        => '', 
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
                        'depth'             => 3, 
                        'walker'            => '', 
                        'theme_location'    => 'main-menu' 
                    );
                    wp_nav_menu($args);
                    ?>                
                </div>                
            </div>
            <div class="col-lg-3">
                <nav class="nav-social">

                    <a href="<?php echo $facebook_url; ?>" target='_blank' class="nav-social-item"><i class="fa fa-facebook" aria-hidden="true"></i></a>


                    <a href="<?php echo $twitter_url; ?>" target='_blank' class="nav-social-item"><i class="fa fa-twitter" aria-hidden="true"></i></a>


                    <a href="<?php echo $google_plus; ?>" target='_blank' class="nav-social-item"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>



                    <a href="<?php echo $instagram_url; ?>" target='_blank' class="nav-social-item"><i class="fa fa-instagram" aria-hidden="true"></i></a>


                    <a href="<?php echo $pinterest_url; ?>" target='_blank' class="nav-social-item"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>

                </nav>
            </div>      
            <div class="clr"></div>      
        </div>      
    </div>    
</div>    
<div class="mobilemenu">
    <div class="container">
        <div>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>                   
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <?php     
                        $args = array( 
                            'menu'              => '', 
                            'container'         => '', 
                            'container_class'   => '', 
                            'container_id'      => '', 
                            'menu_class'        => 'nav navbar-nav', 
                            'menu_id'           => 'mobile-menu', 
                            'echo'              => true, 
                            'fallback_cb'       => 'wp_page_menu', 
                            'before'            => '', 
                            'after'             => '', 
                            'link_before'       => '', 
                            'link_after'        => '', 
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
                            'depth'             => 3, 
                            'walker'            => '', 
                            'theme_location'    => 'mobile-menu' 
                        );
                        wp_nav_menu($args);
                        ?>             
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>


