<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>

<section id="poll-poll" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">

	<?php if ($this->params->get( 'show_page_title', 1)) : ?>
		<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
	<?php endif; ?>

	<form action="index.php" method="post" name="poll" id="poll">
	<div class="poll">
		<label for="id">
			<?php echo JText::_('Select Poll'); ?>
			<?php echo $this->lists['polls']; ?>
		</label>
		<?php echo $this->loadTemplate('graph'); ?>
	</div>
	</form>

</section>
