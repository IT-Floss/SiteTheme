<?php 

/**
 * Control de los usuarios
 *
 * @author David Gallegos
 * @subpackage hummingBird
 * @since 0.1
 */


/**
 * Redireccionamiento de wp-admin a pagina login
 */
/*function redireccionar_login(){
    $pv = basename( $_SERVER['REQUEST_URI'] );
    //$lp = get_permalink('110');
	$lp  = home_url( '/login/' );
    preg_match('/wp-login.php/', $pv, $c);
  	if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
    	//if(count($c)) {
        wp_redirect( $lp );
        exit();
    }
}
add_action( 'init','redireccionar_login' );


function login_failed() {
	$login_page  = home_url( '/login/' );
	wp_redirect( $login_page . '?login=failed' );
	exit;
}
add_action( 'wp_login_failed', 'login_failed' );


function verify_username_password( $user, $username, $password ) {
	$login_page  = home_url( '/login/' );
	if( $username == "" || $password == "" ) {
		wp_redirect( $login_page . "?login=empty" );
		exit;
	}
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);


function custom_login($u, $c) {
	$creds = array();
	$creds['user_login'] = $u;
	$creds['user_password'] = $c;
	$creds['remember'] = true;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) )
		echo $user->get_error_message();
	else
		print_r($user);
}*/
// run it before the headers and cookies are sent
// add_action( 'after_setup_theme', 'custom_login' );