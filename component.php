<?php 
defined( '_JEXEC' ) or die('Restricted Access');  // Restrict access to J! only
$this->setGenerator(null);  // Remove the Joomla meta tag
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <jdoc:include type="head" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="shortcut icon" href="templates/<?php echo $this->template; ?>/images/favicon.ico">
    <!-- Uncomment the next line for Production -->
    <link rel="stylesheet" type="text/css" href="css/template.css" />
    <script src="flawless/js/flawless.js"></script>
    <!--[if lt IE 7]>
        <script src="flawless/js/flawless_ie.js" type="text/javascript"></script>
    <![endif]-->
</head>
<!--[if lt IE 7 ]> <body class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <body class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <body class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <body class="ie9"> <![endif]-->
	
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
<div id="container">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
</div>

<?php if ($this->params->get('analytics_enabled', FALSE)): ?>
	<script>
	   var _gaq = [['_setAccount', <?php echo $this->params->get('analytics_id');?>], ['_trackPageview']];
	   (function(d, t) {
	    var g = d.createElement(t),
	        s = d.getElementsByTagName(t)[0];
	    g.async = true;
	    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    s.parentNode.insertBefore(g, s);
	   })(document, 'script');
	  </script>
<?php endif ?>
</body>
</html>
