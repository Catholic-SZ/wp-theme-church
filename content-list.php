<ul class="media-list">

    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

        <li class="media">
            <div class="media-left">
                <?php the_post_thumbnail( array(100, 100) ); ?>
            </div>
            <div class="media-body">
              <span class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
              <span class="media-summary hidden-xs">
                <?php the_excerpt() ?>
                 <!-- echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"···");  -->
              </span>
              <span class="visible-xs-block"><?php the_time('Y-m-d') ?></span>
            </div>
        </li>

    <?php endforeach;?>
</ul>

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>