<?php
/** $Id: default_form.php 11328 2008-12-12 19:22:41Z kdevine $ */
defined( '_JEXEC' ) or die( 'Restricted access' );

$script = '<!--
	function validateForm( frm ) {
		var valid = document.formvalidator.isValid(frm);
		if (valid == false) {
			// do field validation
			if (frm.email.invalid) {
				alert( "' . JText::_( 'Please enter a valid e-mail address.', true ) . '" );
			} else if (frm.text.invalid) {
				alert( "' . JText::_( 'CONTACT_FORM_NC', true ) . '" );
			}
			return false;
		} else {
			frm.submit();
		}
	}
	// -->';
$document =& JFactory::getDocument();
$document->addScriptDeclaration($script);
	
if(isset($this->error)) : ?>
<section class="error">
	<?php echo $this->error; ?>
</section>
<?php endif; ?>
<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="emailForm" id="emailForm" class="form-validate">
	<div class="contact_email">
		<ul class="fields">
			<li>
				<label for="contact_name">
					&nbsp;<?php echo JText::_( 'Enter your name' );?>:
				</label>
				<div class="field">
					<input type="text" name="name" id="contact_name" size="30" class="inputbox" value="" />
				</div>
			</li>
			<li>
				<label id="contact_emailmsg" for="contact_email">
					&nbsp;<?php echo JText::_( 'Email address' );?>:
				</label>
				<div class="field">
					<input type="text" id="contact_email" name="email" size="30" value="" class="inputbox required validate-email" maxlength="100" />
				</div>
			</li>
			<li>
				<label for="contact_subject">
					&nbsp;<?php echo JText::_( 'Message subject' );?>:
				</label>				
				<div class="field">
					<input type="text" name="subject" id="contact_subject" size="30" class="inputbox" value="" />
				</div>
			</li>
			<li>
				<label id="contact_textmsg" for="contact_text">
					&nbsp;<?php echo JText::_( 'Enter your message' );?>:
				</label>				
				<div class="field">
					<textarea cols="50" rows="10" name="text" id="contact_text" class="inputbox required"></textarea>
				</div>
			</li>
			<?php if ($this->contact->params->get( 'show_email_copy' )) : ?>
			<li>
				<label for="contact_email_copy">
				<input type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />
					<?php echo JText::_( 'EMAIL_A_COPY' ); ?>
				</label>
			</li>
			<?php endif; ?>
			<li>
				<button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
			</li>
		</ul>
	</div>

<input type="hidden" name="option" value="com_contact" />
<input type="hidden" name="view" value="contact" />
<input type="hidden" name="id" value="<?php echo $this->contact->id; ?>" />
<input type="hidden" name="task" value="submit" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
