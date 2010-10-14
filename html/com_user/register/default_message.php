<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<header class="componentheading">
	<h1><?php echo $this->message->title ; ?></h1>
</header>

<section class="message">
	<?php echo  $this->message->text ; ?>
</section>
