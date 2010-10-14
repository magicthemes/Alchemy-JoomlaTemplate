<?php
defined('_JEXEC') or die('Restricted access');
$japp = JFactory::getApplication();
$jtemplate = $japp->getTemplate();
include JPATH_BASE.DS.'templates'.DS.$jtemplate.DS.'html'.DS.'com_content'.DS.'layout'.DS.'blog_links.php';
?>