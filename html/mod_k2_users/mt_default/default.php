<?php
/**
 * @version		$Id: default.php 501 2010-06-24 19:25:30Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2UsersBlock">

	<?php foreach($users as $key=>$user): ?>
	<article class="<?php echo ($key%2) ? "odd" : "even"; if(count($users)==$key+1) echo ' lastItem'; ?>">
	
		<?php if($userAvatar && !empty($user->avatar)): ?>
		<a class="k2Avatar ubUserAvatar" href="<?php echo $user->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>">
			<img src="<?php echo $user->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>" style="width:<?php echo $avatarWidth; ?>px;height:auto;" />
		</a>
		<?php endif; ?>

		<?php if($userName): ?>
		<a class="ubUserName" href="<?php echo $user->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>">
			<?php echo $user->name; ?>
		</a>
		<?php endif; ?>
								
		<?php if($userDescription && $user->description): ?>
		<div class="ubUserDescription">
			<?php if($userDescriptionWordLimit): ?>
			<?php echo K2HelperUtilities::wordLimit($user->description, $userDescriptionWordLimit) ?>
			<?php else: ?>
			<?php echo $user->description; ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
					
		<?php if($userFeed || ($userURL && $user->url) || $userEmail): ?>
		<div class="ubUserAdditionalInfo">
	
			<?php if($userFeed): ?>
			<!-- RSS feed icon -->
			<a class="ubUserFeedIcon" href="<?php echo $user->feed; ?>" title="<?php echo JText::_('Subscribe to this user\'s RSS feed'); ?>">
				<span><?php echo JText::_('Subscribe to this user\'s RSS feed'); ?></span>
			</a>
			<?php endif; ?>
	
			<?php if($userURL && $user->url): ?>
			<a class="ubUserURL" href="<?php echo $user->url; ?>" title="<?php echo JText::_("Website"); ?>" target="_blank" rel="nofollow">
				<span><?php echo JText::_("Website"); ?></span>
			</a>
			<?php endif; ?>

			<?php if($userEmail): ?>
			<span class="ubUserEmail" title="<?php echo JText::_("E-mail"); ?>">
				<?php echo JHTML::_('Email.cloak', $user->email); ?>
			</span>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if($userItemCount && count($user->items)): ?>
		<h3><?php echo JText::_("Recent items"); ?></h3>
		<ul class="ubUserItems">
			<?php foreach ($user->items as $item): ?>
			<li>
				<a href="<?php echo $item->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>">
					<?php echo $item->title; ?>
				</a>
			</li>
			<?php endforeach ; ?>
		</ul>
		<?php endif; ?>
	
		<div class="clr"></div>
	</article>
	<?php endforeach; ?>
</div>
