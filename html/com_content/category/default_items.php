<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">

	function tableOrdering( order, dir, task )
	{
		var form = document.adminForm;

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		document.adminForm.submit( task );
	}
</script>
<form action="<?php echo $this->action; ?>" method="post" name="adminForm">
<?php if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
	<div class="paginator">
	<?php if ($this->params->get('filter')) : ?>
		<label class="filter">
			<?php echo JText::_($this->params->get('filter_type') . ' Filter').'&nbsp;'; ?>
			<input type="text" name="filter" value="<?php echo $this->lists['filter'];?>" class="inputbox" onchange="document.adminForm.submit();" />
		</label>
	<?php endif; ?>
	<?php if ($this->params->get('show_pagination_limit')) : ?>
		<label class="limit">
		<?php
			echo '&nbsp;&nbsp;&nbsp;'.JText::_('Display Num').'&nbsp;';
			echo $this->pagination->getLimitBox();
		?>
		</label>
	<?php endif; ?>
	</div>
<?php endif; ?>
<table class="listtable">
<?php if ($this->params->get('show_headings')) : ?>
<thead>
<tr>
	<td class="begin" width="5%">
		<?php echo JText::_('Num'); ?>
	</td>
	<?php if ($this->params->get('show_title')) : ?>
 	<td class="title" width="45%">
		<?php echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_date')) : ?>
	<td class="detail" width="25%">
		<?php echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_author')) : ?>
	<td class="detail" width="20%">
		<?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>
	<td class="end" width="5%" nowrap="nowrap">
		<?php echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</td>
	<?php endif; ?>
</tr>
</thead>
<?php endif; ?>
<?php foreach ($this->items as $item) : ?>
<tr class="row<?php echo ($item->odd +1 );?>" >
	<td class="begin">
		<?php echo $this->pagination->getRowOffset( $item->count ); ?>
	</td>
	<?php if ($this->params->get('show_title')) : ?>
	<?php if ($item->access <= $this->user->get('aid', 0)) : ?>
	<td class="title edit">
		<a href="<?php echo $item->link; ?>">
			<?php echo $item->title; ?></a>
			<?php $this->item = $item; echo JHTML::_('icon.edit', $item, $this->params, $this->access) ?>
	</td>
	<?php else : ?>
	<td class="title">
		<?php
			echo $this->escape($item->title).' : ';
			$link = JRoute::_('index.php?option=com_user&view=login');
			$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid));
			$fullURL = new JURI($link);
			$fullURL->setVar('return', base64_encode($returnURL));
			$link = $fullURL->toString();
		?>
		<a href="<?php echo $link; ?>">
			<?php echo JText::_( 'Register to read more...' ); ?></a>
	</td>
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->params->get('show_date')) : ?>
	<td class="detail date">
		<?php echo $item->created; ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_author')) : ?>
	<td class="detail author">
		<?php echo $item->created_by_alias ? $item->created_by_alias : $item->author; ?>
	</td>
	<?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>
	<td class="end">
		<?php echo $item->hits ? $item->hits : '-'; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
<?php if ($this->params->get('show_pagination')) : ?>
<footer class="pagination">
	<p class="nav">
			<?php echo $this->pagination->getPagesLinks(); ?>
	</p>
	<p class="count">
			<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
</footer>
<?php endif; ?>

<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<?php echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="0" />
</form>
