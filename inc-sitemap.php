<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul id="sit">
	<?php
        global $zenpage,$_zp_gallery,$_zp_gallery_page;
	$hometext = gettext('Home');
	if ($_zp_gallery->getWebsiteURL()) { ?>
    <li><?php printHomeLink(); ?><li>
	<?php $hometext = gettext('Gallery'); 
	} ?>
	<li>
            <a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo $hometext; ?>"><?php echo $hometext; ?></a>
	</li>
	<?php if (($zenpage) && (getNumNews(true) > 0)) { ?>
	<li>
            <a href="<?php echo getNewsIndexURL(); ?>"><?php echo gettext('News'); ?></a>
		<?php printAllNewsCategories('',false,'','active open',true,'submenu','active open','list',true,null); ?>
	</li>
	<?php } ?>
	
        <?php if ($zenpage) printPageMenu('list','','active open','submenu','active open','',true,false); ?>
	<li>
            <a href="<?php echo getCustomPageURL('archive'); ?>" title="<?php echo gettext('Archive/Search'); ?>"><?php echo gettext('Archive/Search'); ?></a>
	</li>
	<?php if (function_exists('printContactForm')) { ?>
	<li>
		<?php printCustomPageURL(gettext('Contact'),"contact"); ?>
	</li>
	<?php } ?>
        <li><span><?php echo gettext('Gallery'); ?></span>
		<?php printAlbumMenuList('list',false,'','active','sub','active','',true); ?>
	</li>
</ul>
