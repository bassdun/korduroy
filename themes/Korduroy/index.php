<?php get_header(); ?>
<?php load_template(TEMPLATEPATH . '/partials/blog-sub-nav.php'); ?>

<div id="body" class="blog-page blog-index-page">
  <section class="main" role="main">

    <div class="content-container">
      <aside class="aside-container">
        <nav class="aside-navigation">
          <h2>Categories</h2>
          <ul class="aside-navigation-list">
            <li class="current-cat"><a href="<?php echo site_url(); ?>/blog">All</a></li>
            <?php wp_list_categories(array('hide_empty' => 0, 'title_li' => __(''))); ?>
          </ul>
        </nav>
      </aside>

      <div class="blog-posts-container">
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
      </div>

      <?php load_template(TEMPLATEPATH . '/partials/pagination.php'); ?>
    </div>

  </section>
</div>

<?php get_footer(); ?>