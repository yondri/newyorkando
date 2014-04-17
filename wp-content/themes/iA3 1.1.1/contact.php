<?php
/**
*   Template Name: Contact
**/
?>
<!DOCTYPE html>

<!--[if IE 6 ]><html class="ie ielt9 ielt8 ielt7 ie6" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 7 ]><html class="ie ielt9 ielt8 ie7" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 8 ]><html class="ie ielt9 ie8" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php bloginfo('language'); ?>"><!--<![endif]-->
    <head>
        <?php @include('inc_head.php'); ?>
    </head>
    <body class="contact">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>

            <section class="G6 GR" id="content">
                <header class="G4 GR">
                    <h1><?php _e('Contacto', 'ia3'); ?></h1>
                </header><!-- G4 GR -->
                <section class="G4 GR">
<div class="formatted">
Para ponerte en contacto con nosotros usa la información a la izquierda. También puedes contactarnos directamente a través de <a href="http://www.twitter.com/newyorkando">twitter</a> o de nuestro facebook. Pasa saber más de nuestro proyecto entra en la sección que habla sobre <a href="/sobre-nosotros/">nosotros</a>.</div>

                </section><!-- G4 GR -->
                <section class="G2 GS">
                    <dl class="containsAddress">
                        <dt><?php _e('Mail', 'ia3'); ?>:</dt>
                        <dd class="email"><a href="mailto:info@newyorkando.com">info@newyorkando.com</a></dd>
                        <dt><?php _e('Phone', 'ia3'); ?>:</dt>
                        <dd class="tel"> USA: +1 (641) 715-390 <br />Ext. 952078# </dd>
                        <dd class="tel">EUROPA: +351 (910) 105881 </dd>
                        <dt><?php _e('Twitter', 'ia3'); ?>:</dt>
                        <dd class="twitter"><a class="twooser" href="http://twitter.com/newyorkando">@newyorkando</a></dd>
                        
                     
                        
                    </dl>
                   
                </section><!-- G2 GS -->
            </section><!-- #content.ia.ia-6.ia-r.ia-s -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>