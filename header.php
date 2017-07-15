<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

?>
<!-- 

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
                                                                                                                                                                                                                                                                       
-->
<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" 		content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" 	type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<title><?php 
            $titulo = wp_title('&raquo;', false, '');
            if (is_search()) {
                $titulo = sprintf( 
                    esc_html__('Resultados para &#8220;%s&#8221; - IT FLOSS', 'hummingBird'), 
                    get_search_query() 
                );
            }
            echo $titulo;
         ?></title>
		<meta name="Resource-type" 	content="Document" />
		<meta name="description" 	content="Sitio de la comunidad IT Floss Rosario" />
		<meta name="keywords"  		content="open-source, comunidad, rosario, it floss, geek" />
        <meta name="author"         content="IT Floss" />
		<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/estilos.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/iziModal.css" />

        <?php
            $imagen = get_template_directory_uri() ."/img/adminfest1.jpg";
            $campos = get_fields();
            if($campos){
                $imagen = $campos['imagen'];
            }
        ?>
        <meta property="og:image" content="<?= $imagen ?>" />
        <meta name="twitter:image" content="<?= $imagen ?>">

		<?php wp_head(); ?>
	</head>
	<body class="blanco">

        
        <header class="top">
            <div class="grid">
                <div class="col-1-1 p-top">
                    <div class="content transicion">
                        <div class="logo">
                            <a href="/"><img src="<?= get_template_directory_uri(); ?>/img/if_negro.png" alt="IT FLOSS" width="100px" /></a>
                        </div>

                        <nav class="menu">
                            <ul>
                                <li><a href="/">Inicio</a></li>
                                <!-- <li><a href="/blog">Blog</a></li> -->
                                <li><a href="/eventos">Eventos</a></li>
                                <li><a target="_blank" href="/portada">Portada Legacy</a></li>
                                <li><a class="ultimo-item" href="/about">About</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </header>
        


