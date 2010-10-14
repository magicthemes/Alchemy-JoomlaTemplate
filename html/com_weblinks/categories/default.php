<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<section id="weblinks-categories" class="<?php echo $this->params->get('pageclass_sfx', 'default');?>">
	<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
		<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
	<?php endif; ?>

	<?php if ( ($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1) ) : ?>
		<details class="description">
			<?php if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
				<div class="image <?php echo 'f'.substr($this->params->get('image_align'), 0, 1); ?>">
					<img src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->params->get('image'); ?>" hspace="6" alt="<?php echo JText::_( 'Web Links' ); ?>" />
				</div>
			<?php endif; ?>

			<?php echo $this->params->get('comp_description');?>
		</details>
	<?php endif; ?>
	<ul>
	<?php foreach ( $this->categories as $category ) : ?>
		<li>
			<a href="<?php echo $category->link; ?>">
				<?php echo $this->escape($category->title);?></a>
			&nbsp;
			<span class="small">
				(<?php echo $category->numlinks;?>)
			</span>
		</li>
	<?php endforeach; ?>
	</ul>
</section>
