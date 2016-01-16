
<?php get_header(); ?>

<?php get_sidebar('menu'); ?>

<?php get_sidebar('top'); ?>


    <section>
        <div class="container">
          <div class="row">
              <div class="col-xs-12 col-md-8">
                <article class="post">
                  <!-- content -->
                  <div class="widget-container widget-article boxed boxed-border">

                  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                    
                    <h3 class="text-center"><?php the_title(); ?></h3>
                    <h6 class="text-center sub-title">
                      <span><i class="icon-calendar"></i><?php the_time('Y-m-d') ?></span>
                      <span><i class="icon-user"></i><?php the_author(); ?></span>
                      <span><i class="icon-folder-close-alt"></i><?php the_category(',');?></span>
                      <span><i class="icon-comments"></i> 2,678</span>
                    </h6>

                    <hr class="featurette-divider">
                    <div class="widget-content"> 
                      <?php the_content(); ?>
                    </div>

                    <div class="widget-container widget-tags boxed">
                      <ul class="widget-content">
                          <li><i class="icon-tags icon-large"></i></li>
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
