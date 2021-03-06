<?php
/*
Template Name: About-The Crew
*/
?>

<?php get_header(); ?>
<?php get_template_part('partials/about-sub-nav'); ?>

<div id="body" class="about-page about-the-crew-page">
  <section class="main" role="main">
    <div class="the-crew">
      <?php if(get_field('crew_member')): ?>
        <?php while(has_sub_field('crew_member')): ?>
          <div class="crew-member">
            <div class="crew-member-photo">
              <img src="<?php the_sub_field('photo'); ?>" title="<?php the_sub_field('name'); ?>" class="image-border" alt="<?php the_sub_field('name'); ?>" />
            </div>
            <div class="crew-member-info">
              <div class="member-name"><?php the_sub_field('name'); ?></div>
              <div class="member-position"><?php the_sub_field('position'); ?></div>
              <div class="member-desc"><?php the_sub_field('description'); ?></div>
            </div>
          </div>
          <hr class="horizontal-separator-light" />
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </section>
</div>
<?php get_footer(); ?>
