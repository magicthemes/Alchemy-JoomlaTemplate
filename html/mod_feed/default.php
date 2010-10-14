<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="newsfeed" style="direction: <?php echo $rssrtl ? 'rtl' :'ltr'; ?>; text-align: <?php echo $rssrtl ? 'right' :'left'; ?> ! important">
<?php if( $feed != false ) : ?>
	<?php
	//image handling
	$iUrl 	= isset($feed->image->url)   ? $feed->image->url   : null;
	$iTitle = isset($feed->image->title) ? $feed->image->title : null;
	?>
	
	<?php if (!is_null( $feed->title ) && $params->get('rsstitle', 1)) : ?>
		<h2><a href="<?php echo str_replace( '&', '&amp', $feed->link ); ?>" target="_blank"><?php echo $feed->title; ?></a></h2>
	<?php endif; ?>
	<?php if ($params->get('rssdesc', 1)) : ?>
		<details class="description">
			<?php echo $feed->description; ?>
		</details>
	<?php endif; ?>
	<?php if ($params->get('rssimage', 1) && $iUrl): ?>
		<img src="<?php echo $iUrl; ?>" alt="<?php echo @$iTitle; ?>"/>
	<?php endif; ?>
	<?php
	$actualItems = count( $feed->items );
	$setItems    = $params->get('rssitems', 5);

	if ($setItems > $actualItems) {
		$totalItems = $actualItems;
	} else {
		$totalItems = $setItems;
	}
	?>
	<dl>
	<?php
	$words = $params->def('word_count', 0);
	for ($j = 0; $j < $totalItems; $j ++)
	{
		$currItem = & $feed->items[$j];
		// item title
		?>

		<?php if ( !is_null( $currItem->get_link() ) ) : ?>
			<dt class="newsfeed_title">
				<a href="<?php echo $currItem->get_link(); ?>" target="_blank"><?php echo $currItem->get_title(); ?></a>
			</dt>
		<?php endif; ?>
		<?php
		// item description
		if ($params->get('rssitemdesc', 1))
		{
			// item description
			$text = $currItem->get_description();
			$text = str_replace('&apos;', "'", $text);

			// word limit check
			if ($words)
			{
				$texts = explode(' ', $text);
				$count = count($texts);
				if ($count > $words)
				{
					$text = '';
					for ($i = 0; $i < $words; $i ++) {
						$text .= ' '.$texts[$i];
					}
					$text .= '...';
				}
			}
			?>
			<dd class="newsfeed_item">
				<?php echo $text; ?>
			</dd>
			<?php
		} ?>

		<?php
	}
	?>
	</dl>
<?php endif; ?>
</div>

