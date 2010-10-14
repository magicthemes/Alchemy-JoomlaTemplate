<?php defined('_JEXEC') or die; ?>

<section id="user-reset" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>
	<form action="index.php?option=com_user&amp;task=requestreset" method="post" class="josForm form-validate">
		<p><?php echo JText::_('RESET_PASSWORD_REQUEST_DESCRIPTION'); ?></p>
		<label for="email" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_EMAIL_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_EMAIL_TIP_TEXT'); ?>"><?php echo JText::_('Email Address'); ?>:</label>
		<input id="email" name="email" type="text" class="required validate-email" />
		<button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</section>
