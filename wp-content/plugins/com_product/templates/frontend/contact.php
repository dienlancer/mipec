<?php get_header();?>
 <div class="container margin-top-15 margin-bottom-15">
 	<div class="col-lg-3 no-padding page-left">
 		<?php if(is_active_sidebar('category-product-widget')):?>
 			<?php dynamic_sidebar('category-product-widget')?>
 		<?php endif; ?> 
 	</div>
 	<div class="col-lg-9 no-padding-right col-right">
 		 <?php require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "loop-contact.php"; ?>
 	</div>	
 	<div class="clr"></div>
 </div>
 <?php get_footer(); ?>
 <?php wp_footer();?>
</body>
</html>

