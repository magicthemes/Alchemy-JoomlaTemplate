<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
</script>

<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">
	<div class="paginator">
		<label class="limit">
		<?php
			echo JText::_('Display Num') .'&nbsp;';
			echo $this->pagination->getLimitBox();
		?>
		</label>
	</div>
	<table class="listtable">
	<?php if ( $this->params->def( 'show_headings', 1 ) ) : ?>
	<thead>
		<td class="begin" width="5%">
			<?php echo JText::_('Num'); ?>
		</td>
		<td class="title" width="90%">
			<?php echo JHTML::_('grid.sort',  'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</td>
		<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>

		<td class="end" width="5%" nowrap="nowrap">
			<?php echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</td>
		<?php endif; ?>
	</thead>
	<?php endif; ?>
	<?php foreach ($this->items as $item) : ?>
	<tr class="row<?php echo $item->odd + 1; ?>">
		<td class="begin">
			<?php echo $this->pagination->getRowOffset( $item->count ); ?>
		</td>
		<td class="title">
			<?php if ( $item->image ) : ?>
			&nbsp;&nbsp;<?php echo $item->image;?>&nbsp;&nbsp;
			<?php endif; ?>
			<?php echo $item->link; ?>
			<?php if ( $this->params->get( 'show_link_description' ) ) : ?>
			<br /><span class="description"><?php echo nl2br($item->description); ?></span>
			<?php endif; ?>
		</td>
		<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>
		<td class="end">
			<?php echo $item->hits; ?>
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
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>
