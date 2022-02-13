<article id="box-product" class="box" data-id="<?php echo $product_id; ?>" data-sku="<?php echo htmlspecialchars($sku); ?>" data-name="<?php echo htmlspecialchars($name); ?>" data-price="<?php echo currency::format_raw($campaign_price ? $campaign_price : $regular_price); ?>">

  <div class="row">
    <div class="col-sm-4 col-md-6">
      <div class="images row">

        <div class="col-xs-12">
          <a class="main-image thumbnail" href="<?php echo document::href_link(WS_DIR_APP . $image['original']); ?>" data-toggle="lightbox" data-gallery="product">
            <img class="img-responsive" src="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?>" srcset="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?> 1x, <?php echo document::href_link(WS_DIR_APP . $image['thumbnail_2x']); ?> 2x" alt="" title="<?php echo htmlspecialchars($name); ?>" />
            <?php echo $sticker; ?>
          </a>
        </div>

        <?php foreach ($extra_images as $extra_image) { ?>
        <div class="col-xs-4">
          <a class="extra-image thumbnail" href="<?php echo document::href_link(WS_DIR_APP . $extra_image['original']); ?>" data-toggle="lightbox" data-gallery="product">
            <img class="img-responsive" src="<?php echo document::href_link(WS_DIR_APP . $extra_image['thumbnail']); ?>" srcset="<?php echo document::href_link(WS_DIR_APP . $extra_image['thumbnail']); ?> 1x, <?php echo document::href_link(WS_DIR_APP . $extra_image['thumbnail_2x']); ?> 2x" alt="" title="<?php echo htmlspecialchars($name); ?>" />
          </a>
        </div>
        <?php } ?>

      </div>
    </div>

    <div class="col-sm-8 col-md-6">
      <h1 class="title"><?php echo $name; ?></h1>
      <div><?php if (!empty($average_rating)) { ?>
        <div class="rating">
          <a href="#tab-reviews" class="star-star">
            <?php echo functions::draw_rating($average_rating); ?>
          </a>
         (<?php echo $num_reviews; ?> <?php language::translate('title_reviews', 'Reviews'); ?>) customer reviews 
        </div>
        <script>$('.average-rating a[href="#tab-reviews"]').click(function(){ $('a[data-toggle="tab"][href="#tab-reviews"]').click(); }); </script>
        <?php } ?></div>
      

      <?php if ($short_description) { ?>
      <p class="short-description">
        <?php echo $short_description; ?>
      </p>
      <?php } ?>

      <?php if (!empty($manufacturer)) { ?>
      <div class="manufacturer">
        <a href="<?php echo htmlspecialchars($manufacturer['link']); ?>">
          <?php if ($manufacturer['image']) { ?>
          <img src="<?php echo document::href_link(WS_DIR_APP . $manufacturer['image']['thumbnail']); ?>" srcset="<?php echo document::href_link(WS_DIR_APP . $manufacturer['image']['thumbnail']); ?> 1x, <?php echo document::href_link(WS_DIR_APP . $manufacturer['image']['thumbnail_2x']); ?> 2x" alt="<?php echo htmlspecialchars($manufacturer['name']); ?>" title="<?php echo htmlspecialchars($manufacturer['name']); ?>" />
          <?php } else { ?>
          <h3><?php echo $manufacturer['name']; ?></h3>
          <?php } ?>
        </a>
      </div>
      <?php } ?>

      <?php if ($cheapest_shipping_fee !== null) { ?>
      <div class="cheapest-shipping" style="margin: 1em 0;">
        <?php echo functions::draw_fonticon('fa-truck'); ?> <?php echo strtr(language::translate('text_cheapest_shipping_from_price', 'Cheapest shipping from <strong class="value">%price</strong>'), array('%price' => currency::format($cheapest_shipping_fee))); ?>
      </div>
      <?php } ?>
<?php if (!empty($average_rating)) { ?>
        <div class="average-rating">
          <a href="#tab-reviews" style="text-decoration: none;">
            <?php echo functions::draw_rating($average_rating); ?>
          </a>
        </div>
        <script>$('.average-rating a[href="#tab-reviews"]').click(function(){ $('a[data-toggle="tab"][href="#tab-reviews"]').click(); });</script>
        <?php } ?>
      <?php if ($sku || $mpn || $gtin) { ?>
      <div class="codes" style="margin: 1em 0;">
        <?php if ($sku) { ?>
        <div class="sku">
          <?php echo language::translate('title_sku', 'SKU'); ?>:
          <span class="value"><?php echo $sku; ?></span>
        </div>
        <?php } ?>

        <?php if ($mpn) { ?>
        <div class="mpn">
          <?php echo language::translate('title_mpn', 'MPN'); ?>:
          <span class="value"><?php echo $mpn; ?></span>
        </div>
        <?php } ?>
        
        
        
        
        
        
        
        

        <?php if ($gtin) { ?>
        <div class="gtin">
          <?php echo language::translate('title_gtin', 'GTIN'); ?>:
          <span class="value"><?php echo $gtin; ?></span>
        </div>
        <?php } ?>
      </div>
      <?php } ?>

      <div class="stock-status" style="margin: 1em 0;">
       <?php if ($quantity > 0) { ?>
        <div class="stock-available">
          <?php echo language::translate('title_stock_status', 'Stock Status'); ?>:
          <span class="value"><?php echo $stock_status; ?></span>
        </div>
        <?php if ($delivery_status) { ?>
        <div class="stock-delivery">
          <?php echo language::translate('title_delivery_status', 'Delivery Status'); ?>:
          <span class="value"><?php echo $delivery_status['name']; ?></span>
        </div>
        <?php } ?>
       <?php } else { ?>
        <?php if ($sold_out_status) { ?>
          <div class="<?php echo empty($sold_out_status['orderable']) ? 'stock-partly-available' : 'stock-unavailable'; ?>">
            <?php echo language::translate('title_stock_status', 'Stock Status'); ?>:
            <span class="value"><?php echo $sold_out_status['name']; ?></span>
          </div>
        <?php } else { ?>
          <div class="stock-unavailable">
            <?php echo language::translate('title_stock_status', 'Stock Status'); ?>:
            <span class="value"><?php echo language::translate('title_sold_out', 'Sold Out'); ?></span>
          </div>
        <?php } ?>
       <?php } ?>
      </div>

      <?php if ($recommended_price) { ?>
      <div class="recommmended-price" style="margin: 1em 0;">
        <?php echo language::translate('title_recommended_price', 'Recommended Price'); ?>:
        <span class="value"><?php echo currency::format($recommended_price); ?></span>
      </div>
      <?php } ?>

      <hr />

      <div class="buy_now" style="margin: 1em 0;">
        <?php echo functions::form_draw_form_begin('buy_now_form', 'post'); ?>
        <?php echo functions::form_draw_hidden_field('product_id', $product_id); ?>

        <?php if ($options) { ?>
          <?php foreach ($options as $option) { ?>
          <div class="form-group">
            <label><?php echo $option['name']; ?></label>
            <?php echo $option['values']; ?>
          </div>
          <?php } ?>
        <?php } ?>

        <div class="price-wrapper">
          <?php if ($campaign_price) { ?>
          Store price: <del class="regular-price"><?php echo currency::format($regular_price); ?></del><br>
          <span style="font-size:16px; color: #cc0000;"> Sale price:</span>
          <strong class="campaign-price"><?php echo currency::format($campaign_price); ?></strong>
          <br>
          <?php } else if ($recommended_price) { ?>
          <del class="recommended-price">Store price: <?php echo currency::format($recommended_price); ?></del><strong class="price"><?php echo currency::format($regular_price); ?></strong>
          <?php } else { ?>
          <span class="price">Store price: <?php echo currency::format($regular_price); ?></span>
          <?php } ?>
        </div>

        <div class="tax" style="margin: 0 0 1em 0;">
         <?php if ($tax_rates) { ?>
          <?php echo $including_tax ? language::translate('title_including_tax', 'Including Tax') : language::translate('title_excluding_tax', 'Excluding Tax'); ?>: <span class="total-tax"><?php echo currency::format($total_tax); ?></span>
         <?php } else { ?>
          <?php echo language::translate('title_excluding_tax', 'Excluding Tax'); ?>
         <?php } ?>
        </div>

        <?php if (!settings::get('catalog_only_mode') && ($quantity > 0 || empty($sold_out_status) || !empty($sold_out_status['orderable']))) { ?>
        <div class="form-group">
          <label><?php echo language::translate('title_quantity', 'Quantity'); ?></label>
          <div style="display: flex">
            <div class="input-group" style="flex: 0 1 150px;">
              <?php echo (!empty($quantity_unit['decimals'])) ? functions::form_draw_decimal_field('quantity', isset($_POST['quantity']) ? true : 1, $quantity_unit['decimals'], 1 / intval('1'.str_repeat('0', $quantity_unit['decimals'])), null) : functions::form_draw_number_field('quantity', isset($_POST['quantity']) ? true : 1, 1); ?>
              <?php echo !empty($quantity_unit['name']) ? '<div class="input-group-addon">'. $quantity_unit['name'] .'</div>' : ''; ?>
            </div>

            <div style="padding-left: 1em;">
              <?php echo '<button class="btn btn-success" name="add_cart_product" value="true" type="submit"'. (($quantity <= 0 && !$orderable) ? ' disabled="disabled"' : '') .'>'. language::translate('title_add_to_cart', 'Add To Cart') .'</button>'; ?>
            </div>
          </div>
        </div>
        <?php } ?>

        <?php echo functions::form_draw_form_end(); ?>
      </div>

      <?php if ($quantity <= 0 && !empty($sold_out_status) && empty($sold_out_status['orderable'])) { ?>
      <div class="out-of-stock-notice">
        <?php echo language::translate('description_item_is_out_of_stock', 'This item is currently out of stock and can not be purchased.'); ?>
      </div>
      <?php } ?>

      <hr />

      <div class="social-bookmarks text-center">
        <a class="link" href="#"><?php echo functions::draw_fonticon('fa-link', 'style="color: #333;"'); ?></a>
        <a class="twitter" href="<?php echo document::href_link('https://twitter.com/intent/tweet/', array('text' => $name .' - '. $link)); ?>" target="_blank" title="<?php echo sprintf(language::translate('text_share_on_s', 'Share on %s'), 'Twitter'); ?>"><?php echo functions::draw_fonticon('fa-twitter-square fa-lg', 'style="color: #55acee;"'); ?></a>
        <a class="facebook" href="<?php echo document::href_link('https://www.facebook.com/sharer.php', array('u' => $link)); ?>" target="_blank" title="<?php echo sprintf(language::translate('text_share_on_s', 'Share on %s'), 'Facebook'); ?>"><?php echo functions::draw_fonticon('fa-facebook-square fa-lg', 'style="color: #3b5998;"'); ?></a>
        <a class="pinterest" href="<?php echo document::href_link('https://pinterest.com/pin/create/button/', array('url' => $link)); ?>" target="_blank" title="<?php echo sprintf(language::translate('text_share_on_s', 'Share on %s'), 'Pinterest'); ?>"><?php echo functions::draw_fonticon('fa-pinterest-square fa-lg', 'style="color: #bd081c;"'); ?></a>
      </div>

    </div>
  </div>

  <?php if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') { ?>
  <ul class="nav nav-tabs">
    <?php if ($description) { ?><li><a data-toggle="tab" href="#tab-description"><?php echo language::translate('title_description', 'Description'); ?></a></li><?php } ?>
    <?php if ($technical_data) { ?><li><a data-toggle="tab" href="#tab-technical-data"><?php echo language::translate('title_technical_data', 'Technical Data'); ?></a></li><?php } ?>
        

     <li><a data-toggle="tab" href="#tab-szallitas"><?php echo language::translate('title_szallitas', 'Shipping'); ?></a></li>
      <li><a data-toggle="tab" href="#tab-garancia"><?php echo language::translate('title_garancia', 'Guarantee'); ?></a></li>
      <li><a data-toggle="tab" href="#tab-reviews"><?php echo language::translate('title_reviews', 'Reviews'); ?></a></li>

     
     
  </ul>

  <div class="tab-content">
    <div id="tab-description" class="tab-pane description">
      <?php echo $description; ?>
    </div>
    
    
    <div id="tab-szallitas" class="tab-pane szallitas">
          <h2 class="Section-heading Section-heading--smallLight">Delivery Terms</h2>
<table class="TableDelivery mt15">
<thead>
<tr>
<td>Delivery type</td>
<td>Delivery Times*</td>
<td>Courier</td>
<td>Price</td>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Standard delivery (up to 5 kg)</strong></td>
<td><strong>3-5</strong></td>
<td><strong>SkyNet</strong></td>
<td><strong>$9.50</strong></td>
</tr>
<tr>
<td>Standard delivery (from 5 to 31.5 kg)</td>
<td>3-5</td>
<td>SkyNet</td>
<td>$17.50</td>
</tr>
</tbody>
</table>
    </div>
    
    
     <div id="tab-garancia" class="tab-pane garancia">
  <p><strong>Guarantees for durable consumer goods:</strong></p>
<p>The rules prescribed in the government decree apply to the electrical and other durable consumer goods we sell. All related administration (warranty, repair, replacement) is performed by the customer service of the web store.</p>
<p>We will send a courier at our own expense for electrical and other durable consumer goods heavier than 15kg with a warranty defect, and we will return the repaired or replaced device by courier as soon as possible.</p>
<p>Durable consumer goods weighing less than 15kg must be returned to the customer at the address of our customer service. You can find the exact details in the General Terms and Conditions!</p>    </div>
    
    
    <div id="tab-reviews" class="tab-pane">
      <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_product_reviews.inc.php'); ?>
    </div>

    <?php if ($technical_data) { ?>
    <div id="tab-technical-data" class="tab-pane technical-data">
      <table class="table table-striped table-hover">
<?php
 foreach ($technical_data as $line) { if (preg_match('#[:\t]#', $line)) { list($key, $value) = preg_split('#([:\t]+)#', $line, -1, PREG_SPLIT_NO_EMPTY); echo '  <tr>' . PHP_EOL . '    <td>'. trim($key) .'</td>' . PHP_EOL . '    <td>'. trim($value) .'</td>' . PHP_EOL . '  </tr>' . PHP_EOL; } else if (trim($line) != '') { echo '  <thead>' . PHP_EOL . '    <tr>' . PHP_EOL . '      <th colspan="2">'. $line .'</th>' . PHP_EOL . '    </tr>' . PHP_EOL . '  </thead>' . PHP_EOL . '  <tbody>' . PHP_EOL; } else { echo ' </tbody>' . PHP_EOL . '</table>' . PHP_EOL . '<table class="table table-striped table-hover">' . PHP_EOL; } } ?>
      </table>
    </div>
    <?php } ?>
  </div>
  <?php } ?>

</article>

<script>
  Number.prototype.toMoney = function() {
    var n = this,
      c = <?php echo (int)currency::$selected['decimals']; ?>,
      d = '<?php echo language::$selected['decimal_point']; ?>',
      t = '<?php echo addslashes(language::$selected['thousands_sep']); ?>',
      p = '<?php echo currency::$selected['prefix']; ?>',
      x = '<?php echo currency::$selected['suffix']; ?>',
      s = n < 0 ? '-' : '',
      i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + '',
      f = n - i,
      j = (j = i.length) > 3 ? j % 3 : 0;

    return s + p + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + t) + (<?php echo (settings::get('auto_decimals')) ? "(c && f)" : "c"; ?> ? d + Math.abs(f).toFixed(c).slice(2) : '') + x;
  }

  $('#box-product[data-id="<?php echo $product_id; ?>"] form[name=buy_now_form]').on('input', function(e) {

    var regular_price = <?php echo currency::format_raw($regular_price); ?>;
    var sales_price = <?php echo currency::format_raw($campaign_price ? $campaign_price : $regular_price); ?>;
    var tax = <?php echo currency::format_raw($total_tax); ?>;

    $(this).find('input[type="radio"]:checked, input[type="checkbox"]:checked').each(function(){
      if ($(this).data('price-adjust')) regular_price += $(this).data('price-adjust');
      if ($(this).data('price-adjust')) sales_price += $(this).data('price-adjust');
      if ($(this).data('tax-adjust')) tax += $(this).data('tax-adjust');
    });

    $(this).find('select option:checked').each(function(){
      if ($(this).data('price-adjust')) regular_price += $(this).data('price-adjust');
      if ($(this).data('price-adjust')) sales_price += $(this).data('price-adjust');
      if ($(this).data('tax-adjust')) tax += $(this).data('tax-adjust');
    });

    $(this).find('input[type!="radio"][type!="checkbox"]').each(function(){
      if ($(this).val() != '') {
        if ($(this).data('price-adjust')) regular_price += $(this).data('price-adjust');
        if ($(this).data('price-adjust')) sales_price += $(this).data('price-adjust');
        if ($(this).data('tax-adjust')) tax += $(this).data('tax-adjust');
      }
    });

    $(this).find('.regular-price').text(regular_price.toMoney());
    $(this).find('.campaign-price').text(sales_price.toMoney());
    $(this).find('.price').text(sales_price.toMoney());
    $(this).find('.total-tax').text(tax.toMoney());
  });

  $('#box-product[data-id="<?php echo $product_id; ?>"] .social-bookmarks .link').off().click(function(e){
    e.preventDefault();
    prompt("<?php echo language::translate('text_link_to_this_product', 'Link to this product'); ?>", '<?php echo $link; ?>');
  });
</script>