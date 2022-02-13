<style>
	#box-contact-us {
		margin-top: 0;
		margin-bottom: 0;
		padding: 0;
	}
</style>

<section id="box-contact-us" class="box">

  <div>

    <h1><?php echo language::translate('title_contact_us', 'Contact Us'); ?></h1>

    <?php echo functions::form_draw_form_begin('contact_form', 'post'); ?>

      <div class="form-group">
        <label><?php echo language::translate('title_name', 'Name'); ?></label>
        <?php echo functions::form_draw_text_field('name', true, 'required="required"'); ?>
      </div>

      <div class="form-group">
        <label><?php echo language::translate('title_email_address', 'Email Address'); ?></label>
        <?php echo functions::form_draw_email_field('email', true, 'required="required"'); ?>
      </div>

      <div class="form-group">
        <label><?php echo language::translate('title_subject', 'Subject'); ?></label>
        <?php echo functions::form_draw_text_field('subject', true, 'required="required"'); ?>
      </div>

      <div class="form-group">
        <label><?php echo language::translate('title_message', 'Message'); ?></label>
        <?php echo functions::form_draw_textarea('message', true, 'required="required" style="height: 250px;"'); ?>
      </div>

      <?php if (settings::get('captcha_enabled')) { ?>
      <div class="row">
        <div class="form-group col-md-6">
          <label><?php echo language::translate('title_captcha', 'CAPTCHA'); ?></label>
          <?php echo functions::form_draw_captcha_field('captcha', 'contact_us', 'required="required"'); ?>
        </div>
      </div>
      <?php } ?>

      <p><?php echo functions::form_draw_button('send', language::translate('title_send', 'Send'), 'submit', 'style="font-weight: bold;"'); ?></p>

    <?php echo functions::form_draw_form_end(); ?>
  </div>
	
	<hr>

  <div class="contact-info">

    <?php if (settings::get('store_visiting_address')) { ?><p class="address"><?php echo functions::draw_fonticon('fa-map-marker'); ?> <a href="#"><?php echo settings::get('store_visiting_address'); ?></a></p><?php } ?>

    <?php if (settings::get('store_phone')) { ?><p class="phone"><?php echo functions::draw_fonticon('fa-phone'); ?> <a href="tel:<?php echo settings::get('store_phone'); ?>"><?php echo settings::get('store_phone'); ?></a></p><?php } ?>

    <p class="email"><?php echo functions::draw_fonticon('fa-envelope'); ?> <a href="mailto:<?php echo settings::get('store_email'); ?>"><?php echo settings::get('store_email'); ?></a></p>
  </div>

</section>