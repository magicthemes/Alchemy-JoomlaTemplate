<?php defined('_JEXEC') or die('Restricted access'); ?>

<form id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">
	<fieldset>
		<label for="search_searchword">
			<?php echo JText::_( 'Search Keyword' ); ?>:
		</label>
		<input type="text" name="searchword" id="search_searchword" size="30" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="inputbox" />
		<button name="Search" onclick="this.form.submit()" class="button"><?php echo JText::_( 'Search' );?></button>
	</fieldset>
	<fieldset>
		<?php echo $this->lists['searchphrase']; ?>
	</fieldset>
	<label for="ordering">
		<?php echo JText::_( 'Ordering' );?>:
		<?php echo $this->lists['ordering'];?>
	</label>
	<?php if ($this->params->get( 'search_areas', 1 )) : ?>
		<fieldset>
		<?php echo JText::_( 'Search Only' );?>:
		<?php foreach ($this->searchareas['search'] as $val => $txt) :
			$checked = is_array( $this->searchareas['active'] ) && in_array( $val, $this->searchareas['active'] ) ? 'checked="checked"' : '';
		?>
		<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area_<?php echo $val;?>" <?php echo $checked;?> />
			<label for="area_<?php echo $val;?>">
				<?php echo JText::_($txt); ?>
			</label>
		<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>

	<p>
			<?php echo JText::_( 'Search Keyword' ) .' <strong>'. $this->escape($this->searchword) .'</strong>'; ?>
			<?php echo $this->result; ?>
	</p>
<?php if($this->total > 0) : ?>
	<div class="paginator">
		<label class="limit" for="limit">
			<?php echo JText::_( 'Display Num' ); ?>
			<?php echo $this->pagination->getLimitBox( ); ?>
		</label>
		<span class="page_count"><?php echo $this->pagination->getPagesCounter(); ?></span>
	</div>
<?php endif; ?>

<input type="hidden" name="task"   value="search" />
</form>
