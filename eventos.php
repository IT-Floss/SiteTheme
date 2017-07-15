<?php
	/**
	 * Template Name: IT FLOSS Eventos	
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

			<div class="content transicion tBlog">
				<?php
				$args = array(
				    'post_type' => 'post', 
				    'category_name'=>'eventos',
				    'post_status'=>'publish', 
				    'posts_per_page'=>'1', 
				    'order' => 'ASC',
				    'orderby' => 'meta_value',
				    'meta_query' => array(
				        array(
				            'key' => 'fecha',
				            'value' => date('Ymd'),
				            'compare' => '>='
				        )
				    ));
				$query = new WP_Query($args);
				?>

				<?php //query_posts('post_type=post&category_name=eventos&post_status=publish&posts_per_page=1'); ?>
				<?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>
					
					<h3 class="h3blog">Pr&oacute;ximo Evento <i class="ion-ios-paper-outline"></i></h3>
				    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>
		                <h2>
		                	<a href="<?php the_permalink(); ?>">
		                		<?php the_title(); ?>

		                		<span>
		                			<i class="ion-android-add"></i>
		                		</span>
                			</a>
		                </h2>

		                <span class="meta">
		                	<strong><?php echo date_format(date_create(get_post_meta(get_the_ID(), 'fecha', TRUE)),'d/m/Y'); ?></strong>
		                	<?php if (get_field('hora')): ?>
								<?php echo " - Desde las ".get_field('hora')." Hs"; ?>
							<?php endif; ?>
		                </span>

						<?php the_excerpt(__('Ver más »','it_floss')); ?>

		        	</div>
		        
		        	<hr class="hr2">

			        <?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

				<h3 class="h3blog">Eventos Anteriores <i class="ion-ios-paper-outline"></i></h3>

				<?php
				$args = array(
				    'post_type' => 'post', 
				    'category_name'=>'eventos',
				    'post_status'=>'publish', 
				    'posts_per_page'=>'10',
				    'order' => 'DESC',
				    'orderby' => 'meta_value',
				    'paged'=> get_query_var('paged'),
				    'meta_query' => array(
				        array(
				            'key' => 'fecha',
				            'value' => date('Ymd'),
				            'compare' => '<', //default
				            //'type' => 'CHAR' //default
				        )
				    ));
				$pasados = new WP_Query($args);
				?>
		        <?php //query_posts('post_type=post&category_name=eventos&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

				<?php if( $pasados->have_posts() ): while( $pasados->have_posts() ): $pasados->the_post(); ?>

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

		                <span class="meta"><strong><?php echo date_format(date_create(get_post_meta(get_the_ID(), 'fecha', TRUE)),'d/m/Y'); ?></strong> </span>

						<?php the_excerpt(__('Ver más »','it_floss')); ?>

		        	</div>
		        
		        	<hr class="hr2">

			        
			        <?php endwhile; ?>

			        <?php numeric_posts_nav(); ?>

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