<?php
/**
 * @version		$Id: commenters.php 501 2010-06-24 19:25:30Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2TopCommentersBlock <?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if(count($commenters)): ?>
		<?php foreach ($commenters as $key=>$commenter): ?>
		<article class="<?php echo ($key%2) ? "odd" : "even"; if(count($commenters)==$key+1) echo ' lastItem'; ?>">

			<?php if($commenter->userImage): ?>
			<a class="k2Avatar tcAvatar" href="<?php echo $commenter->link; ?>">
				<img src="<?php echo $commenter->userImage; ?>" alt="<?php echo $commenter->userName; ?>" style="width:<?php echo $tcAvatarWidth; ?>px;height:auto;" />
			</a>
			<?php endif; ?>

			<?php if($params->get('commenterLink')): ?>
			<a class="tcLink" href="<?php echo $commenter->link; ?>">
			<?php endif; ?>

			<span class="tcUsername"><?php echo $commenter->userName; ?></span>
			
			<?php if($params->get('commenterCommentsCounter')): ?>
			<span class="tcCommentsCounter">(<?php echo $commenter->counter; ?>)</span>
			<?php endif; ?>
			
			<?php if($params->get('commenterLink')): ?>
			</a>
			<?php endif; ?>
						
			<?php if($params->get('commenterLatestComment')): ?>
			<a class="tcLatestComment" href="<?php echo $commenter->latestCommentLink;?>">
				<?php echo $commenter->latestCommentText; ?>
			</a>
			<time class="tcLatestCommentDate" datetime="<?php echo JHTML::_('date', $commenter->latestCommentDate, JText::_('DATE_FORMAT_JS1')) ?>"><?php echo JText::_('posted on'); ?> <?php echo JHTML::_('date', $commenter->latestCommentDate, JText::_('DATE_FORMAT_LC2')); ?></time>
			<?php endif; ?>
			
			<div class="clr"></div>
		</article>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
