<?php // no direct acces
defined('_JEXEC') or die('Restricted access'); ?>
<?php
		$lang = &JFactory::getLanguage();
		$myrtl =$this->newsfeed->rtl;
		 if ($lang->isRTL() && $myrtl==0){
		   $direction= "direction:rtl !important;";
		   $align= "text-align:right !important;";
		   }
		 else if ($lang->isRTL() && $myrtl==1){
		   $direction= "direction:ltr !important;";
		   $align= "text-align:left !important;";
		   }
		  else if ($lang->isRTL() && $myrtl==2){
		   $direction= "direction:rtl !important;";
		   $align= "text-align:right !important;";
		   }

		else if ($myrtl==0) {
		$direction= "direction:ltr !important;";
		   $align= "text-align:left !important;";
		   }
		else if ($myrtl==1) {
		$direction= "direction:ltr !important;";
		   $align= "text-align:left !important;";
		   }
		else if ($myrtl==2) {
		   $direction= "direction:rtl !important;";
		   $align= "text-align:right !important;";
		   }

?>
<section id="newsfeed-newsfeed" style="<?php echo $direction; ?><?php echo $align; ?>" class="<?php echo $this->params->get('pageclass_sfx', 'default');?>" >
<?php if ($this->params->get('show_page_title', 1)) : ?>
	<header style="<?php echo $direction; ?><?php echo $align; ?>"><h1><?php echo $this->escape($this->params->get('page_title')); ?></h1></header>
<?php endif; ?>
	<div class="newsfeed">
		<header style="<?php echo $direction; ?><?php echo $align; ?>">
			<h2><a href="<?php echo $this->newsfeed->channel['link']; ?>" target="_blank">
				<?php echo str_replace('&apos;', "'", $this->newsfeed->channel['title']); ?></a></h2>
		</header>
	
		<details class="description">
			<?php if ( $this->params->get( 'show_feed_description' ) ) : ?>
				<?php echo str_replace('&apos;', "'", $this->newsfeed->channel['description']); ?>
			<?php endif; ?>
			<?php if ( isset($this->newsfeed->image['url']) && isset($this->newsfeed->image['title']) && $this->params->get( 'show_feed_image' ) ) : ?>
				<img src="<?php echo $this->newsfeed->image['url']; ?>" alt="<?php echo $this->newsfeed->image['title']; ?>" />
			<?php endif; ?>
		</details>

		<dl>
		<?php foreach ( $this->newsfeed->items as $item ) :  ?>
			<?php if ( !is_null( $item->get_link() ) ) : ?>
				<dt class="newsfeed_title">
					<a href="<?php echo $item->get_link(); ?>" target="_blank">
						<?php echo $item->get_title(); ?></a>
				</dt>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_item_description' ) && $item->get_description()) : ?>
				<dd class="newsfeed_item">
				<?php $text = $this->limitText($item->get_description(), $this->params->get( 'feed_word_count' ));
					echo str_replace('&apos;', "'", $text);
				?>
				</dd>
			<?php endif; ?>
		<?php endforeach; ?>
		</dl>
	</div>
</section>
