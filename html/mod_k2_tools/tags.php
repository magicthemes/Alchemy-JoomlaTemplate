<?php
/**
 * @version		$Id: tags.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2TagCloudBlock">
	<?php foreach ($tags as $tag): ?>
	<?php if(!empty($tag->tag)): ?>
	<a href="<?php echo $tag->link; ?>" style="font-size:<?php echo $tag->size; ?>%" title="<?php echo $tag->count.' '.JText::_('items tagged with').' '.$tag->tag; ?>">
		<?php echo $tag->tag; ?>
	</a>
	<?php endif; ?>
	<?php endforeach; ?>
	<div class="clr"></div>
</div>
