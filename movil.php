<?php
/**
* Template Name: Movil
*
* @package ItFloss
* @subpackage hummingBird
* @since Humming Bird 0.1
*/

if ( !wp_is_mobile() ) {
	//header("Location: /");
}

?>
<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IT FLOSS</title>
		<meta name="Resource-type" 	content="Document" />
		<meta name="description" 	content="Sitio de la comunidad IT Floss Rosario" />
		<meta name="keywords"  		content="open-source, comunidad, rosario, it floss, geek" />
		<meta name="author" 		content="IT Floss" />
		<meta name="theme-color" content="#f39224" />
	</head>
	<body class="blanco">
		
		<div class="contenido coc transicion">

			<div class="logo">
				<a href="#" data-tooltip="IT FLOSS" style="display:inline-block;"><img src="<?= get_template_directory_uri(); ?>/img/if_negro.png" alt="IT FLOSS" width="100px" /></a>
			</div>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
			
		</div>

	</body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-80820004-1', 'auto');
	  ga('send', 'pageview');

	</script>
</html>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/estilos.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Roboto+Condensed" rel="stylesheet">
