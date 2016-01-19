
<?php get_header(); ?>

<?php get_sidebar('menu'); ?>

<?php get_sidebar('top'); ?>

    <section>
      <div class="container">
        <div class="row">

            <div class="col-xs-12 col-md-8">
                <div class="widget-container widget-news boxed boxed-border">
                    <div class="widget-title">
                        <h4><em class="glyphicon glyphicon-th-list color"></em><?php single_cat_title(); ?></h4>
                    </div>
                    <div class="widget-content">

                    <?php
                        if(is_category()) :
                        
                        $cat = get_query_var('cat');
                        $yourcat = get_category($cat);
                        $cat_id = $yourcat->term_id;
                            
                        $limit = get_option('posts_per_page');
                        
                        if ( !empty($cat_id) ):
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'cat'       => $cat_id,
                                'paged'     => $paged,
                                'orderby'   => 'date',
                                'order'     => 'DESC'
                        );
                        $posts = query_posts($args);
                    ?>
                    
                    <?php get_template_part('content', get_cat_templage($cat_id)); ?>
                
                    <?php endif; wp_reset_postdata();?>
                    <?php endif; ?>

                    <hr class="featurette-divider">
                </div>
            </div> 
          </div>

          <!-- sidebar -->
          <div class="col-xs-12 col-md-4 visible-md-block visible-lg-block">
            <?php get_sidebar('right'); ?>
          </div>
          <!--/ sidebar -->

          <div class="clear"></div>
        </div>
      </div>

    </section>

<?php get_footer(); ?>