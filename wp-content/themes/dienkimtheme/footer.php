<footer class="footer padding-top-15">
	<div class="container margin-top-15">
		<div class="col-lg-3">
			<?php if(is_active_sidebar('about-widget')):?>
				<?php dynamic_sidebar('about-widget')?>
			<?php endif; ?>         
		</div>
		<div class="col-lg-3">
			<?php if(is_active_sidebar('hot-news-widget')):?>
				<?php dynamic_sidebar('hot-news-widget')?>
			<?php endif; ?>    
		</div>
		<div class="col-lg-3">
			<div class="support">
				<h3 class="footer-title h-title">Hỗ trợ</h3>
				<div>
					<?php     
					$args = array( 
						'menu'              => '', 
						'container'         => '', 
						'container_class'   => '', 
						'container_id'      => '', 
						'menu_class'        => 'supportmenu', 
						'menu_id'           => 'support-menu', 
						'echo'              => true, 
						'fallback_cb'       => 'wp_page_menu', 
						'before'            => '', 
						'link_before'       => '<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;', 
						'after'             => '', 
						'link_after'        => '', 
						'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
						'depth'             => 3, 
						'walker'            => '', 
						'theme_location'    => 'support-menu' 
					);
					wp_nav_menu($args);
					?>             					
				</div>
			</div>			
		</div>
		<div class="col-lg-3 no-padding-right">
			<?php if(is_active_sidebar('facebook-fanpage-widget')):?>
				<?php dynamic_sidebar('facebook-fanpage-widget')?>
			<?php endif; ?>    
		</div>	
		<div class="clr"></div>		
	</div>
	<div class="clr"></div>	
	<div class="container copyright margin-top-15">
		<?php if(is_active_sidebar('copy-right-widget')):?>
			<?php dynamic_sidebar('copy-right-widget')?>
		<?php endif; ?>    		
	</div>	
</footer>
<div class="modal fade" id="modal-alert-add-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
      </div>
      <div class="modal-body">
        
      </div>      
    </div>
  </div>
</div>