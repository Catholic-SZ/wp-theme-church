<aside>
  <ul>
    <?php 
        if(is_category() || is_single()) {
            
            if(is_category()){
                $cat = get_query_var('cat');
                $yourcat = get_category($cat);             
            }else if(is_single()){
                $yourcat = get_the_category();
                $yourcat = $yourcat[0];
            }
            
            $cat_id = $yourcat->term_id;
            
            $cat_root = get_category_root($yourcat);
            $root_id = $cat_root->term_id;
            $root_name = $cat_root->name;
            
            $args = array(
            'show_option_all'       => '', //不列出分类链接
            'orderby'               => 'name', //按照分类名排序
            'order'                 => 'ASC', //升序排列
            'show_last_update'      => 0, //不显示分类中日志的最新时间戳
            'style'                 => 'list',//列表显示分类
            'show_count'            => 0, //不显示分类日志数量
            'hide_empty'            => 1, //不显示没有日志的分类
            'use_desc_for_title'    => 1, //显示分类描述
            'child_of'              => $root_id,
            'current_category'      => $cat_id,
            'feed'                  => '', //不显示feed
            'feed_image'            => '', //不显示feed图片
            'exclude'               => '', //不显示该分类
            'hierarchical'          => true, //分层次显示父/子分类
            'title_li'              => '<div class="widget-title"><h4>'.$root_name.'</h4></div>', //用“Categories”为当前分类列表的标题
            'echo'                  => 1, //显示(echos) 分类
            'depth'                 => 0
            );
    
            wp_list_categories( $args );
            wp_reset_query(); 
        }
        
        if(is_page()){
            
            $page_root = get_page_root($post);
            $root_id = $page_root->ID;
            $root_name = $page_root->post_title;
            
            $args = array(      
            'depth'       => 0,      
            'show_date'   => '',      
            'date_format' => get_option('date_format'),      
            'child_of'    => $root_id,      
            'exclude'     => '',      
            'title_li'    => '<div class="widget-title"><h4>'.$root_name.'</h4></div>',
            'echo'        => 1,      
            'authors'     => '',      
            'sort_column' => 'menu_order, post_title',      
            'link_before' => '',      
            'link_after'  => '',      
            'exclude_tree'=> '' );
            
            wp_list_pages( $args );
            wp_reset_query();
        }
        
    ?>

    <?php
      $yourcat = get_category_by_slug('catholic-saints');
      $cat_id = $yourcat->term_id;

      if ( !empty($cat_id) ):
          $cat_name = $yourcat->name;
          $cat_links = get_category_link($cat_id);
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
              'cat'           => $cat_id,
              'showposts'     => 5,
              'orderby'       => 'date',
              'order'         => 'DESC'
          );
          $posts = query_posts($args);
          $size = sizeof($posts);
    ?>

    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4><?php echo $cat_name; ?></h4>
        <a href="<?php echo $cat_links; ?>" class="more">更多</a>
      </div>
      <div class="widget-content">
        <div id="carousel-saints" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php for($i=0;$i<$size;$i++) { 
              if($i == 0){ ?>
                <li data-target="#carousel-saints" data-slide-to="0" class="active"></li>
            <?php  }else{ ?>
                <li data-target="#carousel-saints" data-slide-to="<?php echo $i ?>"></li>
            <?php  } } ?>
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php
              $j = 0;
              foreach( $posts as $post ) : setup_postdata( $post );
              if($j == 0){ ?>
                <div class="item active">
              <?php  }else{ ?>
                <div class="item">
              <?php  } ?>

              <img class="img-responsive" src="<?php echo get_bloginfo("template_url") ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=300&w=340&q=90&zc=1&ct=1&a=t" alt="<?php the_title(); ?>" />

              <div class="carousel-caption">
                <h3><?php the_title() ?></h3>
              </div>
            </div>
            <?php $j++; endforeach; ?>

          </div>
          <a class="left carousel-control" href="#carousel-saints" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-saints" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </li>
    <?php endif; wp_reset_query();?>

    <?php
      $yourcat = get_category_by_slug('catholic-news');
      $cat_id = $yourcat->term_id;

      if ( !empty($cat_id) ):
          $cat_name = $yourcat->name;
          $cat_links = get_category_link($cat_id);
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
              'cat'           => $cat_id,
              'showposts'     => 5,
              'orderby'       => 'date',
              'order'         => 'DESC'
          );
          $posts = query_posts($args);
    ?>

    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4><?php echo $cat_name; ?></h4>
        <a href="<?php echo $cat_links; ?>" class="more">更多</a>
      </div>
      <ul class="widget-content content-list">

        <?php 
          foreach( $posts as $post ) : setup_postdata( $post );
        ?>
      
        <li>
          <em class="glyphicon glyphicon-link color"></em>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>

        <?php endforeach; ?>

      </ul>
    </li>
    <?php endif; wp_reset_query();?>

    <?php
      $yourcat = get_category_by_slug('church-news');
      $cat_id = $yourcat->term_id;

      if ( !empty($cat_id) ):
          $cat_name = $yourcat->name;
          $cat_links = get_category_link($cat_id);
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
              'cat'           => $cat_id,
              'showposts'     => 5,
              'orderby'       => 'date',
              'order'         => 'DESC'
          );
          $posts = query_posts($args);
    ?>

    <li class="widget-container widget-sidebar boxed">
      <div class="widget-title">
        <h4><?php echo $cat_name; ?></h4>
        <a href="<?php echo $cat_links; ?>" class="more">更多</a>
      </div>
      <ul class="widget-content content-list">

        <?php 
          foreach( $posts as $post ) : setup_postdata( $post );
        ?>
      
        <li>
          <em class="glyphicon glyphicon-link color"></em>
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </li>

        <?php endforeach; ?>
        
      </ul>
    </li>
    <?php endif; wp_reset_query();?>
    
    <li>
      <iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=1&ptype=1&speed=0&skin=1&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=5066044867&verifier=8b250d58&dpc=1"></iframe>
    </li>


  </ul>

</aside>