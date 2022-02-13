<section id="box-latest-products" class="box">

  <h1 class="heading-tbay-title"><?php echo language::translate('title_latest_products', 'Latest Products'); ?></h1>

  <div class="listing products">
    <?php foreach ($products as $product) echo functions::draw_listing_product($product); ?>
  </div>

</section>