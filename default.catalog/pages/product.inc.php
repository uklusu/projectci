<div id="content">
  {snippet:notices}

  <?php include vmod::check(FS_DIR_TEMPLATE . 'views/box_product.inc.php'); ?>

  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_similar_products.inc.php'); ?>

  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_also_purchased_products.inc.php'); ?>
</div>