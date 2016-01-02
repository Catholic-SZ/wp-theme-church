
<h2 class="cur-title">
    <a title="<?php echo get_search_query(); ?>">
    <?php echo get_search_query(); ?>
    </a>
</h2> 
<ul class="postlist">
    <?php foreach( $posts as $post ) : setup_postdata( $post ); 

        $title = get_the_title();
        $keys = explode(" ", get_search_query());
        $title = preg_replace('/('.implode('|', $keys) .')/iu',
        '<strong class="search-excerpt">\0</strong>',
        $title);
        
    ?>
        <li>
            <a href="<?php the_permalink() ?>" title="?php the_title(); ?>"><?php echo $title; ?></a>
            <span><?php the_time('Y-m-d') ?></span> 
        </li>
   <?php endforeach;?>
</ul> 

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>