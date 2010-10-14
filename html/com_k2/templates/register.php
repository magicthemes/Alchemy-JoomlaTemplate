<?php
/**
 * @version		$Id: register.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<script type="text/javascript">
	//<![CDATA[
	window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value){
			return ($('password').value == value);
		});
	});
	//]]>
</script>

<!-- K2 user register form -->
<section id="k2-user-register" class="<?php echo $this->escape($this->params->get('pageclass_sfx', 'default')); ?>">
<?php if(isset($this->message)) $this->display('message'); ?>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" enctype="multipart/form-data" method="post" id="josForm" name="josForm" class="form-validate">

	<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
	<?php endif; ?>

	<div id="k2Container" class="k2AccountPage">

		<h2><?php echo JText::_( 'Account details' ); ?></h2>

		<ul class="fields">
			<li>
				<label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?></label>
				<div class="field">
					<input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' )); ?>" class="inputbox required" maxlength="50" /> * 
				</div>
			</li>
			<li>
				<label id="usernamemsg" for="username"><?php echo JText::_( 'User name' ); ?></label>
				<div class="field">
					<input type="text" id="username" name="username" size="40" value="<?php echo $this->escape($this->user->get( 'username' )); ?>" class="inputbox required validate-username" maxlength="25" /> *
				</div>
			</li>
			<li>
				<label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?></label>
				<div class="field">
					<input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" /> *
				</div>
			</li>
			<li>
				<label id="pwmsg" for="password"><?php echo JText::_( 'Password' ); ?></label>
				<div class="field">
					<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /> *
				</div>	
			</li>
			<li>
				<label id="pw2msg" for="password2"><?php echo JText::_( 'Verify Password' ); ?></label>
				<div class="field">
					<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /> *
				</div>
			</li>
		</ul>
		<h2><?php echo JText::_( 'Personal details' ); ?></h2>
		<!-- K2 attached fields -->
		<ul class="fields">
			<li>
				<label id="gendermsg" for="gender"><?php echo JText::_( 'Gender' ); ?></label>
				<div class="field">
					<?php echo $this->lists['gender']; ?>
				</div>
			</li>
			<li>
				<label id="descriptionmsg" for="description"><?php echo JText::_( 'Description' ); ?></label>
				<div class="field">
					<?php echo $this->editor; ?>
				</div>
			</li>
			<li>
				<label id="imagemsg" for="image"><?php echo JText::_( 'User image (avatar)' ); ?></label>
				<div class="field">
					<input type="file" id="image" name="image"/>
					<?php if ($this->K2User->image): ?>
						<img class="k2AdminImage" src="<?php echo JURI::root().'media/k2/users/'.$this->K2User->image; ?>" alt="<?php echo $this->user->name; ?>" />
						<input type="checkbox" name="del_image" id="del_image" />
						<label for="del_image"><?php echo JText::_('Check this box to delete current image or just upload a new image to replace the existing one'); ?></label>
					<?php endif; ?>
				</div>
			</li>
			<li>
				<label id="urlmsg" for="url"><?php echo JText::_( 'URL' ); ?></label>
				<div class="field">
					<input type="text" size="50" value="<?php echo $this->K2User->url; ?>" name="url" id="url"/>
				</div>
			</li>
		</ul>

		<?php if(count(array_filter($this->K2Plugins))): ?>
		<!-- K2 Plugin attached fields -->
		<h2><?php echo JText::_( 'Additional details' ); ?></h2>
		<ul class="fields">
			<?php foreach ($this->K2Plugins as $K2Plugin):?>
				<?php if(!is_null($K2Plugin)): ?>
				<li>
					<?php echo $K2Plugin->fields; ?>
				</li>
				<?php endif;?>
			<?php endforeach; ?>

		</ul>
		<?php endif; ?>


		<p class="k2AccountPageNotice"><?php echo JText::_( 'REGISTER_REQUIRED' ); ?></p>

		<div class="k2AccountPageUpdate">
			<button class="button validate" type="submit">
				<?php echo JText::_('Register'); ?>
			</button>
		</div>

	</div>

<input type="hidden" name="task" value="register_save" />
<input type="hidden" name="id" value="0" />
<input type="hidden" name="gid" value="0" />
<input type="hidden" name="K2UserForm" value="1" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>

</section>
