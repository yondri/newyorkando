<footer>

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