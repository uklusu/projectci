<article class="product-column">
  <a class="link" href="<?php echo htmlspecialchars($link) ?>" title="<?php echo htmlspecialchars($name); ?>" data-id="<?php echo $product_id; ?>" data-sku="<?php echo htmlspecialchars($sku); ?>" data-name="<?php echo htmlspecialchars($name); ?>" data-price="<?php echo currency::format_raw($campaign_price ? $campaign_price : $regular_price); ?>">

    <div class="image-wrapper">
      <img class="image img-responsive" src="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?>" srcset="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?> 1x, <?php echo document::href_link(WS_DIR_APP . $image['thumbnail_2x']); ?> 2x" alt="<?php echo htmlspecialchars($name); ?>" />
      <?php echo $sticker; ?>
    </div>
    <div class="info">
      <h4 class="name"><?php echo $name; ?></h4>
      <div class="manufacturer-name"><?php echo !empty($manufacturer) ? $manufacturer['name'] : '&nbsp;'; ?></div>
      
      
      

      <div class="price-wrapper">
        <?php if ($campaign_price) { ?><span style="font-size:14px;">Store price:</span>
        <del class="regular-price"><?php echo currency::format($regular_price); ?></del> <br>
        <span style="color:#c00;"><span style="font-size:1.25em;">Sale price:</span>
        <strong class="campaign-price"><?php echo currency::format($campaign_price); ?></strong>
        <?php } else { ?>
        <span class="price">Store price: <?php echo currency::format($regular_price); ?></span>
        <?php } ?>
      </div>
    </div>
  </a>
  <div class="buy_now" style="margin: 0em 0;">
        <?php echo functions::form_draw_form_begin('buy_now_form', 'post'); ?>
        <?php echo functions::form_draw_hidden_field('product_id', $product_id); ?>
        <div class="form-group" style="padding: 10px;">
        
          <div style="kosarba">
            <div class="input-group" style="flex: 0 1 150px;">
              <?php echo (!empty($quantity_unit['decimals'])) ? functions::form_draw_decimal_field('quantity', isset($_POST['quantity']) ? true : 1, $quantity_unit['decimals'], 1, null) : (functions::form_draw_number_field('quantity', isset($_POST['quantity']) ? true : 1, 1)); ?>
              <?php echo !empty($quantity_unit['name']) ? '<div class="input-group-addon">'. $quantity_unit['name'] .'</div>' : ''; ?>
			  <?php echo '<button class="btn btn-success" name="add_cart_product" value="true" type="submit"'.'>'. language::translate('title_add_to_cart', 'Add To Cart') .'</button>'; ?>
            </div>
          </div>
		  
        </div>
        <?php echo functions::form_draw_form_end(); ?>

  <button class="preview btn btn-default" data-toggle="lightbox" data-target="<?php echo htmlspecialchars($link) ?>" data-require-window-width="768" data-max-width="980"><i class="fa fa-eye"></i>Quickview</button>
</article>
