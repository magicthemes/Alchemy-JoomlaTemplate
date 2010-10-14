<?php
/**
 * @version		$Id: search.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2SearchBlock">
  <form action="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&task=search'); ?>" method="get">
    <?php $app =& JFactory::getApplication(); if (!$app->getCfg('sef')): ?>
    <input type="hidden" name="option" value="com_k2" />
    <input type="hidden" name="view" value="itemlist" />
    <input type="hidden" name="task" value="search" />
    <?php endif; ?>
    
    <input name="searchword" maxlength="<?php echo $maxlength; ?>" alt="<?php echo $button_text; ?>" class="inputbox<?php echo $moduleclass_sfx; ?>" type="text" size="<?php echo $width; ?>" value="<?php echo $text; ?>" onblur="if(this.value=='') this.value='<?php echo $text; ?>';" onfocus="if(this.value=='<?php echo $text; ?>') this.value='';" />
    
    <?php if ($button):?>
    <?php if ($imagebutton):?>
    <input type="image" value="<?php echo $button_text; ?>" class="button<?php echo $moduleclass_sfx;?>" src="<?php echo $img; ?>" onclick="this.form.searchword.focus();"/>
    <?php else:?>
    <input type="submit" value="<?php echo $button_text; ?>" class="button<?php echo $moduleclass_sfx; ?>" onclick="this.form.searchword.focus();"/>
    <?php endif;?>
    <?php endif; ?>
  </form>
</div>
