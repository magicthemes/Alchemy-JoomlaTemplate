<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<form action="<?php echo JRoute::_('index.php?view=category&id='.$this->category->slug); ?>" method="post" name="adminForm">
<?php if ($this->params->get('show_limit')) : ?>
	<div class="paginator">
		<label class="limit">
		<?php
			echo JText::_('Display Num');
			echo $this->pagination->getLimitBox();
		?>
		</label>
	</div>
<?php endif; ?>
<table class="listtable">
<?php if ( $this->params->get( 'show_headings' ) ) : ?>
<thead>
<tr>
	<td class="begin" width="5%">
		<?php echo JText::_('Num'); ?>
	</td>
	<?php if ( $this->params->get( 'show_name' ) ) : ?>
	<td class="title">
		<?php echo JText::_( 'Feed Name' ); ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_articles' ) ) : ?>
	<td class="end" width="10%" nowrap="nowrap">
		<?php echo JText::_( 'Num Articles' ); ?>
	</td>
	<?php endif; ?>
 </tr>
 </thead>
<?php endif; ?>
<?php foreach ($this->items as $item) : ?>
<tr class="row<?php echo $item->odd + 1; ?>">
	<td class="begin">
		<?php echo $item->count + 1; ?>
	</td>
	<td class="title">
		<a href="<?php echo $item->link; ?>"><?php echo $item->name; ?></a>
	</td>
	<?php if ( $this->params->get( 'show_articles' ) ) : ?>
	<td class="end">
		<?php echo $item->numarticles; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
<footer class="pagination">
	<p class="page_nav">
			<?php echo $this->pagination->getPagesLinks(); ?>
	</p>
	<p class="page_count">
			<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
</footer>
</form>
