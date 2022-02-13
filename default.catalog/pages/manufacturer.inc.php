<div id="sidebar">
  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_manufacturer_links.inc.php'); ?>
</div>

<div id="content">
  {snippet:notices}

  <article id="box-manufacturer" class="box">
    <?php if ($products) { ?>
    <div class="dropdown pull-right">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Sort by <i class="fa fa-angle-down"></i>
      </button>

      <ul class="dropdown-menu">
<?php
  foreach ($sort_alternatives as $key => $value) {
    if ($_GET['sort'] == $key) {
      echo '<li><a href="#" class="active">'. $value .'</a></li>';
    } else {
      echo '<li><a href="'. document::href_ilink(null, array('sort' => $key), true) .'">'. $value .'</a></li>';
    }
  }
?>
      </ul>
    </div>
    <?php } ?>

    <h1 class="title"><?php echo $title; ?></h1>

    <?php if ($products) { ?>
    <section class="listing products">
      <?php foreach ($products as $product) echo functions::draw_listing_product($product, 'column', array('manufacturer_id')); ?>
    </section>
    <?php } ?>

    <?php echo $pagination; ?>
  </article>
</div>