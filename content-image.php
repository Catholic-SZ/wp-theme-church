
<h2 class="cur-title">
    <a title="<?php single_cat_title(); ?>">
    <?php single_cat_title(); ?>
    </a>
</h2> 
<ul class="piclist">
    <?php 
    foreach( $posts as $post ) : setup_postdata( $post );
    ?>
        <li> 
            <a href="<?php the_permalink() ?>">
                <div class="folio-thumb">
                    <div class="mediaholder">
                        <img src="<?php echo catch_the_image($post->ID); ?>" alt="<?php the_title(); ?>" class="thumb" style="width: 287px; height: 200px;">
                    </div>
                    <div class="opacity-pic">
                    </div>
                </div>
                <h3><?php the_title(); ?></h3>
            </a>
        </li>
   <?php endforeach; ?>
   
</ul> 
<div class="clearfix"></div>

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>