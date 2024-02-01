<div class="job-listing">
  <h4 class="job-title"><a href="<?= get_the_permalink( $job ) ?>"><?= get_the_title( $job ) ?></a></h4>
  <h6 class="location"><span>Location</span><?= get_field( 'location', $job ) ?></h6>
  <h6 class="job-type"><span>Job Type</span><?= get_field( 'employment_type', $job ) ?></h6>
  <div class="buttons">
    <a href="<?= get_the_permalink( $job ) ?>" class="button btn-alt description-btn">Details</a>
    <a href="<?= get_the_permalink( $job ) ?>#apply" class="button apply-btn">Apply</a>
  </div>
</div>