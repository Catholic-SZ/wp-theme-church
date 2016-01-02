<ul class="media-list">

    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

        <li class="media">
            <div class="media-left">
              <a href="img/extend/OSSROM86646_Articolo.jpg" data-lightbox="main-pic" data-title="教宗清晨弥撒：贪恋钱财的神父和主教使我感到难过">
                <img class="media-object" src="img/extend/OSSROM86646_Articolo.jpg" alt="...">
              </a>
            </div>
            <div class="media-body">
              <span class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
              <span class="media-summary hidden-xs">
              教宗方济各11月6日在圣玛尔大之家的清晨弥撒中表示，主教和司铎要克胜“双重生活”的诱惑，教会蒙召做仆役，而非“生意人”。教宗还告诫道，要警惕“贪恋钱财的趋炎附势者”，因为他们对教会的危害极大。
              </span>
              <span class="visible-xs-block"><?php the_time('Y-m-d') ?></span>
            </div>
        </li>

    <?php endforeach;?>
</ul>

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>