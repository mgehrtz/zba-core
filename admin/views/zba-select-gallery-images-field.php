<?php
if( count( $image_ids ) > 0): ?>

  <a href="#" class="button zba-upload">Add images</a>
  <input type="hidden" name="zba_options[zba_splash_image_ids][]" value="">
  <div class="gallery-wrap">

  <?php foreach ( $image_ids as $image_id ): 
    $image = wp_get_attachment_image_url( $image_id, 'medium' ); 
    if($image_id == "") continue;
    ?>

    <div class="image-wrap">
      <a href="#" class="zba-upload" data-image-id="<?= $image_id ?>">
        <div class='zba-image' style="background-image: url(<?= esc_url( $image ) ?>)"></div>
      </a>
      <a href="#" data-image-id="<?= $image_id ?>" class="zba-remove">Remove image</a>
      <input type="hidden" name="zba_options[zba_splash_image_ids][]" value="<?php echo absint( $image_id ) ?>">
    </div>

  <?php endforeach; ?>

  </div>

<?php else: ?>

  <a href="#" class="button zba-upload">Add images</a>
  <div class="gallery-wrap"></div>

<?php endif;
