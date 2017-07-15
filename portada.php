<?php
/**
* Template Name: PortadaSlider
*
* @package ItFloss
* @subpackage hummingBird
* @since Humming Bird 0.1
*/

if ( wp_is_mobile() ) {
	header("Location: /movil");
}

?>

<?php
	$imagenes = [];

	for ($i=1; $i < 25; $i++) {
		$imagenes['/img/chicas/imagen'.$i.'.jpg'] = '/img/grandes/imagen'.$i.'.jpg';
	}
?>
<!-- 
                                                              ,.. . . ... . . .    
    .NuUj2j2uUuUu2u2uXv                                      :P5U1U5U1U1u2u2u5Sv   
    .UY7LvLvJvYLJLJLJ2v                                      ,XYJLJLjLJLJvL7L72i   
     27v7v7ju1U1u1U1UPv                                      :SUJuJuJuYuLL777vjr   
    .Uv777u                                                              rY7v7Ui   
     1777vj                                                              vYv7vJi   
    .uv7v71                                                              7j777ui   
     17v7vu            kYJLJLJLFr              7SMB@B@B@BBGEkj           vYvrvJ;   
    .uv7772           iB@B@B@B@B@            F@B@B@B@B@B@B@B@B           7u777ui   
     17v7Lu.          ,@BMOMOMM@0           8@BBOM8M8M8M8MOMBB           vYv7vJr   
    .uv7772           ,BBGMGOGMBE          v@MM8OGOGMOMMBMBB@M           7j777ui   
     27v7Lu           ,@BBMMOMM@0          @BMGO8M8MM@B@B@B@B@           vYv7vJ;   
    .uv7v71           iB@B@B@B@B@          B@8MGM8MM@0i . ..:.           7u777Ui   
     27v7LU            u77r7r7rj:         ,@MMGM8O8@M                    vLvrvJr   
    .uv7v71                               iBMGO8M8MB1                    7u7v7ui   
     27v7vu                               ,@OOGM8M8@Y                    vYv7vJ;   
    .uv77v1           :B@B@B@B@B8     iB@MMMMGOGM8MMBO@B@B@B@2           7j777ui   
     1777vu           :@B@B@B@B@8     i@B@MM8OGO8O8MM@B@B@B@BF           vYvrvJr   
    .Uv7v71           ,B@OM8MOMBE     iB@8M8M8O8OGO8MOMOMOMM@J           7j777Ui   
     27v7Lu           .@MO8MGOO@q     i@B@MMGMGO8M8MO@B@B@B@B5           vYvrvj;   
    .uv7771           ,BB8OGOGMBE     rB@B@MMGMGOGMM@B@B@B@B@F           7j7v7ui   
     17v7LU           .@MO8M8OO@q         :@OMGO8MO@u                    vYvrvJ;   
    .UL7v71           ,BBGO8O8MB0         :BMGMGO8MB1                    7j777Ui   
     17v7Lu           .@MMGOGO8@q         :@OMGOGOO@5                    vYv7vjr   
    .Uv7772           ,BB8OGM8MBE         iBB8O8O8MBk                    7j7v7ui   
     17v7Lu           .@MM8OGOO@N         i@MM8O8MO@F                    vYv7vJ;   
    .uL7771           ,BBGOGMGMBE         ;BB8O8MGMBk                    7j7v7Ui   
     17v7vu           .@MM8OGMO@P         i@MO8MGOO@5                    vLv7vJ;   
    .uv7v71           :BB8O8O8MBE         iBBGOGO8MBk                    7u777ui   
     1777vu           ,@MO8O8OO@q         i@MOGM8OO@F                    vLv7vJi   
    .uL7vv1           ,BBGOGOGMBE         iBB8O8O8MBX                    7j777Ui   
     177rvu           ,@MO8O8OO@q         i@MMGMGOO@5                    LYv7vj;   
    .uLrv72           ,BBGOGMGMBZ         iBB8OGMGMBk                    7u7v7Ui   
     17v7Lu           ,@MMGMGMO@q         i@MM8OGMO@5                    vLv7vJr   
    .uL7v72           :BB8MGMGMB0         iBMGMGMGMBk                    7u777ui   
     27v7vu           ,@MM8MOMM@0         i@MM8MOMO@F                    vLvrvJ;   
    .uvrv72           iB@B@B@B@BB         vB@B@B@B@BG                    7u7v7Ui   
     17vrvU           .@E0q0P0NB1         :@NEP0P0qBj                    vYv7vjr   
    .uL7vv1                                                              7u7v7ui   
     1777Lu                                                              vYv7vji   
    .Uv777u                                                              rJ7v7Ui   
     27vrvvririririri7:                                      ,uL7L7v7L77rL7vrvJr   
    .UL7v7vLuJ2jUjUu25Y                                      ,PuuJuJuJuJuvv7v72i   
    .quuJuJUu2uUu2jUukv                                      :X1u2u2u2u2uUuUu2Sv   
    .7riii;i;iiiri;irri                                       i::,:,:,:,:,:,:,i.   
                                                                                                                                                                                                                                                                       
-->
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png"> 
	<title>IT FLOSS</title>

	<meta name="Resource-type" 	content="Document" />
	<meta name="description" 	content="Sitio de la comunidad IT Floss Rosario" />
	<meta name="keywords"  		content="open-source, comunidad, rosario, it floss, geek" />
	<meta name="author" 		content="IT Floss" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Roboto+Condensed" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/pace/pace.min.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/animate/animate.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fullpage.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/justifiedgallery/justifiedGallery.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/lightgallery/css/lightgallery.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/estilos.min.css" />
</head>
<body class="negro">
	<div id="fullpage">

		<div class="section" id="section1" style="background: url(<?= get_template_directory_uri(); ?>/img/adminfest1.jpg)no-repeat center center / cover;">
			<div class="info">
				<!-- <h1>It Floss</h1> -->
				<a href="#" data-tooltip="IT FLOSS" style="display:inline-block;"><img src="<?= get_template_directory_uri(); ?>/img/if.png" alt="IT FLOSS" width="100px" /></a>
				<p class="presentacion">
					Somos una comunidad de sistemas con base en Rosario y alrededores, generamos puntos de encuentro para la gente del mundo de la tecnología de la información. <br> Si tenés ganas de compartir tus experiencias, conocer gente del palo o asistir a eventos informativos, te invitamos a sumarte.
				</p>
				<a href="#" class="boton transicion naranja moverAbajo">¿ Cómo participar ?</a>
				<a href="/coc" class="boton transicion naranja">Código de conducta</a>
			</div>
		</div>

		<div class="section" id="section2" style="background: url(<?= get_template_directory_uri(); ?>/img/adminfest2.jpg)no-repeat center center / cover;">
			<div class="info">
				<h2>¿ Cómo participar ?</h2>
				<div class="sub"></div>
				<p class="presentacion">
					Hacemos una reunión mensual el segundo jueves de cada mes.
					Asistimos y organizamos eventos relacionados a la tecnología de la información.
					A diario podés encontrarnos en <a target="_blank" class="p_red" href="https://www.hamsterpad.com/chat/itfloss">SLACK</a>, donde compartimos nuestras experiencias.
					También, estamos en <a target="_blank" class="p_red" href="https://web.facebook.com/itfloss/">FACEBOOK</a>, <a target="_blank" class="p_red" href="https://twitter.com/IT_Floss">TWITTER</a>,
					organizamos los eventos a través de <a target="_blank" class="p_red" href="http://www.meetup.com/es-ES/FLOSS_Ros/">MEETUP</a> y los proyectos por medio de <a href="https://github.com/IT-Floss" class="p_red" target="_blank">GITHUB</a>.
					<div class="redes">
						<a target="_blank" href="https://www.hamsterpad.com/chat/itfloss" class="red" data-tooltip="Entrá a Slack ahora"><i class="fa fa-slack"></i></a>
						<a target="_blank" href="https://web.facebook.com/itfloss/" class="red" data-tooltip="Seguínos en Facebook"><i class="fa fa-facebook-square"></i></a>
						<a target="_blank" href="https://twitter.com/IT_Floss" class="red" data-tooltip="Seguínos en twitter"><i class="fa fa-twitter-square"></i></a>
					</div>
				</p>
				<!-- <a href="#" class="boton transicion naranja galeria">Ver galería !</a> -->
				<a href="#" class="boton transicion naranja moverAbajo">Ver las comunidades amigas !</a>
			</div>
		</div>

		<div class="section" id="section3" style="background: url(<?= get_template_directory_uri(); ?>/img/adminfest4.jpg)no-repeat center center / cover;">
			<div class="info">
				<h2>Comunidades Amigas</h2>
				<div class="sub"></div>
				<p class="presentacion">
					Estas comunidades ya son amigas de IT Floss, unite vos también desde <a class="p_red moverArriba" href="#">nuestras redes</a>, o mandanos un correo a <a class="p_red" href="mailto:hola@itfloss.rocks">hola@itfloss.rocks</a>.
				</p>
				<div class="logos">
					<a target="_blank" href="http://www.sysarmy.com.ar/" class="logo" data-tooltip="SysArmy"><img src="<?= get_template_directory_uri(); ?>/img/sysarmy.png" height="120px" /></a>
					<a target="_blank" href="http://www.asociacionagassi.org/" class="logo" data-tooltip="Asociación de gobierno, auditoria y seguridad de sistemas informáticos"><img src="<?= get_template_directory_uri(); ?>/img/agassi.png" height="120px" /></a>
					<a target="_blank" href="http://www.syloper.com" class="logo" data-tooltip="Syloper"><img src="<?= get_template_directory_uri(); ?>/img/syloper.png" height="120px" /></a>
<a target="_blank" href="https://www.facebook.com/MePasoEnSistemas" class="logo" data-tooltip="Me Pasó en sistemas"><img src="<?= get_template_directory_uri(); ?>/img/mepes.png" height="120px" /></a>
<a target="_blank" href="http://www.meetup.com/es-ES/wordpress-rosario/" class="logo" data-tooltip="Wordpress Rosario"><img src="https://itfloss.rocks/wp-content/uploads/2016/11/wprosario.png" height="120px" /></a>
				</div>
			</div>
		</div>
<!-- -->
		<div class="section" id="section4" style="background: url(<?= get_template_directory_uri(); ?>/img/slide7.jpg)no-repeat center center / cover;">
			<div class="info cf">
				<h2>Micro Charlas <span><a href="https://goo.gl/photos/vtkGBBDhwCJAsfGLA" target="_blank"><i class="fa fa-picture-o"></i>Ver galería</a></span></h2>
				<div class="sub"></div>
				<div class="persona">
					<div class="imagen" data-tooltip="Fernando Villares" style="background: url(<?= get_template_directory_uri(); ?>/img/fer.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Ecología  y las tecnologías de la información</div>
					<a class="descarga" href="https://goo.gl/3pQ5W9" target="_blank">Ver presentación</a>
				</div>

				<div class="persona">
					<div class="imagen" data-tooltip="Sebastián Dominguez" style="background: url(<?= get_template_directory_uri(); ?>/img/seba.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Experiencia con certificados SSL - Let's encrypt / StartSSL</div>
					<a class="descarga" href="https://goo.gl/dOBHYT" target="_blank">Ver presentación</a>
				</div>

				<div class="persona">
					<div class="imagen" data-tooltip="Ezequiel M. Cardinali" style="background: url(<?= get_template_directory_uri(); ?>/img/eze.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Introducción a OpenStack</div>
					<a class="descarga" href="https://goo.gl/gMQnZ6" target="_blank">Ver presentación</a>
				</div>
			</div>
		</div>

		<div class="section" id="section5" style="background: url(<?= get_template_directory_uri(); ?>/img/slide8.jpg)no-repeat center center / cover;">
			<div class="info cf">
				<h2>Micro Servicios | Polo Tecnológico <span><a href="https://goo.gl/photos/SdwX8rtnFsxmdgZS9" target="_blank"><i class="fa fa-picture-o"></i>Ver galería</a></span></h2>
				<div class="sub"></div>
				<div class="persona">
					<div class="imagen" data-tooltip="Sebastián Dominguez" style="background: url(<?= get_template_directory_uri(); ?>/img/seba.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Introducción a Microservicios</div>
					<a class="descarga" href="https://goo.gl/5jw0N6" target="_blank">Ver presentación</a>
				</div>

				<div class="persona">
					<div class="imagen" data-tooltip="Julián Butti" style="background: url(<?= get_template_directory_uri(); ?>/img/juli.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Google Firebase</div>
					<a class="descarga" href="https://goo.gl/Ey26iX" target="_blank">Ver presentación</a>
				</div>

				<div class="persona">
					<div class="imagen" data-tooltip="Sebastián Bressan" style="background: url(<?= get_template_directory_uri(); ?>/img/seba1.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Amazon Web Services</div>
					<a class="descarga" href="https://goo.gl/0OKeJP" target="_blank">Ver presentación</a>
				</div>
			</div>
		</div>

		<div class="section" id="section6" style="background: url(<?= get_template_directory_uri(); ?>/img/back32.jpg)no-repeat center center / cover;">
			<div class="info cf">
				<h2>TTT | 21/03/2017 <span><a href="https://goo.gl/photos/o95THXRo7ZumyUKP6" target="_blank"><i class="fa fa-picture-o"></i>Ver galería</a></span></h2>
				<div class="sub"></div>
				<div class="persona">
					<div class="imagen" data-tooltip="Fernando Villares" style="background: url(<?= get_template_directory_uri(); ?>/img/fer.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Seguridad sobre comunicaciones unificadas (VoIP)</div>
					<a class="descarga" href="https://goo.gl/hRnviD" target="_blank">Ver presentación</a>
				</div>
				<div class="persona">
					<div class="imagen" data-tooltip="Ismael Ull" style="background: url(<?= get_template_directory_uri(); ?>/img/ismael.jpg)no-repeat center left / cover;"></div>
					<div class="nombre-charla">IT Mannager toolbox</div>
					<a class="descarga" href="https://goo.gl/emmiE1" target="_blank">Ver presentación</a>
				</div>
				<div class="persona">
					<div class="imagen" data-tooltip="Lucas Olmedo" style="background: url(<?= get_template_directory_uri(); ?>/img/lucas_olmedo.jpg)no-repeat center left / cover;"></div>
					<div class="nombre-charla">IT Mannager toolbox</div>
					<a class="descarga" href="https://goo.gl/emmiE1" target="_blank">Ver presentación</a>
				</div>
				<div class="persona">
					<div class="imagen" data-tooltip="Jorge Benzaquen" style="background: url(<?= get_template_directory_uri(); ?>/img/jorge_benzaquen.jpg)no-repeat center left / cover;"></div>
					<div class="nombre-charla">IT Mannager toolbox</div>
					<a class="descarga" href="https://goo.gl/emmiE1" target="_blank">Ver presentación</a>
				</div>
			</div>
		</div>

		<div class="section" id="section7" style="background: url(<?= get_template_directory_uri(); ?>/img/adminfest1.jpg)no-repeat center center / cover;">
			<div class="info cf">
				<h2>TTT | 18/04/2017</h2>
				<div class="sub"></div>
				<div class="persona">
					<div class="imagen" data-tooltip="Fernando Villares" style="background: url(<?= get_template_directory_uri(); ?>/img/fer.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Usos responsables de la información</div>
					<a class="descarga" href="https://goo.gl/PqkH6I" target="_blank">Ver presentación</a>
				</div>
				<div class="persona">
					<div class="imagen" data-tooltip="Horacio Castellini" style="background: url(<?= get_template_directory_uri(); ?>/img/horacio_castellini.jpg)no-repeat center left / cover;"></div>
					<div class="nombre-charla">Introducción a R</div>
					<a class="descarga" href="https://goo.gl/DFOInR" target="_blank">Ver presentación</a>
				</div>
			</div>
		</div>

		<div class="section" id="section8" style="background: url(<?= get_template_directory_uri(); ?>/img/flasksailsjs.jpg)no-repeat bottom center / cover;">
			<div class="info cf">
				<h2>TTT | Flask vs Sails.js <span><a href="https://goo.gl/KW1yL4" target="_blank"><i class="fa fa-picture-o"></i>Ver galería</a></span></h2>
				<div class="sub"></div>
				<div class="persona">
					<div class="imagen" data-tooltip="Damián Pumar" style="background: url(<?= get_template_directory_uri(); ?>/img/damian_pumar.jpg)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Sails.js</div>
					<a class="descarga" href="https://goo.gl/sU9fb3" target="_blank">Ver presentación</a>
				</div>
				<div class="persona">
					<div class="imagen" data-tooltip="Matías Barriento" style="background: url(<?= get_template_directory_uri(); ?>/img/matias_barriento.jpg)no-repeat center left / cover;"></div>
					<div class="nombre-charla">Flask</div>
					<a class="descarga" href="https://goo.gl/8thMws" target="_blank">Ver ejemplos y demos</a>
				</div>
			</div>
		</div>

		<div class="section" id="section9" style="background: url(<?= get_template_directory_uri(); ?>/img/te&a4.jpg)no-repeat bottom center / cover;">
			<div class="info cf">
				<h2>TTT | (Typescript && ES6) && Angular4 <span><a href="https://goo.gl/photos/kHaezsd4D5UYvqDW6" target="_blank"><i class="fa fa-picture-o"></i>Ver galería</a></span></h2>
				<div class="sub"></div>
				<div class="persona">
					<div class="imagen" data-tooltip="Alejandro Brozzo" style="background: url(<?= get_template_directory_uri(); ?>/img/alejandro_brozzo.png)no-repeat center center / cover;"></div>
					<div class="nombre-charla">Typescript && ES6</div>
					<a class="descarga" href="https://goo.gl/cfEx4F" target="_blank">Ver presentación</a>
				</div>
				<div class="persona">
					<div class="imagen" data-tooltip="Victoria Perdomo" style="background: url(<?= get_template_directory_uri(); ?>/img/victoria_perdomo.jpeg)no-repeat center left / cover;"></div>
					<div class="nombre-charla">Angular4</div>
					<a class="descarga" href="https://goo.gl/WQQlUh" target="_blank">Ver presentación</a>
				</div>
			</div>
		</div>
	<!-- -->

	</div>

	<ul id="menu">
		<li data-menuanchor="nosotros" class="active"><a href="#nosotros">Nosotros</a></li>
		<li data-menuanchor="participar"><a href="#particiar">¿ Cómo participar ?</a></li>
		<li data-menuanchor="comunidades"><a href="#comunidades">Comunidades</a></li>
	</ul>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendors/pace/pace.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendors/scrolloverflow.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullpage.min.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/vendors/lightgallery/js/lightgallery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/vendors/justifiedgallery/jquery.justifiedGallery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/vendors/lightgallery/js/lg-thumbnail.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/vendors/lightgallery/js/lg-fullscreen.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {


		$('#fullpage').fullpage({
			anchors: ['nosotros', 'participar', 'comunidades', 'microcharlas','microservicios', 'ttt', 'ttt1', 'fvs', 'te&a4'],
			navigationTooltips: ['Nosotros', '¿Cómo participar?', 'Comunidades', 'Micro Charlas', 'Micro Servicios', 'TTT | 21/03/2017', 'TTT | 18/04/2017', 'TTT | Flask vs Sails.js', '(Typescript && ES6) && Angular4'],
			showActiveTooltip: true,
			//scrollOverflow: true,
			menu: '#menu',
			navigation: true,
			easingcss3: 'cubic-bezier(0.000, 1, 0.275, 0.990)',
			sectionsColor : ['#666', '#444', '#d68736', '#000000', '#000000', '#000000'],
			'verticalCentered': false,
		});

		$('.galeria').on('click', function() {

			$(this).lightGallery({
				dynamic: true,
				dynamicEl: [

					<?php foreach ($imagenes as $k => $v): ?>
					{
						"src": '<?= get_template_directory_uri() . $v ?>',
						'thumb': '<?= get_template_directory_uri() . $k ?>',
					},
					<?php endforeach; ?>

				]
			})

		});

		$('.moverAbajo').click(function(e){
			e.preventDefault();
			$.fn.fullpage.moveSectionDown();
		});

		$('.moverArriba').click(function(e){
			e.preventDefault();
			$.fn.fullpage.moveSectionUp();
		});

	});
	</script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-80820004-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>

</html>
