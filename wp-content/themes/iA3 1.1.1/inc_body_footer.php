<footer>
    <?php
    if (is_home()) {
        ?>
        <!-- NY_Homepage_728x90_ps2 -->
        <div id='div-gpt-ad-1398118147407-18' style='width:728px; height:90px; float:right;'>
        <script type='text/javascript'>
        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-18'); });
        </script>
        </div>
        <?php
    }
    ?>
    <nav>
        <ul class="containsGrid G6 GS" id="footerOne">
            <li class="G2 GS">
                <h2 class="implied"><?php _e('Buscar', ''); ?> <?php bloginfo('name'); ?></h2>
                <?php get_search_form(); ?>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-1-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-1-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-1-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-1-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-2-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-2-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-2-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-2-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-3-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-3-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-3-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-3-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-4-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-4-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-4-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-4-4', ''); ?></li>
                </ul>
            </li>
        </ul><!-- .containsGrid.G6GS#footerOne -->
        
        <ul class="G6 GS" id="footerTwo">
            <li><?php echo ia3_helpers::get_nav_cell('Footer-1-1', ''); ?></li>
            <li><?php echo ia3_helpers::get_nav_cell('Footer-2-1', ''); ?></li>
            <li><?php echo ia3_helpers::get_nav_cell('Footer-3-1', ''); ?></li>
            <li><?php echo ia3_helpers::get_nav_cell('Footer-4-1', ''); ?></li>
            <li>© <?php echo date('Y') ?> NewYorkAndo</li>
        </ul><!-- G6.GS#footerOne -->
    </nav>
    <div id="adsense_aside" style="display:none; margin:5px;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Newyorkando Side 1 -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:250px"
             data-ad-client="ca-pub-0064625008760983"
             data-ad-slot="7596414703"></ins>

        <!-- Newyorkando Side 2 -->
        <div style="text-align: center;">
            <ins class="adsbygoogle"
                 style="display:inline-block;width:160px;height:600px"
                 data-ad-client="ca-pub-0064625008760983"
                 data-ad-slot="7596414703"></ins>
        </div>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div id="adsense_related" style="display:none;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Newyorkando Related content -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-0064625008760983"
             data-ad-slot="7596414703"></ins>
        </div>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <?php
    $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    if(strpos($url,'apartamentos') !== false || strpos($url,'hoteles') !== false || strpos($url,'hostales') !== false){
        ?>
        <div id="alojamientos" style="display:none; margin-top: 2em;">
            <!-- NY_Alojamientos_300x250 -->
            <div id='div-gpt-ad-1398118147407-1' style='width:300px; height:250px; display: margin: 0 auto; margin-bottom: 10em;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-1'); });
            </script>
            </div>

            <!-- NY_Alojamientos_160x600 -->
            <div id='div-gpt-ad-1398118147407-0' style='width:160px; height:600px; margin: 0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-0'); });
            </script>
            </div>
        </div>
        <?php
    }else if(strpos($url,'que-ver') !== false || strpos($url,'barrios') !== false || strpos($url,'museos') !== false){
        ?>
        <div id="visitas" style="display:none; margin-top: 2em;">
            <!-- NY_Visitas_300x250 -->
            <div id='div-gpt-ad-1398118147407-20' style='width:300px; height:250px; margin: 0 auto; margin-bottom: 1em;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-20'); });
            </script>
            </div>

            <!-- NY_Visitas_160x600 -->
            <div id='div-gpt-ad-1398118147407-19' style='width:160px; height:600px; margin: 0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-19'); });
            </script>
            </div>
        </div>
        <?php
    }else if(strpos($url,'visitas-guiadas') !== false || strpos($url,'new-york-pass') !== false){
        ?>
        <div id="excursiones" style="display:none; margin-top: 2em;">
            <!-- NY_Excursiones_300x250 -->
            <div id='div-gpt-ad-1398118147407-5' style='width:300px; height:250px; margin: 0 auto; margin-bottom: 10em;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-5'); });
            </script>
            </div>

            <!-- NY_Excursiones_160x600 -->
            <div id='div-gpt-ad-1398118147407-4' style='width:160px; height:600px; margin: 0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-4'); });
            </script>
            </div>
        </div>
        <?php
    }else if(strpos($url,'entradas-para-broadway-con-descuento') !== false || strpos($url,'transporte') !== false || strpos($url,'como-ahorrar') !== false){
        ?>
        <div id="guia" style="display:none; margin-top: 2em;">
            <!-- NY_Guia_Newyork_300x250 -->
            <div id='div-gpt-ad-1398118147407-9' style='width:300px; height:250px; margin: 0 auto; margin-bottom: 10em;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-9'); });
            </script>
            </div>

            <!-- NY_Guia_Newyork_160x600 -->
            <div id='div-gpt-ad-1398118147407-8' style='width:160px; height:600px; margin: 0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-8'); });
            </script>
            </div>
        </div>
        <?php
    }else{ //Agrego los ads por defecto (mientras tanto los de visitas guiadas)
        ?>
        <div id="provisional" style="display:none; margin-top: 2em;">
            <!-- NY_Excursiones_300x250 -->
            <div id='div-gpt-ad-1398118147407-5' style='width:300px; height:250px; margin: 0 auto; margin-bottom: 10em;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-5'); });
            </script>
            </div>

            <!-- NY_Excursiones_160x600 -->
            <div id='div-gpt-ad-1398118147407-4' style='width:160px; height:600px; margin: 0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-4'); });
            </script>
            </div>
        </div>
        <?php
    }

    // Ads para el footer en páginas
    $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    if(strpos($url,'apartamentos') !== false || strpos($url,'hoteles') !== false || strpos($url,'hostales') !== false){
        ?>
        <div id="alojamientos_footer" style="display:none; margin-bottom: 1em;">
           <!-- NY_Alojamientos_728x90_ps2 -->
            <div id='div-gpt-ad-1398118147407-3' style='width:728px; height:90px; float:right;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-3'); });
            </script>
            </div>
        </div>
        <?php
    }else if(strpos($url,'que-ver') !== false || strpos($url,'barrios') !== false || strpos($url,'museos') !== false){
        ?>
        <div id="visitas_footer" style="display:none; margin-bottom: 1em;">
            <!-- NY_Visitas_728x90_ps2 -->
            <div id='div-gpt-ad-1398118147407-22' style='width:728px; height:90px; float:right;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-22'); });
            </script>
            </div>
        </div>
        <?php
    }else if(strpos($url,'visitas-guiadas') !== false || strpos($url,'new-york-pass') !== false){
        ?>
        <div id="excursiones_footer" style="display:none; margin-bottom: 1em;">
            <!-- NY_Excursiones_728x90_ps2 -->
            <div id='div-gpt-ad-1398118147407-7' style='width:728px; height:90px; float:right;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-7'); });
            </script>
            </div>
        </div>
        <?php
    }else if(strpos($url,'entradas-para-broadway-con-descuento') !== false || strpos($url,'transporte') !== false || strpos($url,'como-ahorrar') !== false){
        ?>
        <div id="guia_footer" style="display:none; margin-bottom: 1em;">
            <!-- NY_Guia_Newyork_728x90_ps2 -->
            <div id='div-gpt-ad-1398118147407-11' style='width:728px; height:90px; float:right;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-11'); });
            </script>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div id="provisional_footer" style="display:none; margin-bottom: 1em;">
            <!-- NY_Excursiones_728x90_ps2 -->
            <div id='div-gpt-ad-1398118147407-7' style='width:728px; height:90px; float:right;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1398118147407-7'); });
            </script>
            </div>
        </div>
        <?php
    }

    ?>
</footer>

<script src="http://platform.twitter.com/anywhere.js?id=5tkByG68UteUZBFKSFryA&amp;v=1"></script>


<script>!window.jQuery && document.write('<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery-1.4.2.min.js"><\/script>');</script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery.fancybox-1.3.1.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery.timeago-0.9.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/ia3.js?v=1"></script>
<script>
    window.BASE_URL = '<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>';

    $(document).ready(function() {
        $(document).trigger('CORE:HAS_INITIALIZED');

        // Incluir ads del sidebar dependiendo de la página visitada
        //var page = '<?php echo $wp_query->queried_object->post_name; ?>';
        var page = '<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>';
        console.log('URL: '+page);
        if(page.indexOf("apartamentos") > -1 || page.indexOf("hoteles") > -1 || page.indexOf("hostales") > -1){
            $('#alojamientos').appendTo(".asideBlock");
            $('#alojamientos').show();
            $('.adsense-leadout').append($('#alojamientos_footer'));
            $('#alojamientos_footer').show();
        }else if(page.indexOf("que-ver") > -1 || page.indexOf("barrios") > -1 || page.indexOf("museos") > -1){
            console.log('Pasa barrios');
            $('#visitas').appendTo(".asideBlock");
            $('#visitas').show();
            $('.adsense-leadout').append($('#visitas_footer'));
            $('#visitas_footer').show();
        }else if(page.indexOf("visitas-guiadas") > -1 || page.indexOf("new-york-pass") > -1){
            $('#excursiones').appendTo(".asideBlock");
            $('#excursiones').show();
            $('.adsense-leadout').append($('#excursiones_footer'));
            $('#excursiones_footer').show();
        }else if(page.indexOf("entradas-para-broadway-con-descuento") > -1 || page.indexOf("transporte") > -1 || page.indexOf("como-ahorrar") > -1){
            $('#guia').appendTo(".asideBlock");
            $('#guia').show();
            $('.adsense-leadout').append($('#guia_footer'));
            $('#guia_footer').show();
        }else{
            if(page != 'www.newyorkando.com/' && page != 'newyorkando.com/'){
                $('#provisional').appendTo(".asideBlock");
                $('#provisional').show();
                $('.adsense-leadout').append($('#provisional_footer'));
                $('#provisional_footer').show();
            }
        }
    });
   
    $(window).resize(function() {
        $(document).trigger('CORE:HAS_RESIZED');
    });
</script>

<?php wp_footer(); ?>

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9656652; 
var sc_invisible=0; 
var sc_security="68827c3b"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hits counter"
href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/9656652/0/68827c3b/0/"
alt="hits counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->