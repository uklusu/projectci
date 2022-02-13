<article class="product-row">
  <a class="link" href="<?php echo htmlspecialchars($link) ?>" title="<?php echo htmlspecialchars($name); ?>" data-id="<?php echo $product_id; ?>" data-sku="<?php echo htmlspecialchars($sku); ?>" data-name="<?php echo htmlspecialchars($name); ?>" data-price="<?php echo currency::format_raw($campaign_price ? $campaign_price : $regular_price); ?>">

    <div class="image-wrapper">
      <img class="image" src="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?>" srcset="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?> 1x, <?php echo document::href_link(WS_DIR_APP . $image['thumbnail_2x']); ?> 2x" alt="<?php echo htmlspecialchars($name); ?>" />
      <?php echo $sticker; ?>
    </div>

    <div class="info">
      <h4 class="name"><?php echo $name; ?></h4>
      <div class="description"><?php echo $short_description; ?></div>
    </div>

    <div class="price-wrapper">
      <?php if ($campaign_price) { ?>
      <del class="regular-price"><?php echo currency::format($regular_price); ?></del> <strong class="campaign-price"><?php echo currency::format($campaign_price); ?></strong>
      <?php } else { ?>
      <span class="price"><?php echo currency::format($regular_price); ?></span>
      <?php } ?>
    </div>
  </a>
</article>
