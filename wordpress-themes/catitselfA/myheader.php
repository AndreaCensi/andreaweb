<?php if ( is_front_page() ) { ?>
  <!--<link rel="stylesheet" 
      href="<?php echo get_template_directory_uri(); ?>/../catitselfA/style.index.css"  type="text/css"/>-->
<?php }  else {?>

<?php } ?>

<meta name="viewport" content="width=1024" />

<link rel="me" type="text/html" 
      href="http://www.google.com/profiles/106839984596770449716" />
 
<script type="text/javascript" 
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    TeX: { 
        equationNumbers: { autoNumber: "AMS" },
        extensions: ["AMSmath.js", "AMSsymbols.js"] 
    },
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/SVG"], //" "output/HTML-CSS"],
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true
    },
    "HTML-CSS": { availableFonts: ["TeX"] }
  });
  MathJax.Ajax.loadComplete("/media/tex/symbols.js");
</script>

<!-- flow player -->
<script src="https://releases.flowplayer.org/5.2.1/flowplayer.min.js"></script>
<link rel="stylesheet" type="text/css"
   href="https://releases.flowplayer.org/5.2.0/skin/functional.css" />

<!-- zoom -->
<script src="/media/js/jquery.imageZoom.js"></script>
<link rel="stylesheet" type="text/css"  href="/media/js/jquery.imageZoom.css"/>
<script type="text/javascript">
 $(document).ready(function() {
  $(".imageZoom").imageZoom(); 
 });
</script>

<!-- additional fonts -->
<!-- <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css' /> -->
<!-- <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'> -->

<!-- <link href='http://fonts.googleapis.com/css?family=Signika:400,600,300,700' rel='stylesheet' type='text/css'/> -->
<!-- <link href='http://fonts.googleapis.com/css?family=Vollkorn:400italic,400,700' rel='stylesheet' type='text/css'/> -->
<link href='https://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
