
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
                    <span class="subtitle">06/11/2015 19:08 梵蒂冈广播电台</span>

                    <hr class="featurette-divider">
                    <div class="widget-content"> 
                      <?php the_content(); ?>
                    </div>

                    

                    <div class="widget-container widget-tags boxed">
                      <ul class="widget-content">
                          <li><i class="icon-tags icon-large"></i></li>
                          <li><a href="#">教宗方济各</a></li>
                          <li><a href="#">清晨弥撒</a></li>
                          <li><a href="#">圣玛尔大之家</a></li>                    
                      </ul>
                    </div>

                  </div>
                </article>
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
