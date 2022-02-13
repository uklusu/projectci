<div id="sidebar" class="hidden-xs">
  <div id="column-left">
    <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_customer_service_links.inc.php'); ?>
  </div>
</div>

<div id="content">
  {snippet:notices}

  <section id="box-customer-service" class="box">
    <?php echo $content; ?>
  </section>

</div>