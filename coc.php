<?php
	/**
	* Template Name: COC
	*
	* @package ItFloss
	* @subpackage hummingBird
	* @since Humming Bird 1.0
	*/	
	
	get_header();
?>

	<div class="contenido coc transicion">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
		<div class="volver">
			<a href="/" class="transicion">Volver al inicio</a>
		</div>
	</div>
		
<?php get_footer(); ?>