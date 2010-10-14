<?php
defined('_JEXEC') or die('Restricted access');

/*
 * html5nav (nav and header tags)
 */
function modChrome_nav($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<nav class="<?php echo strlen($params->get('moduleclass_sfx')) ? 'sidebar '.$params->get('moduleclass_sfx') : 'sidebar';?>">
		<?php if ($module->showtitle != 0) : ?>
			<h1><?php echo $module->title; ?></h1>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</nav>
	<?php endif;
}
/*
 * html5sect (section and header tags)
 */
function modChrome_section($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<section class="<?php echo strlen($params->get('moduleclass_sfx')) ? 'sidebar '.$params->get('moduleclass_sfx') : 'sidebar';?>">
		<?php if ($module->showtitle != 0) : ?>
			<h1><?php echo $module->title; ?></h1>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</section>
	<?php endif;
}
/*
 * html5art (article and header tags)
 */
function modChrome_article($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<article class="<?php echo strlen($params->get('moduleclass_sfx')) ? 'sidebar '.$params->get('moduleclass_sfx') : 'sidebar';?>">
		<?php if ($module->showtitle != 0) : ?>
			<h1><?php echo $module->title; ?></h1>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</article>
	<?php endif;
}
?>
