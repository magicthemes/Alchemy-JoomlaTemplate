<?php
/**
 * @version		$Id: category_item.php 493 2010-06-17 14:58:58Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->item->params);

?>

<!-- Start K2 Item Layout -->
<article class="itemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?>">

	<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

	<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>

	<?php if(isset($this->item->editLink)): ?>
	<!-- Item edit link -->
	<span class="itemEditLink">
		<a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $this->item->editLink; ?>">
			<?php echo JText::_('Edit item'); ?>
		</a>
	</span>
	<?php endif; ?>

	<header class="itemHeader">
		<?php if($this->item->params->get('catItemDateCreated')): ?>
		<!-- Date created -->
		<time class="itemDateCreated">
			<?php echo JHTML::_('date', $this->item->created , JText::_('DATE_FORMAT_LC2')); ?>
		</time>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemTitle')): ?>
		<!-- Item title -->
		<h1 class="itemTitle">
			<?php if ($this->item->params->get('catItemTitleLinked')): ?>
				<a href="<?php echo $this->item->link; ?>">
				<?php echo $this->item->title; ?>
				</a>
			<?php else: ?>
				<?php echo $this->item->title; ?>
			<?php endif; ?>

			<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
				<!-- Featured flag -->
				<span><sup><?php echo JText::_('Featured'); ?></sup></span>
			<?php endif; ?>
		</h1>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemAuthor')): ?>
		<!-- Item Author -->
		<p class="itemAuthor">
			<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?> <a href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
		</p>
		<?php endif; ?>
	</header>

	<!-- Plugins: AfterDisplayTitle -->
	<?php echo $this->item->event->AfterDisplayTitle; ?>

	<!-- K2 Plugins: K2AfterDisplayTitle -->
	<?php echo $this->item->event->K2AfterDisplayTitle; ?>

	<?php if($this->item->params->get('catItemRating')): ?>
	<!-- Item Rating -->
	<section class="itemRatingBlock">
		<span><?php echo JText::_('Rate this item'); ?></span>
		<div class="itemRatingForm">
			<ul class="itemRatingList">
				<li class="itemCurrentRating" id="itemCurrentRating<?php echo $this->item->id; ?>" style="width:<?php echo $this->item->votingPercentage; ?>%;"></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('1 star out of 5'); ?>" class="one-star">1</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('2 stars out of 5'); ?>" class="two-stars">2</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('3 stars out of 5'); ?>" class="three-stars">3</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('4 stars out of 5'); ?>" class="four-stars">4</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('5 stars out of 5'); ?>" class="five-stars">5</a></li>
			</ul>
			<div id="itemRatingLog<?php echo $this->item->id; ?>" class="itemRatingLog"><?php echo $this->item->numOfvotes; ?></div>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
	</section>
	<?php endif; ?>

	<div class="itemBody">
		<!-- Plugins: BeforeDisplayContent -->
		<?php echo $this->item->event->BeforeDisplayContent; ?>

		<!-- K2 Plugins: K2BeforeDisplayContent -->
		<?php echo $this->item->event->K2BeforeDisplayContent; ?>

		<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		<!-- Item Image -->
		<div class="itemImageBlock">
			<span class="itemImage">
				<a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo $this->item->image_caption; else echo $this->item->title; ?>">
				<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo $this->item->image_caption; else echo $this->item->title; ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
				</a>
			</span>
			<div class="clr"></div>
		</div>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemIntroText')): ?>
		<!-- Item introtext -->
		<div class="itemIntroText">
		<?php echo $this->item->introtext; ?>
		</div>
		<?php endif; ?>

		<div class="clr"></div>

		<?php if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)): ?>
		<!-- Item extra fields -->
		<div class="itemExtraFields">
			<h4><?php echo JText::_('Additional Info'); ?></h4>
			<ul>
				<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
				<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
					<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
					<span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="clr"></div>
		</div>
		<?php endif; ?>

		<!-- Plugins: AfterDisplayContent -->
		<?php echo $this->item->event->AfterDisplayContent; ?>

		<!-- K2 Plugins: K2AfterDisplayContent -->
		<?php echo $this->item->event->K2AfterDisplayContent; ?>

		<div class="clr"></div>
	</div>

	<?php if(
	$this->item->params->get('catItemHits') ||
	$this->item->params->get('catItemCategory') ||
	$this->item->params->get('catItemTags') ||
	$this->item->params->get('catItemAttachments')
	): ?>
	<section class="itemLinks">

		<?php if($this->item->params->get('catItemHits')): ?>
		<!-- Item Hits -->
		<div class="itemHitsBlock">
			<span class="itemHits">
				<?php echo JText::_('Read'); ?> <b><?php echo $this->item->hits; ?></b> <?php echo JText::_('times'); ?>
			</span>
		</div>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemCategory')): ?>
		<!-- Item category name -->
		<div class="itemCategory">
			<span><?php echo JText::_('Published in'); ?></span>
			<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
		</div>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
		<!-- Item tags -->
		<div class="itemTagsBlock">
			<span><?php echo JText::_("Tagged under"); ?></span>
				<ul class="catItemTags">
					<?php foreach ($this->item->tags as $tag): ?>
					<li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
					<?php endforeach; ?>
				</ul>
			<div class="clr"></div>
		</div>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemAttachments') && count($this->item->attachments)): ?>
		<!-- Item attachments -->
		<div class="itemAttachmentsBlock">
			<span><?php echo JText::_("Download attachments:"); ?></span>
			<ul class="catItemAttachments">
				<?php foreach ($this->item->attachments as $attachment): ?>
				<li>
					<a title="<?php echo htmlentities($attachment->titleAttribute, ENT_QUOTES, 'UTF-8'); ?>" href="<?php echo JRoute::_('index.php?option=com_k2&view=item&task=download&id='.$attachment->id); ?>">
					<?php echo $attachment->title ; ?>
					</a>
					<?php if($this->item->params->get('catItemAttachmentsCounter')): ?>
					<span>(<?php echo $attachment->hits; ?> <?php echo (count($attachment->hits)==1) ? JText::_("download") : JText::_("downloads"); ?>)</span>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<div class="clr"></div>
	</section>
	<?php endif; ?>

	<div class="clr"></div>

	<?php if($this->item->params->get('catItemVideo') && !empty($this->item->video)): ?>
	<!-- Item video -->
	<section class="itemVideoBlock">
		<h1><?php echo JText::_('Related Video'); ?></h1>
		<?php if($this->item->videoType=='embedded'): ?>
		<div class="itemVideoEmbedded">
			<?php echo $this->item->video; ?>
		</div>
		<?php else: ?>
		<span class="itemVideo"><?php echo $this->item->video; ?></span>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<?php if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
	<!-- Item image gallery -->
	<section class="itemImageGallery">
		<h1><?php echo JText::_('Image Gallery'); ?></h1>
		<?php echo $this->item->gallery; ?>
	</section>
	<?php endif; ?>

	<div class="clr"></div>

	<?php if($this->item->params->get('catItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
	<!-- Anchor link to comments below -->
	<div class="itemCommentsLink">
		<?php if(!empty($this->item->event->K2CommentsCounter)):?>
			<!-- K2 Plugins: K2CommentsCounter -->
			<?php echo $this->item->event->K2CommentsCounter; ?>
		<?php else: ?>
			<?php if($this->item->numOfComments > 0): ?>
			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('comments') : JText::_('comment'); ?>
			</a>
			<?php else: ?>
			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo JText::_('Be the first to comment!'); ?>
			</a>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if ($this->item->params->get('catItemReadMore')): ?>
	<!-- Item "read more..." link -->
	<div class="itemReadMore">
		<a class="k2ReadMore" href="<?php echo $this->item->link; ?>">
			<?php echo JText::_('Read more...'); ?>
		</a>
	</div>
	<?php endif; ?>

	<div class="clr"></div>

	<?php if($this->item->params->get('catItemDateModified')): ?>
	<!-- Item date modified -->
	<?php if($this->item->created != $this->item->modified): ?>
	<time class="itemDateModified">
		<?php echo JText::_('Last modified on'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2')); ?>
	</time>
	<?php endif; ?>
	<?php endif; ?>

	<!-- Plugins: AfterDisplay -->
	<?php echo $this->item->event->AfterDisplay; ?>

	<!-- K2 Plugins: K2AfterDisplay -->
	<?php echo $this->item->event->K2AfterDisplay; ?>

	<div class="clr"></div>
</article>
<!-- End K2 Item Layout -->
