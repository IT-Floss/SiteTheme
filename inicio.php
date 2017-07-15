<?php
	/**
	 * Template Name: IT FLOSS Inicio	
	 *
	 * @package ItFloss
	 * @subpackage hummingBird
	 * @since Humming Bird 1.0
	 */
	get_header(); ?>

	<div class="grid grid-pad">

		<div class="col-1-1 titulo-pagina">
			<div class="content transicion">
				<h1 class="h1blog">IT FLOSS</h1>
				<div class="sub1"></div>
			</div>
		</div>

		<div class="contenido coc transicion">

			<div class="logo">
				<a href="#" data-tooltip="IT FLOSS" style="display:inline-block;"><img src="<?= get_template_directory_uri(); ?>/img/if_negro.png" alt="IT FLOSS" width="100px" /></a>
			</div>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
			
		</div>
	
	</div>

<?php get_footer(); ?>