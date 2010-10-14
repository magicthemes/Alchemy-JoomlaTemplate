<?php defined('_JEXEC') or die('Restricted access'); ?>

<section id="user-login" class="<?php echo $this->escape($this->params->get('pageclass_sfx', 'default')); ?>">

<?php if ($this->params->get( 'show_page_title', 1)) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<?php echo $this->loadTemplate($this->type); ?>

</section>
