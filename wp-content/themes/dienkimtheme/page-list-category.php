<?php 
/*
 Template Name: page_list_category
*/
 global $zController;

 ?>
 <?php get_header();?>
 <div class="container margin-top-15 margin-bottom-15">
 	<div class="col-lg-3 no-padding page-left">
 		<?php if(is_active_sidebar('category-article-widget')):?>
 			<?php dynamic_sidebar('category-article-widget')?>
 		<?php endif; ?> 
 	</div>
 	<div class="col-lg-9 no-padding-right col-right">
 		<?php get_template_part("loop","list-category"); ?>
 	</div>	
 	<div class="clr"></div>
 </div>
 <?php get_footer(); ?>
 <?php wp_footer();?>
</body>
</html>