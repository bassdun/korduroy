<?php get_header(); ?>
<?php load_template(TEMPLATEPATH . '/partials/blog-sub-nav.php'); ?>

<div id="body" class="blog-page blog-archives-page">
  <section class="main" role="main">

    <div class="content-container">

      <aside class="aside-container">
        <nav class="aside-navigation">
          <h2>Categories</h2>
          <ul>
            <li class="current">All</li>
            <?php wp_list_categories(array('hide_empty' => 0,'title_li' => __(''))); ?>
          </ul>
        </nav>
      </aside>

      <div class="blog-posts-container">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="blog-post">
              <h1 class="blog-post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
              <div class="blog-post-thumbnail">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
              </div>
              <div class="blog-post-content">
                <?php the_content('READ MORE...');?>
                <footer class="blog-post-footer">
                  <span class="blog-post-date">Posted on <?php the_time('F jS, Y') ?></span>
                </footer>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <h1>Nothing found</h1>
        <?php endif; ?>
      </div>

      <?php load_template(TEMPLATEPATH . '/partials/pagination.php'); ?>

    </div>
  </section>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
