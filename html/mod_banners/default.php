<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="bannergroup">

<?php if ($headerText) : ?>
	<h2><?php echo $headerText ?></h2>
<?php endif; ?>

<?php foreach($list as $item) : ?>
	<div class="banneritem"><?php echo modBannersHelper::renderBanner($params, $item); ?></div>
<?php endforeach; ?>

<?php if ($footerText) : ?>
	<footer>
		 <?php echo $footerText ?>
	</footer>
<?php endif; ?>
</div>
