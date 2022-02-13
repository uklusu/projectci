<section id="box-slides" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<?php
  foreach ($slides as $key => $slide) {
    echo '<div class="item'. (($key == 0) ? ' active' : '') .'">' . PHP_EOL;

    if ($slide['link']) {
      echo '<a href="'. htmlspecialchars($slide['link']) .'">' . PHP_EOL;
    }
    echo '<img src="'. document::href_link($slide['image']) .'" alt="" />' . PHP_EOL;
    if (!empty($slide['caption'])) {
      echo '<div class="container"><div class="carousel-caption">'. $slide['caption'] .'</div></div>' . PHP_EOL;
    }
    if ($slide['link']) {
      echo '</a>' . PHP_EOL;
    }
    echo '</div>' . PHP_EOL;
  }
?>
  </div>
  <?php if (count($slides) > 1) { ?>
  <ol class="carousel-indicators">
    <?php foreach ($slides as $key => $slide) echo '<li data-target="#box-slides" data-slide-to="'.  $key .'"'. (($key == 0) ? ' class="active"' : '') .'></li>'; ?>
  </ol>
  <a class="left carousel-control" href="#box-slides" data-slide="prev">
    <span class="icon-prev"><i class="fa fa-arrow-left" style="font-size:50px;"></i></span>
  </a>
  <a class="right carousel-control" href="#box-slides" data-slide="next">
    <span class="icon-next"><i class=" fa fa-arrow-right" style="font-size:50px;"></i></span>
  </a>
  <?php } ?>
</section>
