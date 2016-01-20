
<div class="widget-container widget-search boxed boxed-border">

    <ul class="widget-content content-list">
        <?php if(have_posts()) : ?>
            <?php foreach( $posts as $post ) : setup_postdata( $post ); 

                $title = get_the_title();
                $keys = explode(" ", get_search_query());
                $title = preg_replace('/('.implode('|', $keys) .')/iu',
                    '<strong class="search-excerpt">\0</strong>', $title);

            ?>

            <li>
                <em class="glyphicon glyphicon-link color"></em>
                <a href="<?php the_permalink() ?>"><?php echo $title; ?></a>
            </li>

            <?php endforeach; ?>
        <?php else : ?>
            <div class="post">
                <h2><?php _e('Not Found'); ?></h2>
            </div>
        <?php endif; ?>

    </ul>

    <div class="wpagenavi">
        <?php par_pagenavi(''); ?>
    </div>
</div>
