<div class="page-right">
        <?php 
        $post_meta_key = "_zendvn_sp_post_";
        $page_meta_key = "_zendvn_sp_page_";
        $the_query=$wp_query;
        if($the_query->have_posts()){
                while ($the_query->have_posts()) {
                        $the_query->the_post();                     
                        $post_id=$the_query->post->ID;               
                        $permalink=get_the_permalink($post_id);
                        $title=get_the_title($post_id);
                        $excerpt='';
                        $excerpt=get_post_meta($post_id,$page_meta_key."intro",true);
                        if(empty($excerpt)){
                                $excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
                        }
                        $content=get_the_content($post_id);        
                        $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));
                        $post_type=get_post_type( $post_id);
                        $meta_key='';
                        if($post_type=='post'){
                                $meta_key=$post_meta_key;
                        }else{
                                $meta_key=$page_meta_key;
                        }
                        $count_view_post=get_post_meta( $post_id, $meta_key . 'count_view_post', true );           
                        $count  =   0;
                        $count  =   (int)$count_view_post;                
                        $count++;        
                        update_post_meta($post_id, $meta_key . 'count_view_post', $count);
                        ?>
                        <h3 class="page-title h-title"><?php echo $title; ?></h3>
                        <div class="page-single">
                          <div><h4 class="single-excerpt"><?php echo $excerpt; ?></h4></div>
                          <div class="margin-top-15"><?php echo $content; ?></div>          
                        </div>                        
                        <?php
                }
                wp_reset_postdata();    
        }
        ?>        
</div>
