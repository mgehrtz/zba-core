<?php
if($atts['style'] === 'default'): ?>

<div class="single-type-wrapper" style="background-image: url(<?= $image_url ?>)">
  <a href="/projects?project_type=<?= $project_type->slug ?>"><?= $project_type->name ?></a>
</div>

<?php
elseif ($atts['style'] === 'minimal'): ?>

<button class="single-type-button <?php if( $project_type->name === 'All' ) echo 'active' ?>" data-project-type="<?= $project_type->term_id ?>"><?= $project_type->name ?></button>

<?php
endif;