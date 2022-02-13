<div class="customer-service hidden-xs">
	<div class="title"><?php echo language::translate('title_customer_service', 'Customer Service'); ?></div>
	<?php if (settings::get('store_phone')) { ?>
	<div class="phone"><?php echo functions::draw_fonticon('fa-phone'); ?> <?php echo settings::get('store_phone'); ?></div>
	<?php } else { ?>
	<div class="email"><?php echo functions::draw_fonticon('fa-envelope'); ?> <?php echo settings::get('store_email'); ?></div>
	<?php } ?>
</div>