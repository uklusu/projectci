







<footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container contact_us">
                            <h3><?php echo language::translate('title_categories', 'Categories'); ?></h3>
                             <ul class="list-unstyled">
        <?php foreach ($categories as $category) echo '<li><a href="'. htmlspecialchars($category['link']) .'">'. $category['name'] .'</a></li>' . PHP_EOL; ?>
      </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3><?php echo language::translate('title_manufacturers', 'Manufacturers'); ?></h3>
                            <div class="footer_menu">
                                 <ul class="list-unstyled">
      <?php foreach ($manufacturers as $manufacturer) echo '<li><a href="'. htmlspecialchars($manufacturer['link']) .'">'. $manufacturer['name'] .'</a></li>' . PHP_EOL; ?>
      </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="widgets_container widget_app">
                            <div class="footer_logo">
                                <a href="index.html"><img src="https://woocommercewebshop.hu/images/logotype.png" alt=""></a>
                            </div>
                            <div class="footer_widgetnav_menu">
                                <ul>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Internet</a></li>
                                </ul>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="footer_app">
                                <ul>
                                    <li><a href="#"><img src="https://electric.litecart.hu/images/banners/icon-app.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="https://electric.litecart.hu/images/banners/icon1-app.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3><?php echo language::translate('title_account', 'Account'); ?></h3>
                            <div class="footer_menu">
                                <ul class="list-unstyled">
        <li><a href="<?php echo document::href_ilink('customer_service'); ?>"><?php echo language::translate('title_customer_service', 'Customer Service'); ?></a></li>
        <li><a href="<?php echo document::href_ilink('regional_settings'); ?>"><?php echo language::translate('title_regional_settings', 'Regional Settings'); ?></a></li>
        <?php if (empty(customer::$data['id'])) { ?>
        <li><a href="<?php echo document::href_ilink('create_account'); ?>"><?php echo language::translate('title_create_account', 'Create Account'); ?></a></li>
        <li><a href="<?php echo document::href_ilink('login'); ?>"><?php echo language::translate('title_login', 'Login'); ?></a></li>
        <?php } else { ?>
        <li><a href="<?php echo document::href_ilink('order_history'); ?>"><?php echo language::translate('title_order_history', 'Order History'); ?></a></li>
        <li><a href="<?php echo document::href_ilink('edit_account'); ?>"><?php echo language::translate('title_edit_account', 'Edit Account'); ?></a></li>
        <li><a href="<?php echo document::href_ilink('logout'); ?>"><?php echo language::translate('title_logout', 'Logout'); ?></a></li>
        <?php } ?>
      </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3><?php echo language::translate('title_information', 'Information'); ?></h3>
                            <div class="footer_menu">
                                <ul class="list-unstyled">
        <?php foreach ($pages as $page) echo '<li><a href="'. htmlspecialchars($page['link']) .'">'. $page['title'] .'</a></li>' . PHP_EOL; ?>
      </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_bottom">
           <!-- LiteCart is provided free under license CC BY-ND 4.0 - https://creativecommons.org/licenses/by-nd/4.0/. Removing the link back to litecart.net without permission is a violation - https://www.litecart.net/addons/172/removal-of-attribution-link -->
				Copyright &copy; <?php echo date('Y'); ?> <?php echo settings::get('store_name'); ?>. All rights reserved &middot; Powered by <a href="https://www.litecart.net" target="_blank" title="Free e-commerce platform">LiteCart</a>
        </div>
    </footer>
