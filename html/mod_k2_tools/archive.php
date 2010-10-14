<?php 
/**
 * @version		$Id: archive.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ArchivesBlock">
  <ul>
    <?php foreach ($months as $month): ?>
    <li>
      <?php if ($params->get('archiveCategory', 0) > 0): ?>
      <a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&task=date&month='.$month->m.'&year='.$month->y.'&catid='.$params->get('archiveCategory')); ?>">
        <?php echo $month->name.' '.$month->y; ?>
        <?php if ($params->get('archiveItemsCounter')) echo '('.$month->numOfItems.')'; ?>
      </a>
      <?php else : ?>
      <a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&task=date&month='.$month->m.'&year='.$month->y); ?>">
        <?php echo $month->name.' '.$month->y; ?>
        <?php if ($params->get('archiveItemsCounter')) echo '('.$month->numOfItems.')'; ?>
      </a>
      <?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
