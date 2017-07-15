<?php 
/**
 * Pagina de inicio de sesion (login)
 *
 * @subpackage hummingBird
 * @since 1.0
 */


// Registro
// if ( !get_option('users_can_register') ) {
// 	wp_redirect( site_url('wp-login.php?registration=disabled') );
// 	exit();
// }

// $user_login = '';
// $user_email = '';
// if ( $http_post ) {
// 	$user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : '';
// 	$user_email = isset( $_POST['user_email'] ) ? $_POST['user_email'] : '';
// 	$errors = register_new_user($user_login, $user_email);
// 	if ( !is_wp_error($errors) ) {
// 		$redirect_to = !empty( $_POST['redirect_to'] ) ? $_POST['redirect_to'] : 'wp-login.php?checkemail=registered';
// 		wp_safe_redirect( $redirect_to );
// 		exit();
// 	}
// }

// $registration_redirect = ! empty( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';

// $redirect_to = apply_filters( 'registration_redirect', $registration_redirect );
// login_header(__('Registration Form'), '<p class="message register">' . __('Register For This Site') . '</p>', $errors);

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	echo "ENTRA";
	custom_login($_POST['email'], $_POST['password']);
	die();
}


get_header(); ?>


	<div class="grid grid-pad">

		<div class="col-1-1 titulo-pagina">
			<div class="content transicion">
				<h1 class="h1blog">IT FLOSS</h1>
				<div class="sub1"></div>
			</div>
		</div>

		<!-- <div class="col-3-12">
			
		</div> -->

		<div class="col-1-1">

			<div class="content contenedor-form">

				<form id="cf-form" method="post" action="" cf-form >
					<fieldset>
						<label for="email">Ingresa tu email</label>
						<input required cf-questions="Hola, desde IT FLOSS te damos la bienvenida.😊 <br>Para iniciar sesión por favor decinos tu email." type="email" class="form-control" name="email" id="email" />
					</fieldset>

					<fieldset>
						<label for="password">Ingresa tu clave</label>
						<input required cf-questions="Ahora por favor ingresá tu clave" name="password" id="password" class="form-control" type="password" />
					</fieldset>

					<button type="submit" class="btn btn-default">Submit</button>
				</form>

				<div id="cf-context" role="cf-context" cf-context>
				
				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>
