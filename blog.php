<?php
	/**
	 * Template Name: IT FLOSS Blog	
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

		<div class="col-8-12">


			<?php query_posts('post_type=post&category_name=destacado&post_status=publish&posts_per_page=1'); ?>
			<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

			    <div class="content transicion tBlog">
					<h3 class="h3blog">Destacado <i class="ion-android-star"></i></h3>
					<div class="destacado_blog">
						<img src="<?= the_field('imagen') ?>" />
						<h2><?php the_title(); ?> <i class="ion-ios-arrow-right"></i></h2>
						<a href="<?php the_permalink(); ?>"></a>
					</div>
					<hr class="hr2">
				</div>
		        
	        <?php endwhile; endif; wp_reset_query(); ?>

			<div class="content transicion tBlog">

				<h3 class="h3blog">Últimas entradas <i class="ion-ios-paper-outline"></i></h3>

		        <?php query_posts('post_type=post&category_name=blog&post_status=publish&posts_per_page=5&paged='. get_query_var('paged')); ?>

				<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

				    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

		        		<!-- <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(200,220) ); ?></a> -->
		                <h2>
		                	<a href="<?php the_permalink(); ?>">
		                		<?php the_title(); ?>
		                		<span>
		                			<i class="ion-android-add"></i>
		                		</span>
                			</a>
		                </h2>

		                <span class="meta"><strong><?php the_time('F j, Y'); ?></strong> / <strong><?php the_author_link(); ?></strong> </span>

						<?php the_excerpt(__('Continuar leyendo »','it_floss')); ?>

		        	</div><!-- /#post-<?php get_the_ID(); ?> -->
		        
		        	<hr class="hr2">
			        
			       <?php endwhile; ?>

			        <?php numeric_posts_nav(); ?>

					<!-- <div class="navigation">
						<span class="newer"><?php previous_posts_link(__('« Recientes','it_floss')) ?></span> <span class="older"><?php next_posts_link(__('Anteriores »','it_floss')) ?></span>
					</div> -->

				<?php else: ?>

					<div id="post-404" class="noposts">

					    <p><?php _e('Nada por aquí.','it_floss'); ?></p>

				    </div><!-- /#post-404 -->

				<?php endif; wp_reset_query(); ?>

			</div><!-- /#content -->

		</div>

		<div class="col-4-12">
			<?php get_sidebar(); ?>
		</div>
	
	</div>

<?php get_footer(); ?>