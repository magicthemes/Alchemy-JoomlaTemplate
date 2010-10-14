<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<section id="user-register" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">

<?php
	if(isset($this->message)){
		$this->display('message');
	}
?>

<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">
	<ul class="fields">
		<li>
			<label id="namemsg" for="name">
				<?php echo JText::_( 'Name' ); ?>:
			</label>
			<div class="field">
				<input type="text" name="name" id="name" size="40" value="<?php echo $this->user->get( 'name' );?>" class="inputbox required" maxlength="50" /> *
			</div>
	  	</li>
	  	<li>
			<label id="usernamemsg" for="username">
				<?php echo JText::_( 'Username' ); ?>:
			</label>
			<div class="field">
				<input type="text" id="username" name="username" size="40" value="<?php echo $this->user->get( 'username' );?>" class="inputbox required validate-username" maxlength="25" /> *
			</div>
	  	</li>
	  	<li>
			<label id="emailmsg" for="email">
				<?php echo JText::_( 'Email' ); ?>:
			</label>
			<div class="field">
				<input type="text" id="email" name="email" size="40" value="<?php echo $this->user->get( 'email' );?>" class="inputbox required validate-email" maxlength="100" /> *
			</div>
	  	</li>
	  	<li>
			<label id="pwmsg" for="password">
				<?php echo JText::_( 'Password' ); ?>:
			</label>
			<div class="field">
		  		<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /> *
			</div>
	  	</li>
	  	<li>
			<label id="pw2msg" for="password2">
				<?php echo JText::_( 'Verify Password' ); ?>:
			</label>
			<div class="field">
				<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /> *
			</div>
		</li>
	</ul>
	<p>
		<?php echo JText::_( 'REGISTER_REQUIRED' ); ?>
	</p>
	<button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
	<input type="hidden" name="task" value="register_save" />
	<input type="hidden" name="id" value="0" />
	<input type="hidden" name="gid" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>

</section>
