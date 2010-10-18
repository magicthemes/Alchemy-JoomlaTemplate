<?php
/**
 * @version		$Id: user.php 502 2010-06-24 20:33:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Get user stuff (do not change)
$user = &JFactory::getUser();

?>

<!-- Start K2 User Layout -->

<section id="k2Container" class="userView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title') && $this->params->get('page_title')!=$this->user->name): ?>
	<!-- Page title -->
	<h1>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
	<?php endif; ?>

	<?php if($this->params->get('userFeed')): ?>
	<!-- RSS feed icon -->
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('Subscribe to this RSS feed'); ?>">
			<span><?php echo JText::_('Subscribe to this RSS feed'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<?php if ($this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
	<aside class="userBlock">
	
		<?php if(isset($this->addLink) && JRequest::getInt('id')==$user->id): ?>
		<!-- Item add link -->
		<span class="userItemAddLink">
			<a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $this->addLink; ?>">
				<?php echo JText::_('Post a new item'); ?>
			</a>
		</span>
		<?php endif; ?>
	
		<?php if ($this->params->get('userImage') && !empty($this->user->avatar)): ?>
		<img src="<?php echo $this->user->avatar; ?>" alt="<?php echo $this->user->name; ?>" style="width:<?php echo $this->params->get('userImageWidth'); ?>px; height:auto;" class="userImage" />
		<?php endif; ?>
		
		<?php if ($this->params->get('userName')): ?>
		<h2><?php echo $this->user->name; ?></h2>
		<?php endif; ?>
		
		<?php if ($this->params->get('userDescription') && isset($this->user->profile->description)): ?>
		<details class="userDescription"><?php echo $this->user->profile->description; ?></details>
		<?php endif; ?>
		
		<?php if ($this->params->get('userURL') || $this->params->get('userEmail')): ?>
		<p class="userAdditionalInfo">
			<?php if ($this->params->get('userURL') && isset($this->user->profile->url)): ?>
			<span class="userURL">
				<?php echo JText::_("Website URL"); ?>: <a href="<?php echo $this->user->profile->url; ?>" target="_blank" rel="nofollow"><?php echo $this->user->profile->url; ?></a>
			</span>
			<?php endif; ?>

			<?php if ($this->params->get('userEmail')): ?>
			<span class="userEmail">
				<?php echo JText::_("E-mail"); ?>: <?php echo JHTML::_('Email.cloak', $this->user->email); ?>
			</span>
			<?php endif; ?>	
		</p>
		<?php endif; ?>

		<div class="clr"></div>
		
		<?php echo $this->user->event->K2UserDisplay; ?>
		
		<div class="clr"></div>
	</aside>
	<?php endif; ?>



	<?php if(count($this->items)): ?>
	<!-- Item list -->
	<div class="itemList">
		<?php foreach ($this->items as $item): ?>
		
		<!-- Start K2 Item Layout -->
		<article class="itemView<?php if(!$item->published) echo ' userItemViewUnpublished'; ?><?php echo ($item->featured) ? ' itemIsFeatured' : ''; ?>">
		
			<!-- Plugins: BeforeDisplay -->
			<?php echo $item->event->BeforeDisplay; ?>
			
			<!-- K2 Plugins: K2BeforeDisplay -->
			<?php echo $item->event->K2BeforeDisplay; ?>
		
			<?php if(isset($item->editLink)): ?>
			<!-- Item edit link -->
			<span class="itemEditLink">
				<a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $item->editLink; ?>">
					<?php echo JText::_('Edit item'); ?>
				</a>
			</span>
			<?php endif; ?>
		
			<header class="itemHeader">
				<?php if($item->params->get('userItemDateCreated')): ?>
				<!-- Date created -->
				<time class="itemDateCreated">
					<?php echo JHTML::_('date', $item->created , JText::_('DATE_FORMAT_LC2')); ?>
				</time>
				<?php endif; ?>
			
				<?php if($item->params->get('userItemTitle')): ?>
				<!-- Item title -->
				<h1 class="itemTitle">
					<?php if ($item->params->get('userItemTitleLinked') && $item->published): ?>
						<a href="<?php echo $item->link; ?>">
						<?php echo $item->title; ?>
						</a>
					<?php else: ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
					<?php if(!$item->published): ?>
						<span>
							<sup>
								<?php echo JText::_('Unpublished'); ?>
							</sup>
						</span>
					<?php endif; ?>
				</h1>
				<?php endif; ?>
			</header>
		
			<!-- Plugins: AfterDisplayTitle -->
			<?php echo $item->event->AfterDisplayTitle; ?>

			<!-- K2 Plugins: K2AfterDisplayTitle -->
			<?php echo $item->event->K2AfterDisplayTitle; ?>

			<div class="itemBody">

				<!-- Plugins: BeforeDisplayContent -->
				<?php echo $item->event->BeforeDisplayContent; ?>

				<!-- K2 Plugins: K2BeforeDisplayContent -->
				<?php echo $item->event->K2BeforeDisplayContent; ?>

				<?php if($item->params->get('userItemImage') && !empty($item->imageGeneric)): ?>
				<!-- Item Image -->
				<div class="itemImageBlock">
					<span class="itemImage">
						<a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>">
						<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
						</a>
					</span>
					<div class="clr"></div>
				</div>
				<?php endif; ?>

				<?php if($item->params->get('userItemIntroText')): ?>
				<!-- Item introtext -->
				<div class="itemIntroText">
					<?php echo $item->introtext; ?>
				</div>
				<?php endif; ?>

				<div class="clr"></div>

				<!-- Plugins: AfterDisplayContent -->
				<?php echo $item->event->AfterDisplayContent; ?>

				<!-- K2 Plugins: K2AfterDisplayContent -->
				<?php echo $item->event->K2AfterDisplayContent; ?>

				<div class="clr"></div>
			</div>
		
			<?php if($item->params->get('userItemCategory') || $item->params->get('userItemTags')): ?>
			<div class="itemLinks">

				<?php if($item->params->get('userItemCategory')): ?>
				<!-- Item category name -->
				<div class="itemCategory">
					<span><?php echo JText::_('Published in'); ?></span>
					<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
				</div>
				<?php endif; ?>
	
				  <?php if($item->params->get('userItemTags') && count($item->tags)): ?>
				  <!-- Item tags -->
				  <div class="itemTagsBlock">
					  <span><?php echo JText::_("Tagged under"); ?></span>
					  <ul class="itemTags">
						    <?php foreach ($item->tags as $tag): ?>
						    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
						    <?php endforeach; ?>
					  </ul>
					  <div class="clr"></div>
				  </div>
				  <?php endif; ?>

				<div class="clr"></div>
			</div>
			<?php endif; ?>  
		
			<div class="clr"></div>

			<?php if($item->params->get('userItemCommentsAnchor') && ( ($item->params->get('comments') == '2' && !$this->user->guest) || ($item->params->get('comments') == '1')) ): ?>
			<!-- Anchor link to comments below -->
			<div class="itemCommentsLink">
				<?php if(!empty($item->event->K2CommentsCounter)): ?>
					<!-- K2 Plugins: K2CommentsCounter -->
					<?php echo $item->event->K2CommentsCounter; ?>
				<?php else: ?>
					<?php if($item->numOfComments > 0): ?>
					<a href="<?php echo $item->link; ?>#itemCommentsAnchor">
						<?php echo $item->numOfComments; ?> <?php echo ($item->numOfComments>1) ? JText::_('comments') : JText::_('comment'); ?>
					</a>
					<?php else: ?>
					<a href="<?php echo $item->link; ?>#itemCommentsAnchor">
						<?php echo JText::_('Be the first to comment!'); ?>
					</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		  
			<?php if ($item->params->get('userItemReadMore')): ?>
			<!-- Item "read more..." link -->
			<div class="itemReadMore">
				<a class="k2ReadMore" href="<?php echo $item->link; ?>">
					<?php echo JText::_('Read more...'); ?>
				</a>
			</div>
			<?php endif; ?>
			
			<div class="clr"></div>

			<!-- Plugins: AfterDisplay -->
			<?php echo $item->event->AfterDisplay; ?>

			<!-- K2 Plugins: K2AfterDisplay -->
			<?php echo $item->event->K2AfterDisplay; ?>
			
			<div class="clr"></div>
		</article>
		<!-- End K2 Item Layout -->
		
		<?php endforeach; ?>
	</div>

	<!-- Pagination -->
	<?php if(count($this->pagination->getPagesLinks())): ?>
	<footer class="k2Pagination">
		<p class="page_nav"><?php echo $this->pagination->getPagesLinks(); ?></p>
		<p class="page_count"><?php echo $this->pagination->getPagesCounter(); ?></p>
	</footer>
	<?php endif; ?>
	
	<?php endif; ?>

</section>

<!-- End K2 User Layout -->
