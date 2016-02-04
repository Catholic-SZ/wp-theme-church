  <?php get_header(); ?>  <?php get_sidebar('menu'); ?>    <section>      <div class="container">        <div class="row">          <div class="col-xs-12">            <p><em class="glyphicon glyphicon-book color"></em>原来世界上的一切：肉身的贪欲，眼目的贪欲，以及人生的骄奢，都不是出于父，而是出于世界。这世界和他的贪欲都要过去，但那履行天主旨意的，却永远存在。(若壹2：16、17)</p>          </div>        </div>      </div>    </section>    <section>      <div class="container">        <div class="row">              <div class="col-xs-12">            <div id="index-carousel" class="carousel slide" data-ride="carousel">              <ol class="carousel-indicators">                <li data-target="#index-carousel" data-slide-to="0" class="active"></li>              </ol>              <div class="carousel-inner" role="listbox">                    <div class="item active">                    <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/core/church3.jpg" />                   <div class="carousel-caption">                    <h3>天主教深圳圣安多尼堂</h3>                  </div>                </div>              </div>              <a class="left carousel-control" href="#index-carousel" role="button" data-slide="prev">                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>                <span class="sr-only">Previous</span>              </a>              <a class="right carousel-control" href="#index-carousel" role="button" data-slide="next">                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>                <span class="sr-only">Next</span>              </a>            </div>          </div>        </div>      </div>    </section>    <section>      <div class="container">        <div class="row">                              <div class="col-xs-12 col-md-8">            <!-- church news -->            <?php              $yourcat = get_category_by_slug('church-news');              $cat_id = $yourcat->term_id;                            if ( !empty($cat_id) ):                  $cat_name = $yourcat->name;                  $cat_links = get_category_link($cat_id);                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;                  $args = array(                      'cat'           => $cat_id,                      'showposts'     => 4,                      'orderby'       => 'date',                      'order'         => 'DESC'                  );                  $posts = query_posts($args);                  $post = $posts[0];            ?>            <div class="widget-container widget-pic boxed">              <div class="widget-title">                <h4><?php echo $cat_name; ?></h4>                <a href="<?php echo $cat_links; ?>" class="more">更多</a>              </div>              <div class="widget-content content-border">                <div class="col-xs-12 col-md-6">                  <div class="pic-box">                    <?php                     if ( has_post_thumbnail() ) { ?>                     <?php the_post_thumbnail( array(400, 300) ); ?>                    <?php } else {?>                       <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/default.jpg" />                     <?php } ?>                     <div class="caption">                      <a href="<?php the_permalink() ?>"><?php the_title() ?></a>                    </div>                    <hr class="featurette-divider">                    <div>                      <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180,"···");  ?>                    </div>                  </div>                </div>                                                <div class="col-xs-12 col-md-6">                  <hr class="visible-xs-inline-block featurette-divider">                  <ul class="media-list">                      <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>                          <li class="media">                              <div class="media-left">                                <a href="<?php the_permalink() ?>">                                  <?php the_post_thumbnail( array(100, 75) ); ?>                                </a>                                                                </div>                              <div class="media-body">                                <div class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>                                <div class="media-summary font-filter">                                   <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 50,"···");  ?>                                </div>                              </div>                          </li>                      <?php endforeach;?>                    </ul>                  </div>                </div>              </div>            <?php endif; wp_reset_query(); ?>                    </div>          <!--/ church news -->          <!-- church  ANN -->          <div class="col-xs-12 col-md-4">            <div class="widget-container widget-default boxed">              <div class="widget-title">                <h4>堂区公告</h4>                <a href="" class="more">更多</a>              </div>              <div class="widget-content content-border">                <p>                1、主日弥撒：</br>                   周日 09:00—10:30（中文）</br>                          14:00—15:00（英文）</br>                2、主日前夕弥撒：</br>                   周六 20:00（中文互动弥撒）</br>                3、周一至周六：07:30</br>                4、首六、首七：08:00</br>                5、明供圣体礼：周四 08:00</br>                </p>              </div>            </div>           </div>          <!--/church  ANN -->          <div class="clear"></div>        </div>      </div>    </section>    <section>      <div class="container">        <div class="row">          <!--  catholic news -->          <div class="col-xs-12 col-md-4">                      <?php              $yourcat = get_category_by_slug('catholic-news');              $cat_id = $yourcat->term_id;              if ( !empty($cat_id) ):                  $cat_name = $yourcat->name;                  $cat_links = get_category_link($cat_id);                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;                  $args = array(                      'cat'           => $cat_id,                      'showposts'     => 10,                      'orderby'       => 'date',                      'order'         => 'DESC'                  );                  $posts = query_posts($args);            ?>            <div class="widget-container widget-default boxed">              <div class="widget-title">                  <h4><?php echo $cat_name; ?></h4>                  <a href="<?php echo $cat_links; ?>" class="more">更多</a>                </div>                <ul class="widget-content content-list content-border">                    <?php                       foreach( $posts as $post ) : setup_postdata( $post );                    ?>                                      <li>                       <em class="glyphicon glyphicon-link color"></em>                       <a href="<?php the_permalink() ?>"><?php the_title() ?></a>                    </li>                    <?php endforeach; ?>                </ul>            </div>            <?php endif; wp_reset_query(); ?>                      </div>          <!--/ catholic news -->          <!-- catholic saints-->          <div class="col-xs-12 col-md-4">            <?php              $yourcat = get_category_by_slug('catholic-saints');              $cat_id = $yourcat->term_id;                            if ( !empty($cat_id) ):                  $cat_name = $yourcat->name;                  $cat_links = get_category_link($cat_id);                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;                  $args = array(                      'cat'           => $cat_id,                      'showposts'     => 10,                      'orderby'       => 'date',                      'order'         => 'DESC'                  );                  $posts = query_posts($args);            ?>            <div class="widget-container widget-default boxed">              <div class="widget-title">                  <h4><?php echo $cat_name; ?></h4>                  <a href="<?php echo $cat_links; ?>" class="more">更多</a>                </div>                <ul class="widget-content content-list content-border">                    <?php                       foreach( $posts as $post ) : setup_postdata( $post );                    ?>                                      <li>                       <em class="glyphicon glyphicon-link color"></em>                       <a href="<?php the_permalink() ?>"><?php the_title() ?></a>                    </li>                    <?php endforeach; ?>                </ul>            </div>            <?php endif; wp_reset_query(); ?>          </div>          <!--/catholic saints -->          <!-- weibo-->          <div class="col-xs-12 col-md-4">            <iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=1&ptype=1&speed=0&skin=1&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=5066044867&verifier=8b250d58&dpc=1"></iframe>          </div>          <!--/ weibo -->          <div class="clear"></div>        </div>      </div>    </section>    <section>      <div class="container">        <div class="row">          <div class="col-xs-12 col-md-12">            <?php              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;              $args = array(                  // 'cat'           => $cat_id,                  'showposts'     => 8,                  'orderby'       => 'date',                  'order'         => 'DESC'              );              $posts = query_posts($args);            ?>            <div class="widget-container widget-pic boxed">              <div class="widget-title">                <h4><a href="pic-list.html">精彩图区</a></h4>              </div>              <div class="widget-content content-border pic-list">                <?php                   foreach( $posts as $post ) : setup_postdata( $post );                    if ( has_post_thumbnail() ) {                ?>                  <div class="col-xs-12 col-sm-6 col-md-3">                    <div class="pic-box boxed-border">                      <div class="pic-caption">                        <a href="<?php the_permalink() ?>" class="pic-title"><?php the_title() ?></a>                      </div>                      <?php the_post_thumbnail('thumb-index'); ?>                                          </div>                  </div>                <?php                    }                  endforeach;                  wp_reset_query();                 ?>              </div>            </div>          </div>        </div>      </div>    </section>    <section>      <div class="container">        <div class="row">          <div class="col-xs-12 col-md-12">            <div class="widget-container widget-tags boxed">              <div class="widget-title">                <h4>常用链接</h4>                <a href="" class="more">更多</a>              </div>              <ul class="widget-content">                <li><a href="">梵蒂冈广播电台</a></li>                <li><a href="">信德网</a></li>                <li><a href="">天主教在线</a></li>                <li><a href="">光与爱之家（博客）</a></li>                <li><a href="">长青家园</a></li>                <li><a href="">小德兰爱心书屋</a></li>              </ul>            </div>          </div>        </div>      </div>    </section>    <section>      <div class="container">        <div class="row">          <div class="col-xs-12 col-md-12">            <div class="widget-container widget-tags boxed">              <div class="widget-title">                <h4>教堂/教区</h4>                <a href="" class="more">更多</a>              </div>              <ul class="widget-content">                <li><a href="">上海教区</a></li>                <li><a href="">北京教区</a></li>                <li><a href="">太原教区</a></li>                <li><a href="">温州教区</a></li>              </ul>            </div>          </div>        </div>      </div>    </section>    <hr class="featurette-divider">    <?php get_footer(); ?>