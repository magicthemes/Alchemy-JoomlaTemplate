<?php defined('_JEXEC') or die('Restricted access'); ?>

<dl class="searchresults">
	<?php
	foreach( $this->results as $result ) : ?>
			<dt>
				<span class="searchindex">
					<?php echo $this->pagination->limitstart + $result->count.'. ';?>
				</span>
				<?php if ( $result->href ) :
					if ($result->browsernav == 1 ) : ?>
						<a href="<?php echo JRoute::_($result->href); ?>" target="_blank" class="searchlink">
					<?php else : ?>
						<a href="<?php echo JRoute::_($result->href); ?>" class="searchlink">
					<?php endif;

					echo $this->escape($result->title)."</a>";

					if ( $result->section ) : ?>
						<span class="searchsection">
							(<?php echo $this->escape($result->section); ?>)
						</span>
					<?php endif; ?>
				<?php endif; ?>
			</dt>
			<dd>
				<?php echo $result->text; ?>
			<?php if ( $this->params->get( 'show_date' )) : ?>
				<time class="create_date" datetime="<?php echo JHTML::_('date', $result->created, JText::_('DATE_FORMAT_JS1')) ?>">
					<?php echo $result->created; ?>
				</time>
			<?php endif; ?>
			</dd>
	<?php endforeach; ?>
</dl>
<footer class="pagination">
	<p class="page_nav">
			<?php echo $this->pagination->getPagesLinks(); ?>
	</p>
</footer>
