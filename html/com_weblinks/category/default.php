<?php defined('_JEXEC') or die('Restricted access'); ?>

<section id="weblinks-category" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<?php if ( @$this->category->image || @$this->category->description ) : ?>
	<details class="description">
	<?php
		if ( isset($this->category->image) ) :  echo $this->category->image; endif;
		echo $this->category->description;
	?>
	</details>
<?php endif; ?>
	<?php echo $this->loadTemplate('items'); ?>
<?php if ($this->params->get('show_other_cats', 1)): ?>
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
<?php endif; ?>
</section>
