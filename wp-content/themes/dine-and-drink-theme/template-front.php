<?php 
/*
Template Name: Front Page Template
*/
?>
<?php get_header(); ?>
<div class="main_container home_widgets_container<?php if(get_option('at01_slider_overlapse') == "true"){?> home_move_up<?php }?>">
        	<div class="container">
            	<div class="row">
					<div class="span12 home_widgets content<?php if(get_option('at01_slider') == 'false'){?> no-home-slider<?php }?>">
<?php dynamic_sidebar('Home Area	');?>
        		</div>
        	</div>
        </div><!--main_container_inner-->
</div><!--main_container-->
<?php get_footer(); ?>