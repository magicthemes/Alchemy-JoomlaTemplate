<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<table class="newsflash">
	<tr>
	<?php foreach ($list as $item) : ?>
		<td>
			<?php modNewsFlashHelper::renderItem($item, $params, $access); ?>
		</td>
	<?php endforeach; ?>
	</tr>
</table>
