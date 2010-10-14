<?php
/** $Id: default_address.php 11328 2008-12-12 19:22:41Z kdevine $ */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if ( ( $this->contact->params->get( 'address_check' ) > 0 ) &&  ( $this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode ) ) : ?>
	<address class="adr">
	<?php if ( $this->contact->address && $this->contact->params->get( 'show_street_address' ) ) : ?>
		<span class="street-address"><?php echo nl2br($this->contact->address); ?></span>
	<?php endif; ?>
	<?php if ( $this->contact->suburb && $this->contact->params->get( 'show_suburb' ) ) : ?>
		<span class="locality">	<?php echo $this->contact->suburb; ?></span>
	<?php endif; ?>
	<?php if ( $this->contact->state && $this->contact->params->get( 'show_state' ) ) : ?>
		<span class="region"><?php echo $this->contact->state; ?></span>
	<?php endif; ?>
	<?php if ( $this->contact->postcode && $this->contact->params->get( 'show_postcode' ) ) : ?>
		<span class="postal-code"><?php echo $this->contact->postcode; ?></span>
	<?php endif; ?>
	<?php if ( $this->contact->country && $this->contact->params->get( 'show_country' ) ) : ?>
		<span class="country-name"><?php echo $this->contact->country; ?></span>
	<?php endif; ?>
	</address>
<?php endif; ?>
<?php if ( ($this->contact->email_to && $this->contact->params->get( 'show_email' )) || 
			($this->contact->telephone && $this->contact->params->get( 'show_telephone' )) || 
			($this->contact->fax && $this->contact->params->get( 'show_fax' )) || 
			($this->contact->mobile && $this->contact->params->get( 'show_mobile' )) || 
			($this->contact->webpage && $this->contact->params->get( 'show_webpage' )) ) : ?>
	<?php if ( $this->contact->email_to && $this->contact->params->get( 'show_email' ) ) : ?>
			<?php echo $this->contact->params->get( 'marker_email' ); ?>
		<span class="email">
			<?php echo $this->contact->email_to; ?>
		</span>
	<?php endif; ?>
	<?php if ( $this->contact->telephone && $this->contact->params->get( 'show_telephone' ) ) : ?>
	<span class="tel">
		<span class="type business">Business
			<?php echo $this->contact->params->get( 'marker_telephone' ); ?>
		</span>
		<span class="value">
			<?php echo nl2br($this->contact->telephone); ?>
		</span>
	</span>
	<?php endif; ?>
	<?php if ( $this->contact->fax && $this->contact->params->get( 'show_fax' ) ) : ?>
	<span class="tel">
		<span class="type fax">Fax
			<?php echo $this->contact->params->get( 'marker_fax' ); ?>
		</span>
		<span class="value">
			<?php echo nl2br($this->contact->fax); ?>
		</span>
	</span>
	<?php endif; ?>
	<?php if ( $this->contact->mobile && $this->contact->params->get( 'show_mobile' ) ) :?>
	<span class="tel">
		<span class="type mobile">Mobile
		<?php echo $this->contact->params->get( 'marker_mobile' ); ?>
		</span>
		<span class="value">
			<?php echo nl2br($this->contact->mobile); ?>
		</span>
	</span>
	<?php endif; ?>
	<?php if ( $this->contact->webpage && $this->contact->params->get( 'show_webpage' )) : ?>
		<span class="url">
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank">
				<?php echo $this->contact->webpage; ?></a>
		</span>
	<?php endif; ?>
<?php endif; ?>
<?php if ( $this->contact->misc && $this->contact->params->get( 'show_misc' ) ) : ?>
	<span >
		<?php echo $this->contact->params->get( 'marker_misc' ); ?>
	</span>
	<span class="note">
		<?php echo $this->contact->misc; ?>
	</span>
<?php endif; ?>
