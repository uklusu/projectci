<main id="content">
  {snippet:notices}
  <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_slides.inc.php'); ?>
  <div class="row">
    <div class="col-md-3">
      <aside id="sidebar">
        <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_TEMPLATE . 'views/column_left.inc.php'); ?>
        <div class="container">
      </aside>
    </div>
    <div class="col-md-9">
      <ul class="nav nav-justified nav-tabs">
      <li><a href="#latest-products" data-toggle="tab"><?php echo language::translate('title_latest_products', 'Latest Products'); ?></a></li>
      <li><a href="#popular-products" data-toggle="tab"><?php echo language::translate('title_popular_products', 'Popular Products'); ?></a></li>
      <?php if ($display_campaign_products = (settings::get('box_campaign_products_num_items') && database::num_rows(functions::catalog_products_query(array('campaign' => true, 'limit' => 1)))) ? true : false) { ?><li><a href="#campaign-products" data-toggle="tab"><?php echo language::translate('title_campaign_products', 'Campaign Products'); ?></a></li><?php } ?>
      </ul>
    <div class="tab-content">
      <?php if ($display_campaign_products) { ?>
    <div class="tab-pane fade in" id="campaign-products">
      <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_campaign_products.inc.php'); ?>
    </div>
      <?php } ?>
    <div class="tab-pane fade in" id="popular-products">
      <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_popular_products.inc.php'); ?>
    </div>
    <div class="tab-pane fade in" id="latest-products">
      <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_latest_products.inc.php'); ?>
    </div>
  </div>
  </div>
</div>
</main>