<section class="drawer drawer--left" id="drawer-name-left" data-drawer-target>
  <div class="drawer__overlay" data-drawer-close tabindex="-1"></div>
  <div class="drawer__wrapper">
    <div class="drawer__header">
      <div class="drawer__title">
        <a class="logotype" href="<?php echo document::href_ilink(''); ?>">
          <img src="<?php echo document::href_link('images/logotype.png'); ?>" style="height:25px" alt="<?php echo settings::get('store_name'); ?>" title="<?php echo settings::get('store_name'); ?>" />
        </a>
      </div>
      <i class="icon-close drawer__close" data-drawer-close></i>
    </div>
		
		<div class="drawer__search">
		<?php include vmod::check(FS_DIR_TEMPLATE . 'views/box_search.inc.php'); ?>
		</div>
		
    <div class="drawer__content">    
    
      <nav class="main-nav">
        <?php if ($categories) { ?>
        <ul style="padding:0">
          <?php foreach ($categories as $item) { ?>
          <li><a href="<?php echo htmlspecialchars($item['link']); ?>"><?php echo $item['title']; ?></a></li>
          <?php } ?>
        </ul>
        <?php } ?>             
      </nav>
      
      <div class="drawer-bottom">
        <a class="btn btn-success btn-lg" href="<?php echo document::href_ilink('login'); ?>"><i class="icon-user"></i> Login/Create Account</a>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin ante massa, eget ornare libero porta congue.<p>
        <div class="social-connect">
          <a href="#" title=""><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a>
          <a href="#" title=""><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a>
          <a href="#" title=""><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-youtube-play fa-stack-1x"></i></span></a>
          <a href="#" title=""><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x"></i></span></a>
        </div>
      </div>
      
    </div>
  </div>
</section>