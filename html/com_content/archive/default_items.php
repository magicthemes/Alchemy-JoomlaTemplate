<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php foreach ($this->items as $item) : ?>
<div class="row<?php echo ($item->odd +1 ); ?>">
	<article>
		<h1 class="title">
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug)); ?>">
			<?php echo $this->escape($item->title); ?></a>
		</h1>

		<details>
		<?php if (($this->params->get('show_section') && $item->sectionid) || ($this->params->get('show_category') && $item->catid)) : ?>
			<p class="category">
			<?php if ($this->params->get('show_section') && $item->sectionid && isset($item->section)) : ?>
				<span>
				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($item->sectionid)).'">'; ?>
				<?php endif; ?>

				<?php echo $item->section; ?>

				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>

				<?php if ($this->params->get('show_category')) : ?>
					<?php echo ' - '; ?>
				<?php endif; ?>
				</span>
			<?php endif; ?>
			<?php if ($this->params->get('show_category') && $item->catid) : ?>
				<span>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug, $item->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $item->category; ?>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
				</span>
			<?php endif; ?>
			</p>
		<?php endif; ?>

		<?php if ($this->params->get('show_create_date')) : ?>
			<time>
				<?php echo JText::_('Created') .': '.  JHTML::_( 'date', $item->created, JText::_('DATE_FORMAT_LC2')) ?>
			</time>
		<?php endif; ?>
		<?php if ($this->params->get('show_author')) : ?>
			<p class="created_by">
				<?php echo JText::_('Author').': '; echo $item->created_by_alias ? $item->created_by_alias : $item->author; ?>
			</p>
		<?php endif; ?>
		</details>
	
		<div class="content intro">
			<?php echo substr(strip_tags($item->introtext), 0, 255);  ?>...
		</div>
	
	</article>
</div>
<?php endforeach; ?>