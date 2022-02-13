<div id="cart">
    
  <a href="<?php echo htmlspecialchars($link); ?>">
      <?php echo $num_items ? $num_items : ''; ?> Product
    <br>  <?php echo $cart_total; ?>
    <img class="image" src="{snippet:template_path}images/<?php echo !empty($num_items) ? 'cart_filled.svg' : 'cart.svg'; ?>" alt="" />
    <div class="badge quantity"><?php echo $num_items ? $num_items : ''; ?></div>
  </a>
</div>