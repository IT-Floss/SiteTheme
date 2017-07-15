<?php get_header(); ?>
	
	<div class="grid grid-pad entrada transicion">
		<div class="col-8-12">
			<div class="content transicion tBlog">
				<?php if (have_posts()) : while (have_posts()) : the_post();

					$location = get_field('lugar');
					$sponsors = get_field('sponsors');
					?>
					
					<?php if (get_field('imagen')): ?>
						<div class="destacado">
							<a href="#">
								<img src="<?= get_field('imagen') ?>">
							</a>
						</div>
						<div style="height: 20px;"></div>
					<?php endif; ?>

					<h1><?php the_title(); ?></h1>
					<?php echo '<span style="float:right;">'. get_the_category( $id )[0]->name .'</span>'; ?>
					<hr>
					
					<?php if (get_field('fecha')): ?>
						<div class='c_fecha'>
							Fecha: 
								<strong>
									<?php echo date_format(date_create(get_field('fecha')),'d/m/Y'); ?>
									<?php if (get_field('hora')): ?>
										<?php echo " - ".get_field('hora')." Hs"; ?>
									<?php endif; ?>

									<?php if (get_field('hora_fin')): ?>
										<?php echo " / ".get_field('hora_fin')." Hs"; ?>
									<?php endif; ?>
								</strong>
							</div>
					<?php endif; ?>

					<?php if(get_field('fecha')): ?>
						<?php if(strtotime(date_format(date_create(get_field('fecha')),'Ymd')) >= strtotime(date('Ymd'))): //Si la fecha es mayor o igual ?>
							<div class="al-derecha">
								<?php							
									//$horaDesdeCalendar = get_field('fecha')."T".str_replace(array(":","Hs"," "), "", get_field('hora'))."00Z";
									//$horaHastaCalendar = get_field('fecha')."T".str_replace(array(":","Hs"," "), "", get_field('hora_fin'))."00Z";

									$horaDesdeCalendar = gmdate("Ymd\THis\Z",strtotime(get_field('fecha')." ".get_field('hora').":00"));
									$horaHastaCalendar = gmdate("Ymd\THis\Z",strtotime(get_field('fecha')." ".get_field('hora_fin').":00"));

									$locCalendar = "Rosario";
									if(!empty($location['address']))
										$locCalendar = urlencode($location['address']);
								?>
								<a class="btn-naranja transicion" target="_blank" href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=<?= $horaDesdeCalendar ?>/<?= $horaHastaCalendar ?>&ctz=America/Argentina/Buenos_Aires&location=<?= $locCalendar; ?>&text=<?php the_title(); ?>&details=Evento+IT+FLOSS+Rosario" rel="nofollow">
									Agregar al Google Calendar <i class="ion-calendar"></i>
								</a>
							</div>
						<?php endif; ?>
					<?php endif; ?>


					<?php the_content(); ?>

					<hr>

					<?php 
					if( !empty($location) ):
						if(!empty($location['address'])){
							echo "<br /><div class='c_fecha'>Lugar: <strong>".$location['address']."</strong></div><br />";
						}
					?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
								<strong>
									<?php echo $location['address']; ?>
								</strong>
								<br /><br /><br />
								<a target="_blank" href="https://www.google.com.ar/maps/search/<?php echo $location['address']; ?>">Ver en Google Maps</a>
								<br />
							</div>
						</div>
					<?php endif; ?>
					
					<div style="height: 15px;"></div>

					<?php the_tags( 'Etiquetas: ', ', ', '<br />' ); ?>

					<div style="height: 15px;"></div>

					<?php
						if(!empty($sponsors)){
							echo '<hr /><h3 class="h3blog">Sponsors del Evento</h3>';
							
							echo $sponsors;
							
						}
					?>

				<?php endwhile; endif; ?>
			</div>
		</div>
		
		<div class="col-4-12">
			<?php get_sidebar(); ?>
		</div>
	</div>
		
<?php get_footer(); ?>