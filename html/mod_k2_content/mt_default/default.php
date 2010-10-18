<?php
/**
 * @version		$Id: default.php 502 2010-06-24 20:33:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>

		<?php foreach ($items as $key=>$item):	?>
		<article class="<?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">

			<!-- Plugins: BeforeDisplay -->
			<?php echo $item->event->BeforeDisplay; ?>

			<!-- K2 Plugins: K2BeforeDisplay -->
			<?php echo $item->event->K2BeforeDisplay; ?>

			<header class="moduleItemHeader">
				<?php if($params->get('itemAuthorAvatar')): ?>
				<a class="k2Avatar moduleItemAuthorAvatar" href="<?php echo $item->authorLink; ?>">
					<img src="<?php echo $item->authorAvatar; ?>" alt="<?php echo $item->author; ?>" style="width:<?php echo $avatarWidth; ?>px;height:auto;" />
				</a>
				<?php endif; ?>

				<?php if($params->get('itemTitle')): ?>
				<h1 class="moduleItemTitle"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h1>
				<?php endif; ?>

				<?php if($params->get('itemAuthor')): ?>
				<div class="moduleItemAuthor">
					<?php echo K2HelperUtilities::writtenBy($item->authorGender); ?>

					<?php if(isset($item->authorLink)): ?>
						<a href="<?php echo $item->authorLink; ?>"><?php echo $item->author; ?></a>
					<?php else: ?>
						<?php echo $item->author; ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</header>

			<!-- Plugins: AfterDisplayTitle -->
			<?php echo $item->event->AfterDisplayTitle; ?>

			<!-- K2 Plugins: K2AfterDisplayTitle -->
			<?php echo $item->event->K2AfterDisplayTitle; ?>

			<!-- Plugins: BeforeDisplayContent -->
			<?php echo $item->event->BeforeDisplayContent; ?>

			<!-- K2 Plugins: K2BeforeDisplayContent -->
			<?php echo $item->event->K2BeforeDisplayContent; ?>

			<?php if($params->get('itemImage') || $params->get('itemIntroText')): ?>
			<div class="moduleItemIntrotext">
				<?php if($params->get('itemImage') && isset($item->image)): ?>
					<a class="moduleItemImage" href="<?php echo $item->link; ?>" title="<?php echo JText::_('Continue reading'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
						<img src="<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>"/>
					</a>
				<?php endif; ?>

				<?php if($params->get('itemIntroText')): ?>
					<?php echo $item->introtext; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if($params->get('itemExtraFields') && count($item->extra_fields)): ?>
			<div class="moduleItemExtraFields">
			      <strong><?php echo JText::_('Additional Info'); ?></strong>
			      <ul>
				<?php foreach ($item->extra_fields as $extraField): ?>
							<li class="type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
								<span class="moduleItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
								<span class="moduleItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
								<div class="clr"></div>
							</li>
				<?php endforeach; ?>
			      </ul>
			</div>
			<?php endif; ?>

			<div class="clr"></div>

			<?php if($params->get('itemVideo') AND $item->video): ?>
			<div class="moduleItemVideo">
				<?php echo $item->video ;?>
				<span class="moduleItemVideoCaption"><?php echo $item->video_caption ;?></span>
				<span class="moduleItemVideoCredits"><?php echo $item->video_credits ;?></span>
			</div>
			<?php endif; ?>

			<div class="clr"></div>

			<!-- Plugins: AfterDisplayContent -->
			<?php echo $item->event->AfterDisplayContent; ?>

			<!-- K2 Plugins: K2AfterDisplayContent -->
			<?php echo $item->event->K2AfterDisplayContent; ?>

			<?php if($params->get('itemDateCreated')): ?>
			<time class="moduleItemDateCreated"><?php echo JText::_('Written on') ;?> <?php echo JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC2')); ?></time>
			<?php endif; ?>

			<?php if($params->get('itemCategory')): ?>
			<?php echo JText::_('in') ;?> <a class="moduleItemCategory" href="<?php echo $item->categoryLink; ?>"><?php echo $item->categoryname; ?></a>
			<?php endif; ?>

			<?php if($params->get('itemTags') && count($item->tags)>0): ?>
			<div class="moduleItemTags">
				<strong><?php echo JText::_('Tags'); ?>:</strong>
				<?php foreach ($item->tags as $tag): ?>
					<a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if($params->get('itemAttachments') && count($item->attachments)): ?>
					<div class="moduleAttachments">
						<?php foreach ($item->attachments as $attachment): ?>
						<a title="<?php echo $attachment->titleAttribute; ?>" href="<?php echo JRoute::_('index.php?option=com_k2&view=item&task=download&id='.$attachment->id); ?>"><?php echo $attachment->title ; ?></a>
						<?php endforeach;?>
					</div>
			<?php endif; ?>

			<?php if($params->get('itemCommentsCounter') && $componentParams->get('comments')): ?>		
				<?php if(!empty($item->event->K2CommentsCounter)):?>
					<!-- K2 Plugins: K2CommentsCounter -->
					<?php echo $item->event->K2CommentsCounter; ?>
				<?php else:?>
					<?php if($item->numOfComments>0): ?>
					<a class="moduleItemComments" href="<?php echo $item->link.'#itemCommentsAnchor'; ?>">
						<?php echo $item->numOfComments; ?> <?php if($item->numOfComments>1) echo JText::_('comments'); else echo JText::_('comment'); ?>
					</a>
					<?php else: ?>
					<a class="moduleItemComments" href="<?php echo $item->link.'#itemCommentsAnchor'; ?>">
						<?php echo JText::_('Be the first to comment!'); ?>
					</a>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>

			<?php if($params->get('itemHits')): ?>
			<span class="moduleItemHits">
				<?php echo JText::_('Read'); ?> <?php echo $item->hits; ?> <?php echo JText::_('times'); ?>
			</span>
			<?php endif; ?>

			<?php if($params->get('itemReadMore')): ?>
			<a class="moduleItemReadMore" href="<?php echo $item->link; ?>">
				<?php echo JText::_('Read more...'); ?>
			</a>
			<?php endif; ?>

			<!-- Plugins: AfterDisplay -->
			<?php echo $item->event->AfterDisplay; ?>

			<!-- K2 Plugins: K2AfterDisplay -->
			<?php echo $item->event->K2AfterDisplay; ?>

		</article>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if($params->get('itemCustomLink')): ?>
	<a class="moduleCustomLink" href="<?php echo $params->get('itemCustomLinkURL'); ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>">
		<?php echo $itemCustomLinkTitle; ?>
	</a>
	<?php endif; ?>

	<?php if($params->get('feed')): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&format=feed&moduleID='.$module->id);?>" title="<?php echo JText::_('Subscribe to this RSS feed'); ?>">
			<span><?php echo JText::_('Subscribe to this RSS feed'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

</div>
