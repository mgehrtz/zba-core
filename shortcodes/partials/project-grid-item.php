<a href="<?= get_the_permalink( $project ) ?>" class="project" alt="View <?= $project->post_title ?>" style="background-image: url(<?= $project_img ?>)">
  <div class="hover-overlay" style="opacity: 0">
    <div class="hover-color"></div>
    <span><?= $project->post_title ?></span>
  </div>
</a>