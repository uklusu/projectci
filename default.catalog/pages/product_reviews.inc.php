<style>
#box-reviews .review {
  position: relative;
  background: #f9f9f9;
  padding: 1em;
  margin-bottom: 1em;
}
#box-reviews .review .author {
  font-weight: bold;
}
#box-reviews .review .title {
  font-weight: bold;
  font-size: 20px;
  margin-top: 1em;
}
#box-reviews .review .product-name {
  margin-top: 0;
}
#box-reviews .info {
  position: absolute;
  top: 1em;
  right: 1em;
  width: 250px;
  text-align: right;
  font-size: 0.8em;
  line-height: 200%;
}
</style>

<aside id="sidebar">
  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_category_tree.inc.php'); ?>

  <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_recently_viewed_products.inc.php'); ?>
</aside>

<div id="content">
  {snippet:notices}

  <section id="box-reviews" class="box">

    <h1 class="title"><?php echo language::translate('title_product_reviews', 'Product Reviews'); ?></h1>

    <ul class="list-unstyled">
      <?php foreach ($reviews as $review) { ?>
      <li class="review" data-review-id="<?php echo $review['id']; ?>">

        <div class="grades"><?php echo functions::draw_rating($review['rating']); ?></div>

        <div class="title"><?php echo $review['title']; ?></div>

        <p class="quote"><?php echo nl2br($review['review']); ?></p>
        <?php if (mb_strlen($review['review']) > 6000) { ?>
         <div class="pull-left"><a href="<?php echo document::ilink('ajax/review', ['review_id' => $review['id']]); ?>" data-toggle="lightbox"><?php echo language::translate('title_read_full_review', 'Read the Full Review'); ?>&nbsp;<?php echo functions::draw_fonticon('fa-external-link'); ?></a></div>
        <?php } ?>

        <div class="info">
          <div class="product-name"><a href="<?php echo document::ilink('product', ['product_id' => $review['product_id']]); ?>" data-toggle="lightbox" data-max-width="980"><?php echo $review['product_name']; ?></a>
          <div class="author"><?php echo language::translate('title_by', 'by'); ?>&nbsp;<?php echo functions::draw_fonticon('fa-user'); ?> <?php echo $review['customer_name']; ?></div>
        </div>
      </li>
      <?php } ?>
    </ul>
  </section>
</div>
