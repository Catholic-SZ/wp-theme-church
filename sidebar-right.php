<aside>
  <ul>
    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4>下级分类</h4>
      </div>
      <div class="widget-content">
        <p>
        主日礼仪</br>
        节日礼仪</br>
        教堂随拍</br>
        </p>
      </div>
    </li>

    <?php
      $yourcat = get_category_by_slug('catholic-saints');
      $cat_id = $yourcat->term_id;

      if ( !empty($cat_id) ):
          $cat_name = $yourcat->name;
          $cat_links = get_category_link($cat_id);
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
              'cat'           => $cat_id,
              'showposts'     => 5,
              'orderby'       => 'date',
              'order'         => 'DESC'
          );
          $posts = query_posts($args);
    ?>

    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4><?php echo $cat_name; ?></h4>
        <a href="<?php echo $cat_links; ?>" class="more">更多</a>
      </div>
      <div class="widget-content">
        <div class="bs-example" data-example-id="carousel-with-captions">
          <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-captions" data-slide-to="0"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <?php 
                foreach( $posts as $post ) : setup_postdata( $post );
              ?>
              <div class="item">
                <?php 
                if ( has_post_thumbnail() ) { ?> 
                  <?php the_post_thumbnail( array(0, 300) ); ?>
                <?php } else {?> 
                  <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/default.jpg" /> 
                <?php } ?> 

                <div class="carousel-caption">
                  <h3><?php the_title() ?></h3>
                </div>
              </div>
              <?php endforeach; ?>

            </div>
            <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div><!-- /example -->
      </div>
    </li>
    <?php endif; wp_reset_query();?>

    <?php
      $yourcat = get_category_by_slug('catholic-news');
      $cat_id = $yourcat->term_id;

      if ( !empty($cat_id) ):
          $cat_name = $yourcat->name;
          $cat_links = get_category_link($cat_id);
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
              'cat'           => $cat_id,
              'showposts'     => 5,
              'orderby'       => 'date',
              'order'         => 'DESC'
          );
          $posts = query_posts($args);
    ?>

    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4><?php echo $cat_name; ?></h4>
        <a href="<?php echo $cat_links; ?>" class="more">更多</a>
      </div>
      <ul class="widget-content content-list">

        <?php 
          foreach( $posts as $post ) : setup_postdata( $post );
        ?>
      
        <li>
          <i class="icon-caret-right"></i>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>

        <?php endforeach; ?>

      </ul>
    </li>
    <?php endif; wp_reset_query();?>

    <?php
      $yourcat = get_category_by_slug('church-news');
      $cat_id = $yourcat->term_id;

      if ( !empty($cat_id) ):
          $cat_name = $yourcat->name;
          $cat_links = get_category_link($cat_id);
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
              'cat'           => $cat_id,
              'showposts'     => 5,
              'orderby'       => 'date',
              'order'         => 'DESC'
          );
          $posts = query_posts($args);
    ?>

    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4><?php echo $cat_name; ?></h4>
        <a href="<?php echo $cat_links; ?>" class="more">更多</a>
      </div>
      <ul class="widget-content content-list">

        <?php 
          foreach( $posts as $post ) : setup_postdata( $post );
        ?>
      
        <li>
          <i class="icon-caret-right"></i>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>

        <?php endforeach; ?>
        
      </ul>
    </li>
    <?php endif; wp_reset_query();?>


  </ul>

</aside>