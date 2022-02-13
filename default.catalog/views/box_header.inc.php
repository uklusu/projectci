<header id="header" class="hidden-print">
	<div class="header-wrapper container">
		<div class="header-left">
		
			<a href="#" data-drawer-trigger aria-controls="drawer-name-left" aria-expanded="false"><i class="icon-menu" style="font-size:50px"></i></a>
		
			<a class="logotype" href="<?php echo document::href_ilink(''); ?>">
				<img src="<?php echo document::href_link('images/logotype.png'); ?>" alt="<?php echo settings::get('store_name'); ?>" title="<?php echo settings::get('store_name'); ?>" />
			</a>
			
		</div>

		<div class="text-center hidden-xs hidden-sm">
			<?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_region.inc.php'); ?>
		</div>

		<div class="text-right">
			<?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_cart.inc.php'); ?>
		</div>
	</div>
</header>