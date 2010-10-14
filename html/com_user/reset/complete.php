<?php defined('_JEXEC') or die; ?>

<section id="user-reset" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
	<h1><?php echo JText::_('Reset your Password'); ?></h1>
	<form action="index.php?option=com_user&amp;task=completereset" method="post" class="josForm form-validate">
		<p><?php echo JText::_('RESET_PASSWORD_COMPLETE_DESCRIPTION'); ?></p>
		<label for="password1" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_PASSWORD1_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_PASSWORD1_TIP_TEXT'); ?>"><?php echo JText::_('Password'); ?>:</label>
		<input id="password1" name="password1" type="password" class="required validate-password" />
		<label for="password2" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_PASSWORD2_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_PASSWORD2_TIP_TEXT'); ?>"><?php echo JText::_('Verify Password'); ?>:</label>
		<input id="password2" name="password2" type="password" class="required validate-password" />
		<button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</section>
