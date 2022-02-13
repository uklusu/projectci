<article class="category" data-id="<?php echo $category_id; ?>" data-name="<?php echo htmlspecialchars($name); ?>">
  <a class="link" href="<?php echo htmlspecialchars($link); ?>">
    <img class="img-responsive" src="<?php echo document::href_link(WS_DIR_APP . $image['thumbnail']); ?>" alt="" />

    <div class="caption">
      <h3><?php echo $name; ?></h3>
    </div>
  </a>
</article>