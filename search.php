
<?php get_header(); ?>

<?php get_sidebar('top'); ?>

<div class="inner container"> 
    <div class="column-fluid"> 
        <div class="content">
       
        <?php get_template_part('content', 'search'); ?>
            
        </div> 
    </div>

    <?php get_sidebar('left'); ?>
    <div class="clearfix"></div> 
</div>

<?php get_footer(); ?>