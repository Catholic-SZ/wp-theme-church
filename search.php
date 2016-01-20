
<?php get_header(); ?>

<?php get_sidebar('menu'); ?>

<?php get_sidebar('top'); ?>

    <section>
        <div class="container">
          	<div class="row">
              	<div class="col-xs-12 col-md-8">
	            	<?php get_template_part('content', 'search'); ?>
              	</div>
              	
				<!-- sidebar -->
				<div class="col-xs-12 col-md-4 visible-md-block visible-lg-block">

				<?php get_sidebar('right'); ?>

				</div>
				<!--/ sidebar -->
			</div>
		</div>

    </div>
  </section>

<?php get_footer(); ?>
