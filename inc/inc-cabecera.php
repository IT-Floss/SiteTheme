<?php 

/**
 * Funciones para la cabecera de WP
 *
 * @author David Gallegos
 * @subpackage hummingBird
 * @since 0.1
 */


/**
 * Funciones que remueven los agregados por defecto
 * de WP en el wp_head()
 *
 */
function eliminar_links_cabecera() {
    //remove_action('wp_head', 'rsd_link');
    //remove_action('wp_head', 'wlwmanifest_link');
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'index_rel_link' ); // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action('init', 'eliminar_links_cabecera');

/**
 * Agregar scripts en el header
 *
 */
function estilos_header() {
    ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/conversational/conversational-form.css" />
    <?php
}
add_action('wp_head', 'estilos_header');
