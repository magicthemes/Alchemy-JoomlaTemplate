<?php defined('_JEXEC') or die();
// Include the Alchemy Framework core class
require_once JPATH_ADMINISTRATOR.'/components/com_alchemy/framework/initialize.php';
// Start Alchemy based on the parameters passed.
Alchemy::start($this);
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class="no-js">
<head>
	<?php 
	// Initialize the js/metas/css/less that will be included in the document head
	echo Alchemy::call('html')->render('head');
	?>
</head>
<body>
	<div id="mt-template">
		<header id="mt-template-header">
			<jdoc:include type="modules" name="mt-nav" style="nav" />
		</header>

		<div id="mt-template-content">
		    <jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>

		<div id="mt-template-sidebar-left">
			<jdoc:include type="modules" name="mt-left" style="section" />
		</div>
		<footer id="mt-template-footer">
			<jdoc:include type="modules" name="mt-footer" style="section" />
		</footer>
	</div>
	<?php 
	// Render the scripts that should render in the bottom of the document for optimized loading
	echo Alchemy::call('html')->render('scripts', 'bottom');
	?>
</body>
</html>