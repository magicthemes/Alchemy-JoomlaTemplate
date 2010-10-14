<?php // no direct access
defined('_JEXEC') or die('Restricted access');

if ($showmode == 0 || $showmode == 2) :
    if ($count['guest'] != 0 || $count['user'] != 0) :
        echo '<p>'.JText::_('We have') . '&nbsp;';
		if ($count['guest'] == 1) :
		    echo JText::sprintf('guest', '<strong>1</strong>');
		else :
		    if ($count['guest'] > 1) :
			    echo JText::sprintf('guests', '<strong>'.$count['guest'].'</strong>');
			endif;
		endif;

		if ($count['guest'] != 0 && $count['user'] != 0) :
		    echo '&nbsp;' . JText::_('and') . '&nbsp;';
	    endif;

		if ($count['user'] == 1) :
		    echo JText::sprintf('member', '<strong>1</strong>');
		else :
		    if ($count['user'] > 1) :
			    echo JText::sprintf('members', '<strong>'.$count['user'].'</strong>');
			endif;
		endif;
		echo '&nbsp;' . JText::_('online').'</p>';
    endif;
endif;

if(($showmode > 0) && count($names)) : ?>
	<ul>
<?php foreach($names as $name) : ?>
		<li><strong><?php echo $name->username; ?></strong></li>
<?php endforeach;  ?>
	</ul>
<?php endif;
