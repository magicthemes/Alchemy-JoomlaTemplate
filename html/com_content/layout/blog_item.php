<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$canEdit	= ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own'));
?>
<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>

<article class="item">
	<?php if ($canEdit || $this->item->params->get('show_title') || $this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
	<header>
		<div class="buttons">
		<?php
			if ($this->item->params->get('show_pdf_icon')) echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access);
			if ( $this->item->params->get( 'show_print_icon' )) echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access);
			if ($this->item->params->get('show_email_icon')) echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access);
			if ($canEdit) echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access);
		?>
		</div>
		<?php if ($this->item->params->get('show_title')) : ?>
			<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
			<a href="<?php echo $this->item->readmore_link; ?>" class="title">
				<h1><?php echo $this->item->title; ?></h1></a>
			<?php else : ?>
				<h1><?php echo $this->escape($this->item->title); ?></h1>
			<?php endif; ?>
		<?php endif; ?>
	</header>
	<?php endif; ?>
	
	<?php  if (!$this->item->params->get('show_intro')) :
		echo $this->item->event->afterDisplayTitle;
	endif; ?>
	
	<?php echo $this->item->event->beforeDisplayContent; ?>
	<details>
	<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
	<p class="category">
		<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
		<span>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->item->section; ?>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
				<?php if ($this->item->params->get('show_category')) : ?>
				<?php echo ' - '; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
		<span>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->item->category; ?>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
	<p class="created_by">
		<?php JText::printf( 'Written by', ($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author) ); ?>
	</p>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_create_date')) : ?>
	<time class="created_date" datetime="<?php echo JHTML::_( 'date', $this->item->created, JText::_('DATE_FORMAT_JS1'));?>">
		<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?>
	</time>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
	<p class="urls">
		<a href="http://<?php echo $this->item->urls ; ?>" target="_blank">
			<?php echo $this->item->urls; ?></a>
	</p>
	<?php endif; ?>

	</details>

	<div class="content body">
		<aside class="toc">
			<?php if (isset ($this->item->toc)) : ?>
				<?php echo $this->item->toc; ?>
			<?php endif; ?>
		</aside>
	
		<?php echo $this->item->text; ?>
	</div>

	<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
	<p class="modified_date">
			<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</p>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<p class="readmore">
		<a href="<?php echo $this->item->readmore_link; ?>">
			<?php if ($this->item->readmore_register) :
				echo JText::_('Register to read more...');
			elseif ($readmore = $this->item->params->get('readmore')) :
				echo $readmore;
			else :
				echo JText::sprintf('Read more...');
			endif; ?></a>
	</p>
	<?php endif; ?>
</article>
<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>
<!-- 
<span class="article_separator">&nbsp;</span>
 -->
<?php echo $this->item->event->afterDisplayContent; ?>