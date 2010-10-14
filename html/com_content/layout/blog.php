<?php
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
?>
<section id="content-layout-blog">
<?php if ($this->params->get('show_page_title')) : ?>
<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

<?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) :?>
<details class="description">
	<?php if ($this->params->get('show_description_image') && $this->section->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->section->image;?>" align="<?php echo $this->section->image_position;?>" hspace="6" alt="" />
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->section->description) : ?>
		<?php echo $this->section->description; ?>
	<?php endif; ?>
</details>
<?php endif; ?>

	<?php 
		if ($this->params->def('num_leading_articles', 1))
		{
			for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++)
			{
				if ($i >= $this->total)
					break;
				echo '<div class="content_list">'."\n";
				$this->item =& $this->getItem($i, $this->params);
				echo $this->loadTemplate('item');
				echo '</div>'."\n\n";
			}
		} else
			$i = $this->pagination->limitstart;

		$startIntroArticles = $this->pagination->limitstart + $this->params->get('num_leading_articles');
		$endIntroArticles = $startIntroArticles + $this->params->get('num_intro_articles', 4);
		for( $z = $startIntroArticles; $z < $endIntroArticles; $z++ )
		{
			if ($i >= $this->total)
				break;
			((($z - $startIntroArticles) % $this->params->get('num_columns', 2))==0)?$divider="":$divider=" column_separator";
			((($z - $startIntroArticles) % $this->params->get('num_columns', 2))==0)?$clear="clear: left;":$clear="";
			echo "<div style=\"width:";
			echo intval(100 / $this->params->get('num_columns')) - 1 . "%;margin-left:1%$clear";
			echo "\" class=\"content_column $divider\">\n";
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
			$i++;
			echo "</div>\n";
			
		}
	?>
	<?php if ($this->params->def('num_links', 4) && ($i < $this->total)) : ?>
		<?php
			$this->links = array_splice($this->items, $i - $this->pagination->limitstart);
			echo $this->loadTemplate('links');
		?>
	<?php endif; ?>
	
	<footer class="pagination">
	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
		<p class="nav">
				<?php echo $this->pagination->getPagesLinks(); ?>
		</p>
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
		<p class="count">
				<?php echo $this->pagination->getPagesCounter(); ?>
		</p>
		<?php endif; ?>
	<?php endif; ?>
	</footer>
</section>