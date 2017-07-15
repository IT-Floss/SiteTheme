<?php

	/**
	 * Template Name: IT FLOSS INSCRIBIRME	
	 *
	 * @package ItFloss
	 * @subpackage hummingBird
	 * @since Humming Bird 1.0
	 */

	//Pagina en deshuso !
	wp_redirect( wp_login_url() ); exit;
	
	
	if(is_user_logged_in()){
	    $current_user = wp_get_current_user();
	    $current_user_ID = $current_user->ID;
	}else{
	    wp_redirect( wp_login_url() ); exit;
	}

	get_header();

	$pid = $_GET['pid'];
	if(!empty($_POST['pid']))
		$pid = $_POST['pid'];
	$mensajeRta = "";


	$args = array('p' => $pid, 'category_name'=>'eventos','post_status'=>'publish');
	$posts = new WP_Query($args);

	@$limite_inscriptos = get_post_meta($posts->ID, 'limite_inscriptos', TRUE);

	$query = "SELECT COUNT(*) FROM if_inscripciones WHERE post_id = '".$pid."';";
	$inscriptos = $wpdb->get_var($query);
	$wpdb->flush();

	$query = "SELECT COUNT(*) FROM if_inscripciones WHERE post_id = '".$pid."' AND user_id = '".$current_user_ID."';";
	$resCount = $wpdb->get_var($query);
	$wpdb->flush();
	if($resCount > 0){
		$mensajeRta = "Usted ya estaba inscripto al evento !";
	}

	$enviarEmail = false;

	//print_r($_POST);
	if(!empty($pid) AND !empty($_POST['pid']) AND $mensajeRta == ""){

		$inscribirlo = FALSE;
		if($limite_inscriptos != "0"){
			if($inscriptos < $limite_inscriptos){
				$inscribirlo = TRUE;
			}
		}else{
			$inscribirlo = TRUE;
		}

		if($inscribirlo){

			if($resCount == 0){
				$query = "INSERT INTO if_inscripciones (post_id, user_id, created,  comentario) VALUES ('".$pid."','".$current_user_ID."', NOW(),'".$_POST['comentario']."');";
				$resInsert = $wpdb->query($query);
				$wpdb->flush();

				if($resInsert){
					$mensajeRta = "Gracias por Inscribrse al evento !";
					$enviarEmail = true;
				}

			}else{
				$mensajeRta = "Usted ya estaba inscripto al evento !";
			}
		}else{
			$mensajeRta = "Lo sentimos - Se ha alcanzado el límite de inscriptos al evento !";
		}
	}
?>

	<div class="grid grid-pad">

		<div class="col-1-1 titulo-pagina">
			<div class="content transicion">
				<h1 class="h1blog">IT FLOSS</h1>
				<div class="sub1"></div>
			</div>
		</div>

		<div class="col-8-12">

			<div class="content transicion tBlog">
				<?php if( $posts->have_posts() ): while( $posts->have_posts() ): $posts->the_post(); ?>
					
					<h3 class="h3blog">Inscribirme al Evento <i class="ion-ios-paper-outline"></i></h3>

				    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>
		                
		                <h1><?php the_title(); ?></h1>

		                <?php
		                if($enviarEmail AND !empty($current_user->user_email)){

		                	$titulo = "ITFLOSS - Gracias por inscribirte !";

		                	include "inc/inscribirme_template.php";
							$php_template = str_replace("[[NOMBRE_EVENTO]]", get_the_title(), $php_template);

							$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
							$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

							// Cabeceras adicionales
							//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
							$cabeceras .= 'From: ITFLOSS <hola@itfloss.rocks>' . "\r\n";
							@$a = mail($current_user->user_email, $titulo, $php_template, $cabeceras);
		                }
		                ?>

		                <span class="meta">
		                	<strong><?php echo date_format(date_create(get_post_meta(get_the_ID(), 'fecha', TRUE)),'d/m/Y'); ?></strong>
		                	<?php if (get_field('hora')): ?>
								<?php echo " - Desde las ".get_field('hora')." Hs"; ?>
							<?php endif; ?>
							<?php if (get_field('hora_fin')): ?>
								<?php echo " / ".get_field('hora_fin')." Hs"; ?>
							<?php endif; ?>
		                </span>

						<?php if(!empty($mensajeRta)): ?>
						
							<h2><?php echo $mensajeRta; ?></h2>
						
						<?php else: ?>

							<hr class="hr2">

							<form method="post" class="search-form cf" action="">

								<input type="hidden" name="pid" value="<?= $pid ?>" />

							    <label>
							    	Cómo te enteraste del evento ? (O algún comentario)
							    	<br /><br />
							        <input type="text" class="input" placeholder="Comentario..." name="comentario"  style="width:100%" />
							    </label>
							    <br /><br />
							    <input class="btn-naranja" style="width:50%;" type="submit" value="Confirmar Inscripción !" />
							</form>

						<?php endif; ?>

						<div style="height: 30px;"></div>

						<?php

						if(!empty($limite_inscriptos)){
							echo "<strong>El límite de Inscriptos es </strong>".$limite_inscriptos."<br />";
						}
						
						if(!empty($inscriptos)){
							echo "-- Inscriptos Actuales: ".$inscriptos;
						}
						?>

						<div style="height: 30px;"></div>

						<hr class="hr2">

						<?php the_content(); ?>

						<?php 
						$location = get_post_meta(get_the_ID(), 'lugar', TRUE);

						if( !empty($location) ):
							if(!empty($location['address'])){
								echo "<br /><div class='c_fecha'>Lugar: <strong>".$location['address']."</strong></div><br />";
							}
						endif;
						?>

		        	</div>
		        
		        	<hr class="hr2">

			        <?php endwhile; ?>
			    
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