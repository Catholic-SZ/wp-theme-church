<ul class="media-list">

    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

        <li class="media">
            <div class="media-left">
              <a href="<?php the_permalink() ?>">
                <img class="img-responsive img-thumbnail" src="<?php echo get_bloginfo("template_url") ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=100&w=150&q=90&zc=1&ct=1&a=t" alt="<?php the_title(); ?>" />
              </a>
                
            </div>
            <div class="media-body">
              <span class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
              <span class="media-summary font-filter hidden-xs">
                 <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 140,"···");  ?>
              </span>
              <span class="media-meta">
                <span><em class="glyphicon glyphicon-time color"></em><?php the_time('Y-m-d H:i'); ?></span>
                <span><em class="glyphicon glyphicon-comment color"></em>
                  <a href="<?php get_comments_link() ?>">
                    <?php echo get_comments_number('0', '1', '%'); ?>
                  </a>
                </span>
              </span>
              <a class="btn btn-default btn-sm hidden-xs" href="<?php the_permalink() ?>" role="button">阅读更多</a>
            </div>
        </li>

        <hr class="featurette-divider">

    <?php endforeach;?>
</ul>

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>