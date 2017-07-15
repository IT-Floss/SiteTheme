<?php
/**
* Template Name: IT FLOSS Sugerir Evento	
*
* @package ItFloss
*/

wp_redirect( wp_login_url() ); exit;

get_header();

$inserted = false;
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

    //$tags = $_POST['post_tags'];

    // Add the content of the form to $post as an array
    $new_post = array(
        'post_title'    => $_POST['title'],
        'post_content'  => $_POST['description'],
        'post_category' => array(18),
        'post_status'   => 'draft',           // Choose: publish, preview, future, draft, etc.
    );
    //save the new post and return its ID
    $pid = wp_insert_post($new_post);

    //Save custom post author
    add_post_meta($pid, 'autor', $_POST['author'], false);
    add_post_meta($pid, 'email_autor', $_POST['email_address'], false);

    if(!empty($pid)){
    	$inserted = true;

		$to = "info@itfloss.rocks";

		$content = "Post ID: ".$pid;
		$content .= "\n";
		$content .= "Titulo: ".$_POST['title'];
		$content .= "\n";
		$content .= "Autor: ".$_POST['author'];
		$content .= "\n";
		$content .= "Email: ".$_POST['email_address'];
		$content .= "\n\n\n";
		$content .= "Editar en http://itfloss.rocks/wp-admin/post.php?post=".$pid."&action=edit";
		$content .= "\n\n\n";

		//mail($to, "Evento sugerido - IT Floss", $content);

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
				<h3 class="h3blog">Sugerir Evento <i class="ion-android-star"></i></h3>
				<hr class="hr2">
			</div>

			<div class="content transicion tBlog">

				<?php
				if($inserted){
					echo "<br /><br /><br /><br /><strong>
					Gracias por sugerir un evento !
					<br /><br />
					Vamos a revisarlo y a publicarlo lo antes posible.
					</strong><br /><br /><br /><br />";
				}else{
					?>
					<!-- New Post Form -->
					<div id="postbox">
						<form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data" >

							<fieldset>
								<i>Aquí podés sugerir un evento de interés.</i>
								<br /><br /><br />

								<p><label for="title">Título: </label><br />
									<input type="text" id="title" value="" tabindex="1" size="20" name="title" required />
								</p>

								<p><label for="email_address">Tu email: </label><br />
									<input type="email" id="email_address" value="" tabindex="2" name="email_address" required />
								</p>

								<p><label for="author">Autor: </label><br />
									<input type="text" id="author" value="" tabindex="3" size="20" name="author" required />
								</p>
								<p><label for="description">Contenido:</label><br />
									<textarea id="description" tabindex="4" name="description" cols="50" rows="6"></textarea>
								</p>
								
								<p align="left"><input type="submit" value="Enviar !" tabindex="6" id="submit" name="submit" /></p>

								<input type="hidden" name="action" value="new_post" />

								<?php wp_nonce_field( 'new-post' ); ?>
                                
							</fieldset>
						</form>
					</div>
					<!--// New Post Form -->
					<?php
				}
				?>

			</div><!-- /#content -->

		</div>

		<div class="col-4-12">
			<?php get_sidebar(); ?>
		</div>
	
	</div>

<?php get_footer(); ?>