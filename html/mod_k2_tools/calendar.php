<?php
/**
 * @version		$Id: calendar.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<script type="text/javascript">
	//<![CDATA[
	window.addEvent('domready', function(){
	    $$('a.calendarNavLink').addEvent('click', function(e){
	        new Event(e).stop();
					var url = this.getProperty('href');
	        $('k2ModuleBox<?php echo $module->id; ?>').empty().addClass('k2CalendarLoader');
	        new Ajax(url, {
	            method: 'post',
	            update: $('k2ModuleBox<?php echo $module->id; ?>'),
	            onComplete: function(){
	                $('k2ModuleBox<?php echo $module->id; ?>').removeClass('k2CalendarLoader');
									window.fireEvent('k2CalendarEvent');
	            }
	        }).request();
	    });
	    
	});
	
	window.addEvent('k2CalendarEvent', function(){
	    $$('a.calendarNavLink').addEvent('click', function(e){
	        new Event(e).stop();
					var url = this.getProperty('href');
	        $('k2ModuleBox<?php echo $module->id; ?>').empty().addClass('k2CalendarLoader');
	        new Ajax(url, {
	            method: 'post',
	            update: $('k2ModuleBox<?php echo $module->id; ?>'),
	            onComplete: function(){
	                $('k2ModuleBox<?php echo $module->id; ?>').removeClass('k2CalendarLoader');
									window.fireEvent('k2CalendarEvent');
	            }
	        }).request();
	    });
	});
	//]]>
</script>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2CalendarBlock">
	<?php echo $calendar; ?>
	<div class="clr"></div>
</div>
