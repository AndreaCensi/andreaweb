<?php if ( is_front_page() ) { ?>
<link rel="stylesheet" 
      href="<?php echo get_template_directory_uri(); ?>/../catitselfA/style.index.css"  type="text/css"/>
<?php }  else {?>

<?php } ?>




<link rel="me" type="text/html" 
      href="http://www.google.com/profiles/106839984596770449716" />
 
<script type="text/javascript" 
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- MathJax.Hub.Config({
  TeX: {
    Macros: {
      RR: "{\\bf R}",
      bold: ["{\\bf #1}",1]
    }
  }
});

 -->


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
