<?php get_header(); ?>
<div class="main_container home_widgets_container">
        	<div class="container">
            	<div class="row">
					<div class="span12 home_widgets content">
                    <?php dynamic_sidebar(1); ?>
<?php dynamic_sidebar('Home Area	');?>
               		</div>
                </div>
             </div><!--main_container_inner-->
        </div><!--main_container-->
<?php get_footer(); ?>