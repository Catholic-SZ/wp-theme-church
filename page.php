
<?php get_header(); ?>

<?php get_sidebar('top'); ?>

<div class="inner container">
    <div class="column-fluid"> 
        <div class="content">
            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                 <article class="post" id="post-<?php the_ID(); ?>">
                  <h1 class="page-title"><?php the_title(); ?></h1>
                  <div class="entry">
                    <?php the_content(); ?>
                  </div> 
                 </article>
            <?php endwhile; ?>
            <?php else : ?>
                <div class="post">
                    <h2><?php _e('Not Found'); ?></h2>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- /left -->
   <?php get_sidebar('left'); ?>
   <div class="clearfix"></div>
</div>

<?php get_footer(); ?>
