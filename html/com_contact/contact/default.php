<?php
/**
 * $Id: default.php 11328 2008-12-12 19:22:41Z kdevine $
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

$cparams = JComponentHelper::getParams ('com_media');
?>

<section id="contact-contact" class="<?php echo $this->params->get('pageclass_sfx', 'default'); ?>">
<?php if ( $this->params->get( 'show_page_title', 1 ) && !$this->contact->params->get( 'popup' ) && $this->params->get('page_title') != $this->contact->name ) : ?>
	<h1><?php echo $this->params->get( 'page_title' ); ?></h1>
<?php endif; ?>

<?php if ( $this->params->get( 'show_contact_list' ) && count( $this->contacts ) > 1) : ?>
	<form action="<?php echo JRoute::_('index.php') ?>" method="post" name="selectForm" id="selectForm">
		<?php echo JText::_( 'Select Contact' ); ?>:
		<?php echo JHTML::_('select.genericlist',  $this->contacts, 'contact_id', 'class="inputbox" onchange="this.form.submit()"', 'id', 'name', $this->contact->id);?>
		<input type="hidden" name="option" value="com_contact" />
	</form>
<?php endif; ?>
	
	<div class="hCard">
	<?php if ( $this->contact->name && $this->contact->params->get( 'show_name' ) ) : ?>
		<header>
			<h2 class="fn"><?php echo $this->contact->name; ?></h2>
		</header>
	<?php endif; ?>
	<?php if ( $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>
		<span class="role"><?php echo $this->contact->con_position; ?></span>
	<?php endif; ?>
	<?php if ( $this->contact->image && $this->contact->params->get( 'show_image' ) ) : ?>
		<?php echo JHTML::_('image', 'images/stories' . '/'.$this->contact->image, JText::_( 'Contact' ), array('class' => 'contactpic')); ?>
	<?php endif; ?>
	<?php echo $this->loadTemplate('address'); ?>
	</div>
<?php if ( $this->contact->params->get( 'allow_vcard' ) ) : ?>
	<?php echo JText::_( 'Download information as a' );?>
		<a href="<?php echo JURI::base(); ?>index.php?option=com_contact&amp;task=vcard&amp;contact_id=<?php echo $this->contact->id; ?>&amp;format=raw&amp;tmpl=component">
			<?php echo JText::_( 'VCard' );?></a>
<?php endif;

if ( $this->contact->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id))
	echo $this->loadTemplate('form');
?>
</section>
