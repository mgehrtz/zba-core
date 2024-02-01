<div class="splash-nav-sidebar-wrapper">
    <div class="nav-inner-wrap">

    <?php foreach ( $image_ids as $index => $image_id ): 
      $image_url = wp_get_attachment_image_url( $image_id, 'medium' );
      if( ! $image_url ) continue;
      $active_class = ($index == 0) ? 'active' : '';
    ?>
      <div class="image-nav-button <?= $active_class ?>" style="background-image: url(<?= $image_url ?>)" data-image-id="<?= intval( $image_id ) ?>" data-src="<?= wp_get_attachment_image_url( $image_id, 'full' ) ?>"></div>
    <?php endforeach; ?>

    </div>

</div>