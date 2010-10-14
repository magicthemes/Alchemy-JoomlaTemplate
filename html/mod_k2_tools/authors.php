<?php
/**
 * @version		$Id: authors.php 499 2010-06-24 16:23:04Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2AuthorsListBlock">
  <ul>
    <?php foreach ($authors as $author): ?>
    <li>
      <?php if ($params->get('authorAvatar')):?>
      <a class="k2Avatar abAuthorAvatar" href="<?php echo $author->link; ?>" title="<?php echo $author->name; ?>">
      	<img src="<?php echo $author->avatar; ?>" alt="<?php echo $author->name; ?>" style="width:<?php echo $avatarWidth; ?>px;height:auto;" />
      </a>
      <?php endif; ?>
      
      <a class="abAuthorName" href="<?php echo $author->link; ?>">
      	<?php echo $author->name; ?>
      	
      	<?php if ($params->get('authorItemsCounter')):?>
      	<span>(<?php echo $author->items; ?>)</span>
      	<?php endif; ?>
      </a>
      
      <?php if ($params->get('authorLatestItem')):?>
      <a class="abAuthorLatestItem" href="<?php echo $author->latest->link; ?>" title="<?php echo $author->latest->title; ?>">
      	<?php echo $author->latest->title; ?>
	      <span class="abAuthorCommentsCount">
	      	(<?php echo $author->latest->numOfComments; ?> <?php echo JText::_('comments'); ?>)
	      </span>
      </a>
      <?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
