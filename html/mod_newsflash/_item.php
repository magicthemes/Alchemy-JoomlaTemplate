<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<article>
<?php if ($params->get('item_title')) : ?>
	<header>
	<?php if ($params->get('link_titles') && $item->linkOn != '') : ?>
		<a href="<?php echo $item->linkOn;?>" class="title"><h1><?php echo $item->title;?></h1></a>
	<?php else : ?>
		<h1><?php echo $item->title; ?></h1>
	<?php endif; ?>
	</header>
<?php endif; ?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<?php echo $item->text; ?>

<?php if (isset($item->linkOn) && $item->readmore && $params->get('readmore')) : ?>
	<p class="readmore">
		<a href="<?php echo $item->linkOn;?>"><span><?php echo $item->linkText;?></span></a>
	</p>
<?php endif; ?>
</article>
