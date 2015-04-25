<?php include ('inc-header.php'); ?>

		<div id="page-header" class="wrap" style="background-image: linear-gradient(rgba(0, 0, 0, 0.65),rgba(0, 0, 0, 0.65)), url(<?php echo $bg; ?>);">
			<div class="inner">
				<h1><?php echo gettext('Login'); ?></h1>
			</div>
		</div>
		
		<div class="bar">
			<div class="inner">
				<?php echo $quickmenu; ?>
				<div class="pad" id="breadcrumb">
					<a href="<?php echo getGalleryIndexURL(); ?>"><i class="fa fa-home"></i>&nbsp;<?php printGalleryTitle(); ?></a>&nbsp;/
					<?php echo gettext('Password required'); ?>
				</div>
			</div>
		</div>
			
		<div id="main" class="wrap clearfix">
			<div class="inner">
				<div class="page pad loginout errorbox">
				<?php if (!zp_loggedin()) { ?>
					<div class="error"><?php echo gettext("Please Login"); ?></div>
					<?php printPasswordForm($hint, $show, false); ?>
				<?php } else { ?>
					<div class="errorbox">
                                            <h4><?php echo gettext('You are logged in') ; ?></h4>
                                            <p><a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Goto Homepage'); ?>"><?php echo gettext('Goto Homepage').' &rarr;'; ?></a></p>
					</div>
				<?php } ?>

				<?php
				if (!zp_loggedin() && function_exists('printRegistrationForm') && $_zp_gallery->isUnprotectedPage('register')) {
					printCustomPageURL(gettext('Register for this site'), 'register', '', '<br />');
					echo '<br />';
				}
				?>
				</div>

				<div class="page-sidebar pad">
                                    <?php echo JKP_printRandomImage(1,'none','all','',340,360,false,false); ?>
				</div>
			</div>
		</div>
		
<?php include('inc-footer.php'); ?>