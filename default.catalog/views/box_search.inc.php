<?php echo functions::form_draw_form_begin('search_form', 'get', document::ilink('search'), false, 'class="drawer-form"'); ?>
	<?php echo functions::form_draw_search_field('query', true, 'placeholder="'. language::translate('text_find_products', 'Find products') .' &hellip;"'); ?>
<?php echo functions::form_draw_form_end(); ?>