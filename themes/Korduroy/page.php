<?php get_header(); ?>

<nav id="ktv-sub-nav">
  <h1 class="sub-nav-heading extend-full">Korduroy.TV <?php wp_title("", true); ?></h1>
  <span class="separator-container">
    <hr class="horizontal-stitch" />
  </span>
</nav>

<div id="body" class="default-page">
  <section class="main" role="main">
    <div class="page-content">
      <?php while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>
