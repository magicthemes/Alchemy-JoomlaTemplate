<?php defined('_JEXEC') or die; ?>

<section id="user-reset" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
	<h1><?php echo JText::_('Confirm your Account'); ?></h1>
	<form action="index.php?option=com_user&amp;task=confirmreset" method="post" class="josForm form-validate">
		<p><?php echo JText::_('RESET_PASSWORD_CONFIRM_DESCRIPTION'); ?></p>
		<label for="token" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_TOKEN_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_TOKEN_TIP_TEXT'); ?>"><?php echo JText::_('Token'); ?>:</label>
		<input id="token" name="token" type="text" class="required" size="36" />
		<button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</section>
