<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$config =& JFactory::getConfig();
$publish_up =& JFactory::getDate($this->article->publish_up);
$publish_up->setOffset($config->getValue('config.offset'));
$publish_up = $publish_up->toFormat();

if (! isset($this->article->publish_down) || $this->article->publish_down == 'Never') {
	$publish_down = JText::_('Never');
} else {
	$publish_down =& JFactory::getDate($this->article->publish_down);
	$publish_down->setOffset($config->getValue('config.offset'));
	$publish_down = $publish_down->toFormat();
}
?>

<script language="javascript" type="text/javascript">
<!--
function setgood() {
	// TODO: Put setGood back
	return true;
}

var sectioncategories = new Array;
<?php
$i = 0;
foreach ($this->lists['sectioncategories'] as $k=>$items) {
	foreach ($items as $v) {
		echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->title )."' );\n\t\t";
	}
}
?>


function submitbutton(pressbutton) {
	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
	try {
		form.onsubmit();
	} catch(e) {
		alert(e);
	}

	// do field validation
	var text = <?php echo $this->editor->getContent( 'text' ); ?>
	if (form.title.value == '') {
		return alert ( "<?php echo JText::_( 'Article must have a title', true ); ?>" );
	} else if (text == '') {
		return alert ( "<?php echo JText::_( 'Article must have some text', true ); ?>");
	} else if (parseInt('<?php echo $this->article->sectionid;?>')) {
		// for articles
		if (form.catid && getSelectedValue('adminForm','catid') < 1) {
			return alert ( "<?php echo JText::_( 'Please select a category', true ); ?>" );
		}
	}
	<?php echo $this->editor->save( 'text' ); ?>
	submitform(pressbutton);
}
//-->
</script>
<section id="content-article-form" class="<?php echo $this->params->get('pageclass_sfx', 'default');?>">
<?php if ($this->params->get('show_page_title', 1)) : ?>
<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>
<form action="<?php echo $this->action ?>" method="post" name="adminForm" onSubmit="setgood();">
<fieldset class="pane edit">
	<legend><?php echo JText::_('Editor'); ?></legend>
	<fieldset class="title">
		<label for="title">
			<?php echo JText::_( 'Title' ); ?>:
		</label>
		<input class="inputbox" type="text" id="title" name="title" size="50" maxlength="100" value="<?php echo $this->escape($this->article->title); ?>" />
		<input class="inputbox" type="hidden" id="alias" name="alias" value="<?php echo $this->escape($this->article->alias); ?>" />
	</fieldset>
	<fieldset class="buttons">
		<button type="button" onclick="submitbutton('save')">
			<?php echo JText::_('Save') ?>
		</button>
		<button type="button" onclick="submitbutton('cancel')">
			<?php echo JText::_('Cancel') ?>
		</button>
	</fieldset>
	<?php
		echo $this->editor->display('text', $this->article->text, '45%', '400', '70', '15');
	?>
</fieldset>
<fieldset class="pane publishing">
	<legend><?php echo JText::_('Publishing'); ?></legend>
		<ul class="fields">
			<li>
				<label for="sectionid">
					<?php echo JText::_( 'Section' ); ?>:
				</label>
				<?php echo $this->lists['sectionid']; ?>
			</li>
			<li>
				<label for="catid">
					<?php echo JText::_( 'Category' ); ?>:
				</label>
				<?php echo $this->lists['catid']; ?>
			</li>
	<?php if ($this->user->authorize('com_content', 'publish', 'content', 'all')) : ?>
			<li>
				<label for="state">
					<?php echo JText::_( 'Published' ); ?>:
				</label>
				<?php echo $this->lists['state']; ?>
			</li>
	<?php endif; ?>
			<li>
				<label for="frontpage">
					<?php echo JText::_( 'Show on Front Page' ); ?>:
				</label>
				<?php echo $this->lists['frontpage']; ?>
			</li>
			<li>
				<label for="created_by_alias">
					<?php echo JText::_( 'Author Alias' ); ?>:
				</label>
				<input type="text" id="created_by_alias" name="created_by_alias" size="50" maxlength="100" value="<?php echo $this->article->created_by_alias; ?>" class="inputbox" />
			</li>
		</ul>
		<ul class="fields">
			<li>
				<label for="publish_up">
					<?php echo JText::_( 'Start Publishing' ); ?>:
				</label>
				<?php echo JHTML::_('calendar', $publish_up, 'publish_up', 'publish_up', '%Y-%m-%d %H:%M:%S', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19')); ?>
			</li>
			<li>
				<label for="publish_down">
					<?php echo JText::_( 'Finish Publishing' ); ?>:
				</label>
				<?php echo JHTML::_('calendar', $publish_down, 'publish_down', 'publish_down', '%Y-%m-%d %H:%M:%S', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19')); ?>
			</li>
			<li>
				<label for="access">
					<?php echo JText::_( 'Access Level' ); ?>:
				</label>
				<?php echo $this->lists['access']; ?>
			</li>
			<li>
				<label for="ordering">
					<?php echo JText::_( 'Ordering' ); ?>:
				</label>
				<?php echo $this->lists['ordering']; ?>
			</li>
		</ul>
</fieldset>

<fieldset class="pane meta">
	<legend><?php echo JText::_('Metadata'); ?></legend>
	<ul class="fields">
		<li>
			<label for="metadesc">
				<?php echo JText::_( 'Description' ); ?>:
			</label>
			<textarea rows="5" cols="50" class="inputbox" id="metadesc" name="metadesc"><?php echo str_replace('&','&amp;',$this->article->metadesc); ?></textarea>
		</li>
		<li>
			<label for="metakey">
				<?php echo JText::_( 'Keywords' ); ?>:
			</label>
			<textarea rows="5" cols="50" class="inputbox" id="metakey" name="metakey"><?php echo str_replace('&','&amp;',$this->article->metakey); ?></textarea>
		</li>
	</ul>
</fieldset>

<input type="hidden" name="option" value="com_content" />
<input type="hidden" name="id" value="<?php echo $this->article->id; ?>" />
<input type="hidden" name="version" value="<?php echo $this->article->version; ?>" />
<input type="hidden" name="created_by" value="<?php echo $this->article->created_by; ?>" />
<input type="hidden" name="referer" value="<?php echo @$_SERVER['HTTP_REFERER']; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
<input type="hidden" name="task" value="" />
</form>
</section>
<?php echo JHTML::_('behavior.keepalive'); ?>
