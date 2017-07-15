<?php
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$dias = array("Domingo", "Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

    $settings = json_decode(TWITTER_ACCESS,true);
    //echo "<!--YULI:".TWITTER_ACCESS."-->";

	require_once('twitter_api/TwitterAPIExchange.php');


    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $requestMethod = "GET";
    $getfield = '?screen_name=it_floss&count=8';

?>
<div class="content">

	<?php 
		if(get_field('fecha') AND empty($_GET['s'])): //Es evento // /inscribirme?pid=<?= get_the_ID()
			if(strtotime(date_format(date_create(get_field('fecha')),'Ymd')) >= strtotime(date('Ymd'))): //Si la fecha es mayor o igual ?>

				<?php 
					if (!is_user_logged_in()){
						$clase = 'btn-login btn-iniciar-sesion';
						$texto = 'Inscribirme al evento';
						//$_SESSION['last_evento'] = get_the_ID();
					}else{

						$current_user = wp_get_current_user();
	    				$current_user_ID = $current_user->ID;
						$query = "SELECT COUNT(*) FROM if_inscripciones WHERE post_id = '".get_the_ID()."' AND user_id = '".$current_user_ID."';";
						$resCount = $wpdb->get_var($query);
						$wpdb->flush();
						if($resCount > 0){
							$clase = 'btn-ya-inscripto';
							$texto = 'Ya estás inscripto :)';
						}else{
							$clase = 'btn-inscricipcion';
							$texto = 'Inscribirme al evento';
						}

					}
				?>
				
				<div style="text-align:center;">
					<a class="btn-naranja <?= $clase ?>" href="#" data-id="<?= get_the_ID() ?>" rel="nofollow" style="width:100%;">
						<?= $texto ?>  <i class="ion-pin"></i>
					</a>
				</div>
				<div style="height: 15px;"></div>

				<?php
				$query = "SELECT * FROM if_inscripciones WHERE post_id = '".get_the_ID()."';";
				$inscriptos = $wpdb->get_results($query);
				$wpdb->flush();

				if(count($inscriptos)>0): ?>
					<div class="cf" style="margin-bottom:20px;">
						<h3 class="h3blog">Asistirán <i class="ion-calendar"></i></h3>
						<?php
						foreach ($inscriptos as $insc) {
							$user = get_user_by( 'ID', $insc->user_id);
							$avatar = get_avatar_data($insc->user_id);
							if(!empty($avatar['url'])){
								echo '<img width="50" style="float:left;margin:2px;" src="'.$avatar['url'].'" title="'.$user->first_name." ".$user->last_name.'" />';
							}
						}
						?>
					</div>
				<?php 
				endif;
			else:
				if (get_field('galeria')) {
					?>
					<div style="text-align:center;">
						<a href='<?php echo get_field('galeria'); ?>' style='width:100%' class='btn-naranja' target='_blank'>Ver Galer&iacute;a   <i class="ion-images"></i></a>
					</div>
					<?php
				}
			endif;
			echo '<hr class="hr2">';
		endif;
	?>


	<div class="buscador cf">

		<h3 class="h3blog">Buscador <i class="ion-ios-search-strong"></i></h3>

		<form role="search" method="get" class="search-form cf" action="<?= home_url( '/' ) ?>">
		    <label>
		        <input type="search" id="input-buscar" autocomplete="new-password" placeholder="Buscar..." value="<?= get_search_query() ?>" name="s" title="Buscar..." />
		    </label>
		    <button id="boton-buscar" name="boton-buscar">
		    	<i class="ion-android-search"></i>
		    </button>
		</form>
	</div>
	
	<hr class="hr2">

	<div class="proximos-eventos cf">
		
		<h3 class="h3blog">Próximos eventos <i class="ion-calendar"></i></h3>
		
		<table class="evento">
			<tbody>
				<?php
				$args = array(
				    'post_type' => 'post', 
				    'category_name'=>'eventos',
				    'post_status'=>'publish', 
				    'posts_per_page'=>'8', 
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
				<?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>
					<?php $fechaE = strtotime(date_format(date_create(get_post_meta(get_the_ID(), 'fecha', TRUE)),'Y-m-d')); ?>
					<tr>
						<th colspan="2">
							<?php echo $dias[date('w',$fechaE)].", ".date('d',$fechaE)." de ".$meses[date('n', $fechaE)-1]." ".date('Y',$fechaE); ?>
						</th>
					</tr>
					<tr class="trHover">
						<td><a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'hora', TRUE); ?> Hs</a></td>
						<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
					</tr>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</tbody>
		</table>

	</div>

	<?php
	$twitter = new TwitterAPIExchange($settings);
    $string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
    if($string): ?>

		<hr class="hr2">

		<div class="twitter">
			<h3 class="h3blog">Últimos tweets <a href="https://twitter.com/IT_Floss" style="color:gray;" target="_blank"><i class="ion-social-twitter"></i></a></h3>
			<?php foreach ($string as $tweet): ?>

			<p class="tweet">
				<?php $fecha = strtotime($tweet['created_at']); ?>
				<small>
					<em><?= date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " de ".date('Y', $fecha) ; ?></em>
				</small>

				<br>

				<?php 

					if (!empty($tweet['retweeted']) && $tweet['retweeted']) {
						$tweet['text'] = $tweet['retweeted_status']['text'];
					}
					$tweet['text'] = preg_replace('/@(\w+)\b/i', '<a target="_blank" href="http://twitter.com/$1">@$1</a>', $tweet['text']);
					$tweet['text'] = preg_replace('/#(\w+)\b/i', '<a target="_blank" href="https://twitter.com/hashtag/$1?src=itfloss.rocks">#$1</a>', $tweet['text']);
					$tweet['text'] = preg_replace('/https:\/\/t.co\/(\w+)\b/i', '<a target="_blank" href="https://t.co/$1">https://t.co/$1</a>', $tweet['text']);
				?>

				<?= $tweet['text'] ?>
			</p>
			<hr class="hr3">
		 	
			<?php endforeach; ?>

		</div>

	<?php endif; ?>

</div>

<div id="inscripcion" style="display: none;">
    <div class="contenido_modal">
    	
    	<p>Hola <?php echo $current_user->first_name; ?>, gracias por inscribirte a <strong>"<?php the_title(); ?>"</strong>. <br>
    	Antes de continuar, te damos un espacio para expresarte.</p>

    	<form id="form-enteraste" action="" method="">
    		<input type="hidden" name="ajax_inscribirme" value="1" />
    		<input type="hidden" name="action" value="implement_ajax" />
    		<input type="hidden" name="id_usuario" value="<?php echo $current_user_ID; ?>" />
    		<input type="hidden" name="email_usuario" value="<?php echo $current_user->user_email; ?>" />
    		<input type="hidden" name="nombre_evento" value="<?php the_title(); ?>" />
    		<input type="hidden" name="id_evento" value="<?= get_the_ID() ?>" />
    		<input type="text" name="como" id="como" placeholder="Me entere por FB || Me encanta el grupo || Son unos nabos, sigan así" />
    		<a type="button" id="inscribirme" class="btn-naranja inscribirme">Inscribirme <i class="ion-happy-outline"></i></a>
    	</form>
    </div>
</div>

<div id="msesion" style="display: none;">
	 <div class="contenido_modal">
    	<p><a href="https://itfloss.rocks/wp-login.php?redirect_to=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="btn-naranja">Iniciar sesión</a></p>
    </div>
</div>

