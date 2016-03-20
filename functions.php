<?php

    add_theme_support( 'nav-menus' );
    
    require_once( dirname(__FILE__).'/category_field.php' );

    if(function_exists('register_nav_menus')){
        register_nav_menus( array( 
            'header-menu' => __( '导航自定义菜单' ), 
            'footer-menu' => __( '页脚自定义菜单' ), 
            'sider-menu' => __('侧边栏菜单') 
        ) ); 
    }
    
    if ( function_exists('register_sidebar') )
        register_sidebar(array(
            'name' => 'Widgetized Area',
            'id'   => 'widgetized-area',
            'description'   => 'This is a widgetized area.',
            'before_widget' => '<li id="%1$s" class="widget_%2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
    ));

    function par_pagenavi($range){   
        if ( is_singular() ) return;  
        global $wp_query, $paged;  
        $max_page = $wp_query->max_num_pages;  
        if ( $max_page == 1 ) return;  
        if ( empty( $paged ) ) $paged = 1;
        
        if ( !$max_page ) {
            $max_page = $wp_query->max_num_pages;
        }
        if($max_page > 1){
            echo '<ul class="pagination">';

            if(!$paged){
                $paged = 1;
            }

            if($paged != 1){
                echo '<li>';
                echo '<a href="';
                echo get_pagenum_link(1);
                echo '"">首页</a>';
                echo '</li>';
            }
            
            //echo '<a class="previous" href="'.previous_posts_link().'" title="上一页"><</a>';
            //previous_posts_link('<');

            echo '<li class="previous">';
            echo previous_posts_link('上一页');
            echo '</li>';
            
            for($i = 1; $i <= $max_page; $i++){
                if($i==$paged) {
                    echo '<li class="active"><span>';
                    echo $i;
                    echo '<span class="sr-only">(current)</span></span></li>';
                } else {
                    echo '<li><a href="';
                    echo get_pagenum_link($i);
                    echo '">';
                    echo  $i;
                    echo '</a></li>';
                }
            }
            
            //next_posts_link('>');

            echo '<li class="next">';
            echo next_posts_link('下一页');
            echo '</li>';

            if($paged != $max_page){
                echo '<li>';
                echo '<a href="';
                echo get_pagenum_link($max_page);
                echo '"">末页</a>';
                echo '</li>';
            }

            echo '</ul>';
        } 
    }   
    
    function Uazoh_remove_help_tabs($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
    }
    add_filter('contextual_help', 'Uazoh_remove_help_tabs', 10, 3 );
            

    function dimox_breadcrumbs() {
 
        // $delimiter = '<i>&nbsp;</i>';
        $delimiter = '';
        $name = '首页'; //text for the 'Home' link
        $currentBefore = '<li class="active">';
        $currentAfter = '</li>';
 
        if ( !is_home() && !is_front_page() || is_paged() ) {
 
            echo '<ol class="breadcrumb">';
 
            global $post;
            $home = get_bloginfo('url');
            echo '<li><em class="glyphicon glyphicon-home color"></em><a href="' . $home . '">' . $name . '</a></li>' . $delimiter;
 
            if ( is_category() ) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo '<li>'.(get_category_parents($parentCat, TRUE, '</li>'));
                }

                echo $currentBefore;
                single_cat_title();
                echo $currentAfter;
         
            } elseif ( is_day() ) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter;
                echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter;
                echo $currentBefore . get_the_time('d') . $currentAfter;
         
            } elseif ( is_month() ) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter;
                echo $currentBefore . get_the_time('F') . $currentAfter;
         
            } elseif ( is_year() ) {
                echo $currentBefore . get_the_time('Y') . $currentAfter;
         
            } elseif ( is_single() ) {
                $cat = get_the_category(); 
                $cat = $cat[0];
                echo '<li>'.get_category_parents($cat, TRUE, '</li><li>');
                // echo '<li><a href="'.get_category_link( $cat ).'">'.$cat->name.'</a></li>' . $delimiter;
                echo $currentBefore;
                the_title();
                echo $currentAfter;
         
            } elseif ( is_page() && !$post->post_parent ) {
                echo $currentBefore;
                the_title();
                echo $currentAfter;
         
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id  = $page->post_parent;
            }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) echo $crumb . $delimiter;
                echo $currentBefore;
                the_title();
                echo $currentAfter;
         
            } elseif ( is_search() ) {
                echo $currentBefore . '搜索 &#39;' . get_search_query() . '&#39;' . $currentAfter;
         
            } elseif ( is_tag() ) {
                echo $currentBefore . '&#39;';
                single_tag_title();
                echo '&#39;' . $currentAfter;
         
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo $currentBefore . $userdata->display_name . $currentAfter;
         
            } elseif ( is_404() ) {
                echo $currentBefore . 'Error 404' . $currentAfter;
            }
            
            /*
            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                echo __('Page') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
            */
         
            echo '</ol>';
        }
    }
    
    function get_cat_templage($cat_id){
        
        $template = get_option('cat-template-'.$cat_id);
        
        if ( empty($template) ) $template = 'list';
        
        return $template;
    }

    function get_category_root($cat){
        $this_category = get_category($cat);
        while($this_category->category_parent){
            $this_category = get_category($this_category->category_parent); 
        }
        return $this_category;
    }
    
    function get_page_root($page){
        $this_page = get_page($page);
        while($this_page->post_parent){
            $this_page = get_page($this_page->post_parent); 
        }
        return $this_page;
    } 

    include_once('wp_bootstrap_navwalker.php');  

    add_theme_support( 'post-formats', array( 'aside', 'gallery' ,'video') );

    //This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style('css/editor-style.css');

    add_action( 'after_setup_theme', 'default_attachment_display_settings' );
    
    function default_attachment_display_settings() {   
    /*
    image_default_align：  
                        left  
                        right  
                        center  
                        none  
    image_default_link_type:  
                        file  
                        post  
                        custom  
                        none  
     
    image_default_size:  
                        thumbnail  
                        medium  
                        large  
                        full  
     
    */  
      update_option( 'image_default_align', 'center' );   
      update_option( 'image_default_link_type','file');
      update_option( 'image_default_size', 'full' );   
    } 

    function alter_the_query( $request ) {
        $dummy_query = new WP_Query();  // the query isn't run if we don't pass any query vars
        $dummy_query->parse_query( $request );

        // this is the actual manipulation; do whatever you need here
        if ( $dummy_query->is_tag())
            $request['post_type'] = array('post','product');

        return $request;
    }
    add_filter( 'request', 'alter_the_query' );


    if ( function_exists('add_theme_support') )add_theme_support('post-thumbnails');

    // set_post_thumbnail_size( 100, 100, true ); // 305 pixels wide by 380 pixels tall, set last parameter to true for hard crop mode 
    add_image_size( 'thumb-index', 400, 267, true ); // Set thumbnail size 
    add_image_size( 'thumb-list', 150, 100, true ); // Set thumbnail size 
    add_image_size( 'thumb-pic', 250, 167, true ); // Set thumbnail size 
 
    function post_thumbnail_src($size){
        global $post;
        if( has_post_thumbnail() ){
            switch($size){
                case 'thumb-index':
                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-index');
                    $post_thumbnail_src = $thumbnail_src [0];
                    break;
                case 'thumb-list':
                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-list');
                    $post_thumbnail_src = $thumbnail_src [0];
                    break;
                case 'thumb-pic':
                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-pic');
                    $post_thumbnail_src = $thumbnail_src [0];
                    break;
                default:
                    break;
            }
        } else {
            $post_thumbnail_src = ''; //如果没有缩略图获取随机图片
            ob_start();
            ob_end_clean();
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
            $post_thumbnail_src = $matches [1] [0];
            if(empty($post_thumbnail_src)){
                $random = mt_rand(1, 10);
                echo '<?php bloginfo("template_url"); ?>'.'/img/pic/'.$random.'.jpg';
            }
        }

        echo $post_thumbnail_src;
    }


?>