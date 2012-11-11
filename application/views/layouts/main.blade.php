<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>{{ $title }}</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="stylesheet" href="/css/custom.css">
  <script src="js/scripts/vendor/modernizr/modernizr-2.6.2.min.js"></script>
</head>
<body>

<header>

  <nav>
    <ul class="nav nav--fit" id="main-nav">
      <li><a href="/">Home</a></li>
      <li><a href=/gigs>Gigs</a></li>
      <li><a href=#>Portfolio</a></li>
      <li><a href=#>Contact</a></li>
    </ul>
  </nav>

</header>
<section>
  @yield('content')
</section>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
  your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
  improve your experience.</p>
<![endif]-->


<!-- Add your site or application content here -->
@if ( CustomHelpers::isDev() )
  <script data-main="js/scripts/bootstrap" src="js/scripts/vendor/require.js"></script>
@else
  <script src="dist.js"></script>
@endif
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq = [
    ['_setAccount', 'UA-XXXXX-X'],
    ['_trackPageview']
  ];
  (function (d, t) {
    var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
    g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s)
  }(document, 'script'));
</script>
</body>
</html>