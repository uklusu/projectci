<section id="box-popular-products" class="box">

  <h1 class="heading-tbay-title"><?php echo language::translate('title_popular_products', 'Popular Products'); ?></h1>

  <div class="listing products">
    <?php foreach ($products as $product) echo functions::draw_listing_product($product); ?>
  </div>

</section>