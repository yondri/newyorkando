<meta charset="utf-8">

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php bloginfo('name'); ?><?php wp_title('&ndash;'); ?></title>

<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">

<link rel="author" href="https://plus.google.com/112127368457109204630/>

<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="alternate" href="feedburner" type="application/rss+xml" />

<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css?v=1">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/style-ia3-1.0.2.css?v=1">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/style-fancybox-1.3.1.css?v=1">

<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/modernizr-1.5.min.js"></script>


<!-- Custom Colours -->
<style>
    a,
    a:hover,
    label,
    .HSC,
    .index #content section.G6 h1 {
    color:<?php echo ia3_helpers::get_option('Colours-1', '#CC0000'); ?>;
    }
    
    a:visited {
    color:<?php echo ia3_helpers::get_option('Colours-2', '#AA0000'); ?>;
    }
</style>


<?php wp_head(); ?>

<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('9748-831-10-6042');/*]]>*/</script><noscript><a href="https://www.olark.com/site/9748-831-10-6042/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->