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
				<div class="page pad loginout">
                                    <?php printUserLogin_out(gettext("You are successfully logged in. Now you can enjoy the full capability of this site.") . '<br><br>','',true); ?>
                                    <?php if(zp_loggedin()) {?>
                                    <br><br><h5 id="favorites-title"><i class="fa fa-star"></i> <?php echo gettext('Favorites'); ?></h5>
                                        <?php printFavoritesURL(null,'','','');} ?>
				</div>

				<div class="page-sidebar pad">
                                    <?php echo JKP_printRandomImage(1,'none','all','',340,360,false,false); ?>
				</div>
			</div>
		</div>
		
<?php include('inc-footer.php'); ?>