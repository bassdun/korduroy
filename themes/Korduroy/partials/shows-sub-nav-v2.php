<nav id="ktv-sub-nav" class="horizontal-sub-nav">
  <div class="heading-container">
    <h2 class="sub-nav-heading">Shows 2!</h2>
  </div>
  <div class="list-container">
    <ul class="shows-sub-nav-list">
      <li class="cat-item">
        <a href="#">Recent</a>
      </li>
      <li class="cat-item">
        <a href="#">Most Viewed</a>
      </li>
      <li class="cat-item">
        <a href="#">Favorites</a>
      </li>
    </ul>
    <div class="drop-down-list-container">
      <ul class="drop-down-list" data-state="closed">
        Korduroy Channels
        <?php wp_list_categories(array(
      'taxonomy' => 'show_category',
        'hide_empty' => 0,
        'title_li' => '',
        'orderby' => 'count',
        'order' => 'DESC'
        )); ?>
      </ul>
    </div>
    <div class="drop-down-list-container">
      <ul class="drop-down-list" data-state="open">
        Film Makers
        <li class="cat-item">
          <a href="#">Cyrus Sutton</a>
        </li>
        <li class="cat-item">
          <a href="#">Ed Derman</a>
        </li>
        <li class="cat-item">
          <a href="#">Reis Paluso</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="separator-container">
    <hr class="horizontal-stitch" />
  </div>
</nav>