<div class="team-member">
  <a href="<?= get_permalink( $team_member ) ?>" alt="View bio for <?= get_the_title( $team_member ) ?>" class="headshot" style="background-image: url(<?= get_the_post_thumbnail_url( $team_member, 'large' ) ?>)"></a>
  <h4 class="name"><?= get_the_title( $team_member ) ?></h4>
  <p class="title"><?= get_field( 'job_title', $team_member ) ?></p>
</div>