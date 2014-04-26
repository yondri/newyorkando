<?php
/**
*   Template Name: Index
**/

$featured_id = 0;

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


    <body class="index">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>

            <div id="content">
                <?php query_posts(array('category_name' => 'Featured', 'showposts' => 1)); if (have_posts()): ?>
                <section class="G6 GS">
                    <h1 class="implied"><?php _e('', 'ia3'); ?></h1>
                    <?php while (have_posts()): the_post();
                    $featured_id = get_the_ID();
                    ?>
                    <a href="<?php the_permalink() ?>">
                        <?php if (has_post_thumbnail()): ?>
                        <img alt="<?php the_title(); ?>" src="<?php $f = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); echo isset($f[0])? $f[0]: 'http://www.placeholder-image.com/image/942x504';?>" />
                        <?php else: ?>
                        <img alt="<?php the_title(); ?>" src="<?php $f = get_post_custom_values('featured_image'); echo isset($f[0])? $f[0]: 'http://www.placeholder-image.com/image/942x504';?>" />
                        <?php endif; ?>
                    </a>
                    <?php // Header ad
                    if ($_SERVER["REQUEST_URI"] == '/') {
                        ?>
                        <div style="margin-bottom: 1em;">
                            <!-- NY_Homepage_728x90_ps1 -->
                            <div id='div-gpt-ad-1398118147407-17' style='width:728px; height:90px; margin: 0 auto;'>
                                <script type='text/javascript'>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-17'); });
                                </script>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <hgroup>
                        <h1><?php the_title(); ?></h1>
                    </hgroup>
                    <div class="formatted">
                        <?php the_content(__('Leer más', 'newyorkando')); ?>
                    </div><!-- .formatted -->
                    <?php endwhile; ?>
                </section><!-- G6 GS -->
                <hr class="implied" />
                <?php endif; wp_reset_query(); ?>

                <section class="G2 GS">
                    <?php if ((!function_exists('dynamic_sidebar')) || (!dynamic_sidebar())): ?>
                    <div>
                        <h1 class="HSC"><?php _e('Sobre Nosotros', 'lisboando'); ?> <?php bloginfo('name'); ?></h1>
                        <p><em><?php echo trim(get_bloginfo('description'), '.'); ?></em>. <a href="<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>/profile/"><?php _e('Más', 'lisboando'); ?></a></p>
                    </div>
                    <?php endif; ?>
                    <div>
                        <?php
                        if (is_home()) {
                            ?>
                            <!-- NY_Homepage_160x600_ps1 -->
                            <div id='div-gpt-ad-1398118147407-12' style='width:160px; height:600px; margin: 0 auto; margin-bottom: 10em;'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-12'); });
                            </script>
                            </div>

                            <!-- NY_Homepage_160x600_ps2 -->
                            <div id='div-gpt-ad-1398118147407-13' style='width:160px; height:600px; margin: 0 auto; margin-bottom: 10em;'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-13'); });
                            </script>
                            </div>

                            <!-- NY_Homepage_300x250_ps1 -->
                            <div id='div-gpt-ad-1398118147407-15' style='width:300px; height:250px; margin: 0 auto; margin-bottom: 10em;'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-15'); });
                            </script>
                            </div>

                            <!-- NY_Homepage_300x250_ps2 -->
                            <div id='div-gpt-ad-1398118147407-16' style='width:300px; height:250px; margin: 0 auto; margin-bottom: 10em;'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-16'); });
                            </script>
                            </div>

                            <!-- NY_Homepage_160x600_ps3 -->
                            <div id='div-gpt-ad-1398118147407-14' style='width:160px; height:600px; margin: 0 auto;'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-14'); });
                            </script>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </section><!-- .ia.ia-2.ia-s -->


  <?php query_posts(array('category_name' => 'Destacados', 'showposts' => 50)); if (have_posts()): ?> 
                <section class="G4">
<div align="right">

<div align="right"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Newyorkando Ppal -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-0064625008760983"
     data-ad-slot="7596414703"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

</div>
                    <h1 class="HSC"><?php _e('Los posts favoritos de nuestro "<a href=http://www.newyorkando.com/category/blog>Blog de New York</a>", ', 'Lisboa'); ?></h1>

                    <dl class="containsArticles">
                        <?php while(have_posts()): the_post(); ?>
    					<dt><a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></dt>                         
 <dd>
                            <?php echo preg_replace('/<p>(.+?)<\/p>/','$1',get_the_excerpt()); ?> <a href="<?php the_permalink() ?>" class="more-link"><?php _e('Leer más sobre esto en el blog', 'ia3'); ?><span class="implied"> &ndash; &lsquo;<?php the_title(); ?>&rsquo;</span>+</a>
                        </dd>
<?php endwhile; wp_reset_query(); ?>
                    </dl><!-- .containsArticles --> 

  </section><!-- G4 GR -->
                <?php endif; ?>
                <hr class="implied" />
            </div><!-- #content -->
            <hr class="implied" />

       <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->

    </body>
</html>