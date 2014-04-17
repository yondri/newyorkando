<?php
/**
*   Template Name: Page
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

    <body class="page">
        <div id="screen">

            <?php @include('inc_body_header.php'); ?>

            <article class="G4 GR GS" id="content">

<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

                <?php while (have_posts()): the_post(); ?>
            <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                <div class="formatted">
                    <?php the_content(); ?>
                </div><!-- .formatted -->
                <?php endwhile; ?>

<div align="center">

<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>

<h3>¿Te gusta lo que lees? Síguenos para más:</h3>
<a href="https://twitter.com/newyorkando" class="twitter-follow-button" data-show-count="false" data-lang="es" data-size="large">Seguir a @newyorkando</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
            </article><!-- #content.G4.GR.GS -->
           

 <hr class="implied" />

		
            <?php @include('inc_body_footer.php'); ?>

        </div><!-- #screen -->
    </body>
</html>