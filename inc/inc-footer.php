<?php 

/**
 * Funciones para el footer de WP
 *
 * @author David Gallegos
 * @subpackage hummingBird
 * @since 0.1
 */


/**
 * Agregar scripts en el footer
 *
 */
function javascript_footer() {
    ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendors/conversational/conversational-form.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendors/consoleImage.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/itfloss.js?<?= time() ?>"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.4.2/js/iziModal.min.js"></script>
    <?php
}
add_action('wp_footer', 'javascript_footer');

add_filter('show_admin_bar', '__return_false');