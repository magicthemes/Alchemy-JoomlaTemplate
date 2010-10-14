<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<section id="newsfeeds-categories" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<?php if ( ($this->params->get('image') != -1) || $this->params->get('show_comp_description') ) : ?>
	<details class="description">
		<?php if ($this->params->get('image') != -1): ?>
			<div class="image <?php echo 'f'.substr($this->params->get('image_align'), 0, 1); ?>">
				<img src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->params->get('image'); ?>" hspace="6" alt="<?php echo JText::_('NEWS_FEEDS') ?>" />
			</div>
		<?php endif; ?>
		<?php echo $this->params->get('comp_description'); ?>
	</details>
<?php endif; ?>
	<ul>
	<?php foreach ( $this->categories as $category ) : ?>
		<li>
			<a href="<?php echo $category->link ?>"><?php echo $category->title;?></a>
			<?php if ( $this->params->get( 'show_cat_items' ) ) : ?>
			&nbsp;
			<span class="small">
				(<?php echo $category->numlinks;?>)
			</span>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_cat_description' ) && $category->description ) : ?>
			<br />
			<?php echo $category->description; ?>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul>
</section>
