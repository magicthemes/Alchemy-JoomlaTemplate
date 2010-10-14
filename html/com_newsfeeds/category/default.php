<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<section id="newsfeed-category" class="<?php echo $this->params->get('pageclass_sfx', 'default')?>">

<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<?php if ( ! empty($this->category->image) || @$this->category->description): ?>
	<details class="description">
		<?php if ( ! empty($this->category->image)): ?>
			<div class="image <?php echo 'f'.substr($this->category->image_position, 0, 1); ?>">
				<img src="<?php echo $this->baseurl.'/'. 'images/stories' . '/'. $this->category->image; ?>" hspace="6" alt="<?php echo JText::_('NEWS_FEEDS') ?>" />
			</div>
		<?php endif; ?>
		<?php echo $this->category->description; ?>
	</details>
<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>

</section>
