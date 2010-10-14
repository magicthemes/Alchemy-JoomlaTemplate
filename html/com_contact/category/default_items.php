<?php
/** $Id: default_items.php 10381 2008-06-01 03:35:53Z pasamio $ */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php foreach($this->items as $item) : ?>
<tr class="row<?php echo $item->odd + 1; ?>">
	<td class="begin" width="5%">
		<?php echo $item->count +1; ?>
	</td>
	<td class="title">
		<a href="<?php echo $item->link; ?>" class="category">
			<?php echo $item->name; ?></a>
	</td>
	<?php if ( $this->params->get( 'show_position' ) ) : ?>
	<td class="detail">
		<?php echo $item->con_position; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_email' ) ) : ?>
	<td class="detail">
		<?php echo $item->email_to; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_telephone' ) ) : ?>
	<td class="detail">
		<?php echo $item->telephone; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_mobile' ) ) : ?>
	<td class="detail">
		<?php echo $item->mobile; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_fax' ) ) : ?>
	<td class="end">
		<?php echo $item->fax; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
