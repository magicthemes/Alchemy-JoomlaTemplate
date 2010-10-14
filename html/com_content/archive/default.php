<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<section id="content-archive" class="<?php echo $this->params->get('pageclass_sfx', 'default');?>">
	<?php if ($this->params->get('show_page_title', 1)) : ?>
		<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
	<?php endif; ?>

	<form id="jForm" action="<?php JRoute::_('index.php')?>" method="post">
		<div class="filters">
			<?php if ($this->params->get('filter')) : ?>
			<?php echo JText::_('Filter').'&nbsp;'; ?>
			<input type="text" name="filter" value="<?php echo $this->escape($this->filter); ?>" class="inputbox" onchange="document.jForm.submit();" />
			<?php endif; ?>
			<?php echo $this->form->monthField; ?>
			<?php echo $this->form->yearField; ?>
			<?php echo $this->form->limitField; ?>
			<button type="submit" class="button"><?php echo JText::_('Filter'); ?></button>
		</div>

		<?php echo $this->loadTemplate('items'); ?>
		
		<footer class="pagination">
			<p class="nav">
					<?php echo $this->pagination->getPagesLinks(); ?>
			</p>
			<p class="count">
					<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		</footer>
		
		<input type="hidden" name="view" value="archive" />
		<input type="hidden" name="option" value="com_content" />
	</form>
</section>
