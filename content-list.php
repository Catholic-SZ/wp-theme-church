<ul class="media-list">

    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

        <li class="media">
            <div class="media-left">
              <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail( array(200, 120) ); ?>
              </a>
                
            </div>
            <div class="media-body">
              <span class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
              <span class="media-summary hidden-xs">
                 <!-- the_excerpt()  -->
                 <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"···");  ?>
              </span>
              <span class="media-meta">
                <span><i class="icon-calendar"></i> <?php the_time('Y-m-d') ?></span>
                <span><i class="icon-eye-open"></i> <?php if(function_exists('the_views')) { the_views(); } ?></span>
                <span><i class="icon-comments"></i> 2,678</span>
              </span>
              <a class="btn btn-default btn-sm hidden-xs" href="<?php the_permalink() ?>" role="button">阅读更多</a>
            </div>
        </li>

    <?php endforeach;?>
</ul>

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>