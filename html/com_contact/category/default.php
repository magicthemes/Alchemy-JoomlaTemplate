<?php
/**
 * $Id: default.php 10967 2008-09-26 00:01:51Z ian $
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

$cparams =& JComponentHelper::getParams('com_media');
?>

<section id="contact-category" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<?php if ($this->category->image || $this->category->description) : ?>
	<details class="description">
	<?php if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
		<div class="image <?php echo 'f'.substr($this->params->get('image_align'), 0, 1); ?>">
			<img src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->params->get('image'); ?>" hspace="6" alt="<?php echo JText::_( 'Contacts' ); ?>" />
		</div>
	<?php elseif ($this->category->image) : ?>
		<div class="image <?php echo 'f'.substr($this->params->get('image_align'), 0, 1); ?>">
			<img src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->category->image; ?>" hspace="6" alt="<?php echo JText::_( 'Contacts' ); ?>" />
		</div>
	<?php endif; ?>
	<?php echo $this->category->description; ?>
	</details>
<?php endif; ?>
	<script language="javascript" type="text/javascript">
		function tableOrdering( order, dir, task ) {
		var form = document.adminForm;

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		document.adminForm.submit( task );
	}
	</script>
	<form action="<?php echo $this->action; ?>" method="post" name="adminForm">
	<section class="paginator">
	<?php if ($this->params->get('show_limit')) : ?>
		<label class="limit">
		<?php 
			echo JText::_('Display Num') .'&nbsp;';
			echo $this->pagination->getLimitBox();
		?>
		</label>
	<?php endif; ?>
	</section>
	<table class="listtable">
		<?php if ($this->params->get( 'show_headings' )) : ?>
		<thead>
			<tr>
				<td class="begin" width="5%">
					<?php echo JText::_('Num'); ?>
				</td>
				<td class="title">
					<?php echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				</td>
				<?php if ( $this->params->get( 'show_position' ) ) : ?>
				<td class="detail">
					<?php echo JHTML::_('grid.sort',  'Position', 'cd.con_position', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				</td>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_email' ) ) : ?>
				<td class="detail">
					<?php echo JText::_( 'Email' ); ?>
				</td>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_telephone' ) ) : ?>
				<td class="detail">
					<?php echo JText::_( 'Phone' ); ?>
				</td>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_mobile' ) ) : ?>
				<td class="detail">
					<?php echo JText::_( 'Mobile' ); ?>
				</td>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_fax' ) ) : ?>
				<td class="end">
					<?php echo JText::_( 'Fax' ); ?>
				</td>
				<?php endif; ?>
			</tr>
		</thead>
		<?php endif; ?>
		<tbody>
			<?php echo $this->loadTemplate('items'); ?>
		</tbody>
	</table>

	<footer class="pagination">
		<p class="page_nav"><?php echo $this->pagination->getPagesLinks(); ?></p>
		<p class="page_count"><?php echo $this->pagination->getPagesCounter(); ?></p>
	</footer>

	<input type="hidden" name="option" value="com_contact" />
	<input type="hidden" name="catid" value="<?php echo $this->category->id;?>" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
	</form>
</section>
