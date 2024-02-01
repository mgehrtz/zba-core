<div class='main-wrapper'>
  <h1>ZBA Options</h1>
  <hr>
  <form action="options.php" method="post">
    <?php 
    settings_fields( 'zba_core' );
    do_settings_sections( 'zba-home-carousel' );
    submit_button( 'Save Gallery' );
    ?>
  </form>
</div>
