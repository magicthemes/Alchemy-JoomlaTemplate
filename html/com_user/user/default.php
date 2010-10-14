<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<section id="user-user" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

	<details class="description">
			<?php echo JText::_( 'WELCOME_DESC' ); ?>
	</details>
</section>
