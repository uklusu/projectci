<style>
#box-product-reviews .rate-now {
  width: 270px;
  display: inline-block;
}
#box-product-reviews fieldset {
  background: #f9f9f9;
  display: block;
  border: none;
  padding: 15px;
}
#box-product-reviews .rate-now input[name="rating"] { display: none; }
#box-product-reviews .rate-now input[name="rating"] ~ label {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
#box-product-reviews .rate-now input[name="rating"]:checked ~ label:before {
  content: '\f005';
  color: orange;
  transition: all .25s;
}
#box-product-reviews .rate-now input[name="rating"][value="5"]:checked ~ label:before { text-shadow: 0 0 10px orange; }
#box-product-reviews .rate-now input[name="rating"][value="1"]:checked ~ label:before { color: #F62; }
#box-product-reviews .rate-now input[name="rating"] ~ label:hover { transform: rotate(-15deg) scale(1.3); }
#box-product-reviews .rate-now input[name="rating"] ~ label:before {
  content: '\f006';
  font-family: FontAwesome;
}

#box-product-reviews .review {
  position: relative;
  margin: 15px 0;
  padding: 15px;
  background: #f9f9f9;
}
#box-product-reviews .review .rating {
  margin-bottom: 1.5em;
}
#box-product-reviews .review .vote {
  position: absolute;
  top: 3em;
  right: 1em;
}
#box-product-reviews .review .name {
  float: right;
}
#box-product-reviews .review .title {
  font-weight: bold;
  margin: 7.5px 0;
}
#box-product-reviews .review .attachment {
  width: 96px;
}
#box-product-reviews .thumbnail {
  padding: .25em;
}
#box-product-reviews .upvote, #box-product-reviews .downvote {
  color: inherit;
}
</style>

<section id="box-product-reviews">

  <div class="row">
    <div class="col-md-6">

      <h2><?php echo language::translate('title_customer_reviews', 'Customer Reviews'); ?></h2>

      <?php if (!empty($reviews)) { ?>
      <div class="reviews">
        <?php foreach ($reviews as $review) { ?>
        <div class="review" data-review-id="<?php echo $review['id']; ?>">

          <div class="vote">
            <a class="upvote" href="#"><?php echo functions::draw_fonticon('fa-thumbs-up'); ?> <span class="num-votes"><?php echo $review['upvotes']; ?></span></a>
            <a class="downvote" href="#"><?php echo functions::draw_fonticon('fa-thumbs-down'); ?> <span class="num-votes"><?php echo $review['downvotes']; ?></span></a>
          </div>

          <div class="name"><?php echo $review['customer_name']; ?></div>
          <div class="rating"><?php echo functions::draw_rating($review['rating']); ?></div>
          <div class="title"><?php echo $review['title']; ?></div>
          <div class="description"><?php echo nl2br($review['review']); ?></div>

<?php
  if (!empty($review['attachments'])) {
    echo '<div class="attachments" style="margin-top: 1em;">';
    foreach ($review['attachments'] as $attachment) {

      switch(true) {
        case (preg_match('#\.(bmp|gif|jpe?g|png)$#', $attachment['filename'])):
          echo '<div class="attachment"><a href="'. htmlspecialchars($attachment['link']) .'" class="thumbnail" data-toggle="lightbox" data-type="image"><img src="'. WS_DIR_APP . functions::image_thumbnail($attachment['attachment'], 96, 96, 'FIT_USE_WHITESPACING') .'" alt="" /></a></div>';
          break;

        case (preg_match('#\.(avi|mp4|mov)$#', $attachment['filename'])):
          echo '<div class="attachment"><a href="'. htmlspecialchars($attachment['link']) .'" class="thumbnail text-center">'. WS_DIR_APP . functions::draw_fonticon('fa-film fa-3x', 'style="padding-top: 2em;"') .'</a></div>';
          break;

        default:
          echo '<div class="attachment"><a href="'. htmlspecialchars($attachment['link']) .'" class="thumbnail text-center">'. functions::draw_fonticon('fa-paperclip fa-3x', 'style="padding-top: 2em;"') .'</a></div>';
          break;
      }
    }
    echo '</div>';
  }
?>

        </div>
        <?php } ?>
      </div>

      <?php } else { ?>
      <p><em><?php echo language::translate('title_be_first_to_post_review', 'Be the first to post a review for this product'); ?></em></p>
      <?php } ?>

    </div>

    <div class="col-md-6">

      <?php echo functions::form_draw_form_begin('rating_form', 'post', '', true); ?>

        <fieldset<?php echo empty(customer::$data['id']) ? ' disabled="disabled"' : ''; ?>>
          <h3><?php echo language::translate('title_rate_this_product', 'Rate This Product'); ?></h3>

          <?php if (empty(customer::$data['id'])) { ?>

          <div style="color: #999;"><?php echo language::translate('text_must_be_logged_in_to_rate', 'You must be logged in to rate this product'); ?></div>

          <?php } else { ?>

          <div class="form-group">
            <div class="rate-now">
              <input type="radio" id="star5" name="rating" value="5"<?php echo (@$customer_review['rating'] == 5) ? ' checked' : ''; ?>><label for="star5"></label>
              <input type="radio" id="star4" name="rating" value="4"<?php echo (@$customer_review['rating'] == 4) ? ' checked' : ''; ?>><label for="star4"></label>
              <input type="radio" id="star3" name="rating" value="3"<?php echo (@$customer_review['rating'] == 3) ? ' checked' : ''; ?>><label for="star3"></label>
              <input type="radio" id="star2" name="rating" value="2"<?php echo (@$customer_review['rating'] == 2) ? ' checked' : ''; ?>><label for="star2"></label>
              <input type="radio" id="star1" name="rating" value="1"<?php echo (@$customer_review['rating'] == 1) ? ' checked' : ''; ?>><label for="star1"></label>
            </div>
          </div>

          <div class="form-group">
            <?php echo functions::form_draw_text_field('title', !empty($customer_review['title']) ? $customer_review['title'] : true, 'placeholder="'. htmlspecialchars(language::translate('title_title', 'Title')) .'"'); ?>
          </div>

          <div class="form-group">
            <?php echo functions::form_draw_textarea('review', !empty($customer_review['review']) ? $customer_review['review'] : true, 'placeholder="'. htmlspecialchars(language::translate('title_review', 'Review')) .'"'); ?>
          </div>

          <div class="attachments">

            <div class="current-attachments">
              <?php if (!empty($_POST['attachments'])) foreach (array_keys($_POST['attachments']) as $key) { ?>
              <div class="attachment form-group">
                <label><?php echo language::translate('title_attachment', 'Attachment'); ?></label>
                <?php echo functions::form_draw_hidden_field('attachments['.$key.'][id]', true); ?>
                <div class="input-group">
                  <div class="form-control"><?php echo $_POST['attachments'][$key]['filename']; ?></div>
                  <div class="input-group-addon">
                    <a class="move-up" href="#" title="<?php echo language::translate('text_move_up', 'Move up'); ?>"><?php echo functions::draw_fonticon('fa-arrow-circle-up fa-lg', 'style="color: #3399cc;"'); ?></a>
                    <a class="move-down" href="#" title="<?php echo language::translate('text_move_down', 'Move down'); ?>"><?php echo functions::draw_fonticon('fa-arrow-circle-down fa-lg', 'style="color: #3399cc;"'); ?></a>
                    <a class="remove" href="#" title="<?php echo language::translate('title_remove', 'Remove'); ?>"><?php echo functions::draw_fonticon('fa-times-circle fa-lg', 'style="color: #cc3333;"'); ?></a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>

            <div class="new-attachments">
            </div>

            <div class="form-group">
              <p><?php echo language::translate('text_add_review_attachment', 'Add a photo to your review.'); ?></p>
              <a href="#" class="add" title="<?php echo language::translate('text_add', 'Add'); ?>"><?php echo functions::draw_fonticon('fa-plus-circle', 'style="color: #66cc66;"'); ?> <?php echo language::translate('title_add_attachment', 'Add Attachment'); ?></a>
            </div>
          </div>

          <?php if (settings::get('captcha_enabled')) { ?>
          <div class="form-group">
            <label><?php echo language::translate('title_captcha', 'CAPTCHA'); ?></label>
            <?php echo functions::form_draw_captcha_field('captcha', 'review_product', 'required="required"'); ?>
          </div>
          <?php } ?>

          <?php echo functions::form_draw_button('submit_review', language::translate('title_submit', 'Submit'), 'submit'); ?>

          <?php } ?>
        </fieldset>

      <?php echo functions::form_draw_form_end(); ?>

    </div>
  </div>
</section>

<script>
  $('.review .upvote').click(function(e){
    var review = $(this).closest('.review');
    var button = $(this);
    e.preventDefault();
    $.ajax({
       type: 'post',
       url: '<?php echo document::ilink('ajax/review'); ?>?review_id='+ $(review).data('review-id'),
       data: 'upvote=true',
       success: function(){
         $(button).find('.num-votes').text(parseInt($(button).find('.num-votes').text()) + 1);
       }
    });
  });

  $('.review .downvote').click(function(e){
    var review = $(this).closest('.review');
    var button = $(this);
    e.preventDefault();
    $.ajax({
       type: 'post',
       url: '<?php echo document::ilink('ajax/review'); ?>?review_id='+ $(review).data('review-id'),
       data: 'review_id='+ $(review).data('review-id') +'&downvote=true',
       success: function(){
         $(button).find('.num-votes').text(parseInt($(button).find('.num-votes').text()) + 1);
       }
    });
  });

  $('.attachments').on('click', '.remove', function(e) {
    e.preventDefault();
    $(this).closest('.form-group').remove();
    refreshMainImage();
  });

  $('.attachments .add').click(function(e) {
    e.preventDefault();
    var output = '<div class="attachment form-group">'
               + '  <div class="input-group">'
               + '    <?php echo functions::form_draw_file_field('new_attachments[]', 'accept=".gif,.jpg,.png"'); ?>'
               + '    <div class="input-group-addon">'
               + '      <a class="remove" href="#" title="<?php echo language::translate('title_remove', 'Remove'); ?>"><?php echo functions::draw_fonticon('fa-times-circle fa-lg', 'style="color: #cc3333;"'); ?></a>'
               + '    </div>'
               + '  </div>'
               + '</div>';
    $('.attachments .new-attachments').append(output);
  });
</script>