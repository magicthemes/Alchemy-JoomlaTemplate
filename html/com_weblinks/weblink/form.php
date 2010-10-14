<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
function submitbutton(pressbutton)
{
	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}

	// do field validation
	if (document.getElementById('jformtitle').value == ""){
		alert( "<?php echo JText::_( 'Weblink item must have a title', true ); ?>" );
	} else if (document.getElementById('jformcatid').value < 1) {
		alert( "<?php echo JText::_( 'You must select a category.', true ); ?>" );
	} else if (document.getElementById('jformurl').value == ""){
		alert( "<?php echo JText::_( 'You must have a url.', true ); ?>" );
	} else {
		submitform( pressbutton );
	}
}
</script>

<section id="weblinks-weblink" class="<?php echo $this->params->get('pageclass_sfx', 'default');?>">

<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>

	<form action="<?php echo $this->action ?>" method="post" name="adminForm" id="adminForm">
		<ul class="fields">
			<li>
				<label for="jformtitle">
					<?php echo JText::_( 'Name' ); ?>:
				</label>
				<div class="field">
					<input class="inputbox" type="text" id="jformtitle" name="jform[title]" size="50" maxlength="250" value="<?php echo $this->escape($this->weblink->title);?>" />
				</div>
			</li>
			<li>
				<label for="jformcatid">
					<?php echo JText::_( 'Category' ); ?>:
				</label>
				<div class="field">
					<?php echo $this->lists['catid']; ?>
				</div>
			</li>
			<li>
				<label for="jformurl">
					<?php echo JText::_( 'URL' ); ?>:
				</label>
				<div class="field">
					<input class="inputbox" type="text" id="jformurl" name="jform[url]" value="<?php echo $this->weblink->url; ?>" size="50" maxlength="250" />
				</div>
			</li>
			<li>
				<label for="jformpublished">
					<?php echo JText::_( 'Published' ); ?>:
				</label>
				<div class="field">
					<?php echo $this->lists['published']; ?>
				</div>
			</li>
			<li>
				<label for="jformdescription">
					<?php echo JText::_( 'Description' ); ?>:
				</label>
				<div class="field">
					<textarea class="inputbox" cols="30" rows="6" id="jformdescription" name="jform[description]" style="width:300px"><?php echo $this->escape( $this->weblink->description);?></textarea>
				</div>
			</li>
			<li>
				<label for="jformordering">
					<?php echo JText::_( 'Ordering' ); ?>:
				</label>
				<div class="field">
					<?php echo $this->lists['ordering']; ?>
				</div>
			</li>
		</ul>
		<div class="buttons">
			<button type="button" onclick="submitbutton('save')">
				<?php echo JText::_('Save') ?>
			</button>
			<button type="button" onclick="submitbutton('cancel')">
				<?php echo JText::_('Cancel') ?>
			</button>
		</div>

		<input type="hidden" name="jform[id]" value="<?php echo $this->weblink->id; ?>" />
		<input type="hidden" name="jform[ordering]" value="<?php echo $this->weblink->ordering; ?>" />
		<input type="hidden" name="jform[approved]" value="<?php echo $this->weblink->approved; ?>" />
		<input type="hidden" name="option" value="com_weblinks" />
		<input type="hidden" name="controller" value="weblink" />
		<input type="hidden" name="task" value="" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>

</section>
