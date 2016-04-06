    <section class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="topbar-date">
              <span class="hidden-xs"><?php echo date("Y年m月d日");?></span>
              <!--
              将临期-->
            </div>
            <div class="topbar-social">
              <wb:follow-button uid="5066044867" type="red_2" width="136" height="24" ></wb:follow-button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- navbar begin
    =========================================================-->
    <nav class="navbar navbar-default">
      <div class="navbar-inner">
        <div class="container">          

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
              <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="img-responsive" alt="天主教深圳圣安多尼堂"/>

            </a>
          </div>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-navbar-collapse-1">
            <?php
              wp_nav_menu( array(
              'theme_location' => 'header-menu',
              'container' => '',
              'menu_class' => 'nav navbar-nav',
              'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
              'before' => '',
              'after' => '',
              'walker' => new wp_bootstrap_navwalker())
              );
            ?>
            <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="搜索" name="s" id="s" >
              </div>
            </form>

          </div>
        </div>

      </div>
    </nav
