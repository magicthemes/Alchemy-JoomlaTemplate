<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php /** @todo Should this be routed */ ?>
<?php if ( $this->params->get( 'show_logout_title' ) AND $this->params->get('header_logout') ) : ?>
<h2><?php echo $this->params->get( 'header_logout' ); ?></h2>
<?php endif; ?>
<form action="index.php" method="post" name="login" id="login">

<?php if ($this->params->get('image_logout') != -1) : ?>
	<div class="image <?php echo 'f'.substr($this->params->get('image_logout_align'), 0, 1); ?>">
		<img src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->params->get('image_logout'); ?>" hspace="6" alt="" />
	</div>
<?php endif; ?>

<?php if ($this->params->get('description_logout')) : ?>
	<p><?php echo $this->params->get('description_logout_text');?></p>
<?php endif; ?>

<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'Logout' ); ?>" />

<input type="hidden" name="option" value="com_user" />
<input type="hidden" name="task" value="logout" />
<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
</form>
