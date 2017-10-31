<?php 
$meta_key = "_zendvn_sp_post_";
if(have_posts()){
    while (have_posts()) {
        the_post();
        ?>
        <div class="page-right padding-bottom-15">
            <form  method="post"  class="frm">
                <h3 class="page-title h-title"><?php echo the_title( ); ?></h3>
                <div class="box-post">
                    <?php                         
                    global $zController,$zendvn_sp_settings;    
                    $vHtml=new HtmlControl();

                    $productModel=$zController->getModel("/frontend","ProductModel");             
                    $args=array(
                        'post_type'=>'post',
                        'tax_query'=>array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => array( 'cuoc-song-tuoi-dep','meo-hay-nha-bep','song-khoe','thuc-pham-sach' ),
                            )
                        )
                    );       
                    $the_query=new WP_Query($args);
                    $totalItemsPerPage=0;
                    $pageRange=10;
                    $currentPage=1; 
                    if(!empty($zendvn_sp_settings["article_number"]))
                        $totalItemsPerPage=$zendvn_sp_settings["article_number"];        
                    if(!empty(@$_POST["filter_page"]))          
                        $currentPage=@$_POST["filter_page"];  
                    $productModel->setWpQuery($the_query);   
                    $productModel->setPerpage($totalItemsPerPage);        
                    $productModel->prepare_items();               
                    $totalItems= $productModel->getTotalItems();               
                    $arrPagination=array(
                      "totalItems"=>$totalItems,
                      "totalItemsPerPage"=>$totalItemsPerPage,
                      "pageRange"=>$pageRange,
                      "currentPage"=>$currentPage   
                  );    
                    $pagination=$zController->getPagination("Pagination",$arrPagination);              
                    if($the_query->have_posts()){
                        $k=1;
                        $post_count=$the_query->post_count;                        
                        while ($the_query->have_posts()) {
                            $the_query->the_post();                                              
                            $post_id=$the_query->post->ID;               
                            $permalink=get_the_permalink($post_id);
                            $title=get_the_title($post_id);
                            $excerpt='';
                            $excerpt=get_post_meta($post_id,$meta_key."intro",true);   
                            $excerpt=substr($excerpt, 0,250) . '...';                 
                            $content=get_the_content($post_id);        
                            $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));
                            $count_view_post=get_post_meta( $post_id, $meta_key . 'count_view_post', true );           
                            $count  =   0;
                            $count  =   (int)$count_view_post;                
                            ?>
                            <div class="col-md-4 box-article">
                                <div class="box-article-img"><center><figure><a href="<?php echo $permalink; ?>"><img  src="<?php echo $featureImg; ?>"></a></figure></center></div>
                                <div class="box-article-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
                                <div class="margin-top-5"><b>Lượt xem :</b> <?php echo $count; ?></div>
                                <div class="box-article-intro"><?php echo $excerpt; ?></div>                        
                            </div>
                            <?php
                            if($k%3 ==0 || $k==$post_count){
                                echo '<div class="clr"></div>';
                            }
                            $k++;
                        }
                        wp_reset_postdata();                 
                    }
                    ?>           
                </div>                
                <?php echo $pagination->showPagination();            ?>
                <div class="clr"></div>
                <input type="hidden" name="filter_page" value="1" /> 
            </form>    
        </div>
        <?php
    }
}
?>





