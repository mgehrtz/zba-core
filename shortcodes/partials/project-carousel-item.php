<div class="project">
  <a href="<?= get_the_permalink( $project ) ?>" class="link-wrap" alt="View <?= $project->post_title ?>">
    <div class="project-image" style="background-image: url(<?= $project_img ?>)"></div>
    <div class="hover-overlay" style="opacity: 0">
      <div class="hover-color"></div>
      <span><?= $project->post_title ?></span>
    </div>
  </a>
  <p class="project-title"><?= $project->post_title ?></p>
</div>