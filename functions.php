<?php 
	
/**
 * Funciones para el correcto funcionamiento de IT FLOSS
 *
 * @author David Gallegos
 * @subpackage hummingBird
 * @since 0.1
 */


/**
 * Cabecera
 * - Eliminar links
 */
require get_template_directory() . '/inc/inc-cabecera.php';

/**
 * Footer
 * - Agregar scripts
 */
require get_template_directory() . '/inc/inc-footer.php';

/**
 * Usuarios
 * - Redireccionar login
 */
require get_template_directory() . '/inc/inc-usuarios.php';





function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="list-anterior">%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="list-siguiente">%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}



function my_theme_add_scripts() {
	if(is_single()){
		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD-2m8j0-f2DFycOCa5UeDRJ7S1UZxDswU', array(), '3', true );
		wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/mapaevento.js', array('google-map', 'jquery'), '0.1', true );
	}
}

add_action( 'wp_enqueue_scripts', 'my_theme_add_scripts' );


function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyD-2m8j0-f2DFycOCa5UeDRJ7S1UZxDswU';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



function my_login_logo_one() { 
	?> 
	<style type="text/css"> 
		body.login div#login h1 a {
		background-image: url(/wp-content/themes/hummingBird/img/if_negro.png);  //Add your own logo image in this url 
		padding-bottom: 30px; 
	} 
	</style>
	<?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );



//add_action('wp_ajax_my_special_action', 'my_action_callback');
//add_action('wp_ajax_nopriv_my_special_action', 'my_action_callback');

function implement_ajax() {

	global $wpdb;

	$enviarEmail = false;
	$respuesta = array();
	$respuesta['result'] = "0";
	$mensajeRta = "";

	if(!empty($_POST['ajax_inscribirme']) AND !empty($_POST['id_evento']) AND !empty($_POST['id_usuario'])){

		$args = array('p' => $_POST['id_evento'], 'category_name'=>'eventos','post_status'=>'publish');
		$posts = new WP_Query($args);

		@$limite_inscriptos = get_post_meta($posts->ID, 'limite_inscriptos', TRUE);

		$query = "SELECT COUNT(*) FROM if_inscripciones WHERE post_id = '".$_POST['id_evento']."';";
		$inscriptos = $wpdb->get_var($query);
		$wpdb->flush();

		$query = "SELECT COUNT(*) FROM if_inscripciones WHERE post_id = '".$_POST['id_evento']."' AND user_id = '".$_POST['id_usuario']."';";
		$resCount = $wpdb->get_var($query);
		$wpdb->flush();
		if($resCount > 0){
			$mensajeRta = "Usted ya estaba inscripto al evento !";
		}
		if($mensajeRta == ""){

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
					$query = "INSERT INTO if_inscripciones (post_id, user_id, created, comentario) VALUES ('".$_POST['id_evento']."','".$_POST['id_usuario']."', NOW(),'".$_POST['como']."');";
					$resInsert = $wpdb->query($query);
					$wpdb->flush();

					if($resInsert){
						$mensajeRta = "Gracias por Inscribrse al evento !";
						$respuesta['result'] = "1";
						$enviarEmail = true;
					}

				}else{
					$mensajeRta = "Usted ya estaba inscripto al evento !";
				}
			}else{
				$mensajeRta = "Lo sentimos - Se ha alcanzado el límite de inscriptos al evento !";
			}
		}

		$respuesta['msg'] = $mensajeRta;

		if($enviarEmail AND !empty($_POST['email_usuario'])){

	    	$titulo = "ITFLOSS - Gracias por inscribirte !";

	    	include "inc/inscribirme_template.php";
			$php_template = str_replace("[[NOMBRE_EVENTO]]", $_POST['nombre_evento'], $php_template);

			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'From: ITFLOSS <hola@itfloss.rocks>' . "\r\n";
			@$a = mail($_POST['email_usuario'], $titulo, $php_template, $cabeceras);
	    }
	}

	echo json_encode($respuesta);

	wp_die();
}
add_action('wp_ajax_implement_ajax', 'implement_ajax');
add_action('wp_ajax_nopriv_implement_ajax', 'implement_ajax');//for users that are not logged in.