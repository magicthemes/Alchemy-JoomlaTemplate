<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<section id="user-user" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

	<form action="index.php" method="post" name="userform" autocomplete="off" class="form-validate">
		<ul class="fields">
			<li>
				<label for="username">
					<?php echo JText::_( 'User Name' ); ?>:
				</label>
				<span><?php echo $this->user->get('username');?></span>
			</li>
			<li>
				<label for="name">
					<?php echo JText::_( 'Your Name' ); ?>:
				</label>
				<div class="field">
					<input class="inputbox required" type="text" id="name" name="name" value="<?php echo $this->user->get('name');?>" size="40" />
				</div>
			</li>
			<li>
				<label for="email">
					<?php echo JText::_( 'email' ); ?>:
				</label>
				<div class="field">
					<input class="inputbox required validate-email" type="text" id="email" name="email" value="<?php echo $this->user->get('email');?>" size="40" />
				</div>
			</li>
		<?php if($this->user->get('password')) : ?>
			<li>
				<label for="password">
					<?php echo JText::_( 'Password' ); ?>:
				</label>
				<div class="field">
					<input class="inputbox validate-password" type="password" id="password" name="password" value="" size="40" />
				</div>
			</li>
			<li>
				<label for="password2">
					<?php echo JText::_( 'Verify Password' ); ?>:
				</label>
				<div class="field">
					<input class="inputbox validate-passverify" type="password" id="password2" name="password2" size="40" />
				</div>
			</li>
		<?php endif; ?>
		</ul>

		<?php if (isset($this->params)): ?>
		<?php  $params = $this->params->getParams('params'); ?>
		<ul class="fields paramslist">
			<?php foreach ($params as $param) : ?>
			<li>
				<?php if ($param[0]): ?>
					<?php echo $param[0]; ?>
					<div class="field"><?php echo $param[1]; ?></div>
				<?php else: ?>
					<div class="field"><?php echo $param[1]; ?></div>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>

		<button class="button validate" type="submit" onclick="submitbutton( this.form );return false;"><?php echo JText::_('Save'); ?></button>

		<input type="hidden" name="username" value="<?php echo $this->user->get('username');?>" />
		<input type="hidden" name="id" value="<?php echo $this->user->get('id');?>" />
		<input type="hidden" name="gid" value="<?php echo $this->user->get('gid');?>" />
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="save" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</section>
