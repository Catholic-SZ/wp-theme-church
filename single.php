
<?php get_header(); ?>

<?php get_sidebar('menu'); ?>

<?php get_sidebar('top'); ?>

    <section>
        <div class="container">
          <div class="row">
              <!-- content -->
              <div class="col-xs-12 col-md-8">
                <article class="post">
                  
                  <div class="widget-container widget-article boxed boxed-border">

                  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                    
                    <h3 class="text-center"><?php the_title(); ?></h3>
                    <h6 class="text-center sub-title">
                      <span><em class="glyphicon glyphicon-time color"></em><?php the_time('Y-m-d') ?></span>
                      <span><em class="glyphicon glyphicon-user color"></em><?php the_author(); ?></span>
                      <span><em class="glyphicon glyphicon-folder-open color"></em></i><?php the_category(',');?></span>
                      <span><em class="glyphicon glyphicon-comment color"></em>2,678</span>
                    </h6>

                    <hr class="featurette-divider">
                    <div class="widget-content"> 
                      <?php the_content(); ?>
                    </div>

                    <div class="widget-container widget-tags boxed">
                      <ul class="widget-content">
                          <li><em class="glyphicon glyphicon-tags color"></em></li>
                          <?php the_tags( '<li>', '', '</li>' ); ?>       
                      </ul>
                    </div>

                  </div>
                </article>
                上一篇：<?php previous_post_link(); ?><br/>
                下一篇：<?php next_post_link(); ?>
              </div>
              <!--/ content -->

              <!-- sidebar -->
              <div class="col-xs-12 col-md-4 visible-md-block visible-lg-block">

                <?php get_sidebar('right'); ?>

              </div>
              <!--/ sidebar -->

        <?php endwhile; ?>
        <?php else : ?>
            <div class="post">
                <h2><?php _e('Not Found'); ?></h2>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
