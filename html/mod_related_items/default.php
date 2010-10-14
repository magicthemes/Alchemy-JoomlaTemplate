<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<ul>
<?php foreach ($list as $item) : ?>
	<li>
		<a href="<?php echo $item->route; ?>">
			<?php if ($showDate) echo $item->created . " - "; ?>
			<?php echo $item->title; ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
