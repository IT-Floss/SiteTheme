<?php
	
	get_header();
?>

	<div class="grid grid-pad">

		<div class="col-1-1 titulo-pagina">
			<div class="coc transicion">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<hr />
				<br />

				<?php the_content(); ?>

			<?php endwhile; endif; ?>
			<br />
			</div>
		</div>

	</div>

		
<?php get_footer(); ?>