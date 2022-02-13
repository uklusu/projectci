<?php 
  document::$layout = 'index';
?>

<div id="content">
  {snippet:notices}
  
  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_categories.inc.php'); ?>  

  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_campaign_products.inc.php'); ?>

  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_popular_products.inc.php'); ?>

  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_latest_products.inc.php'); ?>

</div>
