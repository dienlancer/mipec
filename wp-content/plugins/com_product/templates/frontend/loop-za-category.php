<div class="page-right padding-bottom-15">
    <form  method="post"  class="frm">
        <h3 class="page-title h-title"><?php single_cat_title(); ?></h3>
        <div>
            <?php              
            $meta_key = "_zendvn_sp_zaproduct_";                   
            global $zController,$zendvn_sp_settings;    
            $vHtml=new HtmlControl();

            $productModel=$zController->getModel("/frontend","ProductModel"); 
            /* begin load config contact */
            $width=$zendvn_sp_settings["product_width"];    
            $height=$zendvn_sp_settings["product_height"];      
            $contacted_phone=$zendvn_sp_settings['contacted_phone'];
            $email_to=$zendvn_sp_settings['email_to'];
            $address=$zendvn_sp_settings['address'];
            $to_name=$zendvn_sp_settings['to_name'];
            $telephone=$zendvn_sp_settings['telephone'];
            $website=$zendvn_sp_settings['website'];
            $opened_time=$zendvn_sp_settings['opened_time'];
            $opened_date=$zendvn_sp_settings['opened_date'];
            $contaced_name=$zendvn_sp_settings['contacted_name'];
            $product_number=$zendvn_sp_settings["product_number"];
            /* end load config contact */
            /* begin load term */
            $terms = get_terms( array(
              'taxonomy' => 'za_category',
              'hide_empty' => false,  ) );  
            /* end load term */            
            $the_query=$wp_query;

            // begin phân trang
            $totalItemsPerPage=0;
            $pageRange=10;
            $currentPage=1; 
            if(!empty($zendvn_sp_settings["product_number"]))
                $totalItemsPerPage=$product_number;        
            if(!empty(@$_POST["filter_page"]))          
                $currentPage=@$_POST["filter_page"];  
            $productModel->setWpQuery($the_query);   
            $productModel->setPerpage($totalItemsPerPage);        
            $productModel->prepare_items();               
            $totalItems= $productModel->getTotalItems();   
            $the_query=$productModel->getItems();                
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
                            $excerpt=get_post_meta($post_id,$meta_key."intro",true);
                            $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));
                            $featureImg=$vHtml->getFileName($featureImg);
                            $featureImg=$width.'x'.$height.'-'.$featureImg;                    
                            $featureImg=site_url( '/wp-content/uploads/'.$featureImg, null ) ; 
                            $price=get_post_meta( $post_id, $meta_key . 'price', true );
                            $sale_price=get_post_meta( $post_id, $meta_key . 'sale_price', true );        
                            $str_price='';
                            $sale_price_des='';
                            $regular_price='';
                            if(!empty($price)){                     
                                $sale_price_des=$vHtml->fnPrice($price);                                
                            }
                            if(!empty($sale_price)){                
                                $regular_price ='<span class="price-regular">'.$vHtml->fnPrice($price).' đ</span>';                                     
                                $sale_price_des=$vHtml->fnPrice($sale_price);                       
                            }
                            $sale_price_des='<span class="price-sale">'.$sale_price_des. ' đ'.'</span>' ;                   
                            $str_price=$regular_price . '&nbsp;&nbsp;' . $sale_price_des ;
                            ?>
                            <div class="col-lg-3">
                                <div class="box-product margin-top-15">
                                    <div class="product-img"><center><figure><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" alt="" /></a></figure></center>
                                        <div class="box-product-add-to-cart">
                                            <div class="them-vao-gio-hang">
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="addToCart(<?php echo $post_id; ?>);" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thêm vào giỏ</a>                                    
                                            </div>
                                        </div>                              
                                    </div>                              
                                    <div class="box-product-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
                                    <div class="box-product-star">                              
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>                               
                                    </div>
                                    <div class="box-product-general-price margin-top-5">
                                        <center><?php echo $str_price; ?></center>                                                  
                                    </div>                                               
                                </div>           
                            </div>              
                            <?php
                            if($k%4 ==0 || $k==$post_count){
                                echo '<div class="clr"></div>';
                            }
                            $k++;
                        }
                        wp_reset_postdata();                 
                    }
            ?>           
        </div>
        <div class="clr"></div>
        <?php echo $pagination->showPagination();            ?>
        <input type="hidden" name="filter_page" value="1" /> 
    </form>    
</div>





