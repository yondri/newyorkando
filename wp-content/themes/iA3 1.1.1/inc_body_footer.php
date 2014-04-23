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
    }else{
        
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
        /*$("#adsense_aside").appendTo(".asideBlock"); 
        $("#adsense_aside").show();
        $("#adsense_related").prependTo(".nr_related_placeholder"); 
        $("#adsense_related").show();*/
        //console.log('CARGA'+$(".nr_inner").html());

        /*window.checker = setInterval(function(){
            if($('.nr_inner').length>0){ //check if loaded
                console.log('CARGA');
                $("#adsense_related").prependTo(".nr_inner"); 
                $("#adsense_related").show();
                clearInterval(window.checker);
            }    
        },200);*/
    });

    /*$(window).load(function(){
        $("#adsense_related").prependTo(".nr_inner"); 
        //$("#adsense_related").show();
    });
*/    
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