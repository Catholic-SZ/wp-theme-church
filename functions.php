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
        
        global $paged, $wp_query;    
        if ( !$max_page ) {
            $max_page = $wp_query->max_num_pages;
        }    
        if($max_page > 1){
            if(!$paged){
                $paged = 1;
            }    
            if($paged != 1){
                echo '<a href="' . get_pagenum_link(1) . '" class="extend" title="跳转到首页">|<</a>';
            }
            
            //echo '<a class="previous" href="'.previous_posts_link().'" title="上一页"><</a>';
            previous_posts_link('<');
            
            if ( empty( $range ) ) $range = get_option('posts_per_page');
            if($max_page > $range){    
                if($paged < $range){
                    for($i = 1; $i <= ($range + 1); $i++){
                        echo '<a href="' . get_pagenum_link($i) .'"';    
                        if($i==$paged)echo ' class="current"';echo '>$i</a>';
                    }
                }elseif($paged >= ($max_page - ceil(($range/2)))){    
                    for($i = $max_page - $range; $i <= $max_page; $i++){
                        echo '<a href="' . get_pagenum_link($i) .'"';    
                        if($i==$paged)echo ' class="current"';echo '>$i</a>';
                    }
                }elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){    
                    for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                        echo '<a href="' . get_pagenum_link($i) .'"';if($i==$paged) echo ' class="current"';echo '>$i</a>';
                    }
                }
            } else{
                for($i = 1; $i <= $max_page; $i++){
                    echo '<a href="' . get_pagenum_link($i) .'"';    
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
            
            //echo '<a class="next" href="'.next_posts_link().'" title="下一页">></a>';
            next_posts_link('>');
            if($paged != $max_page){
                echo '<a href="' . get_pagenum_link($max_page) . '" class="extend" title="跳转到最后一页">>|</a>';
            }
        } 
    }

    add_theme_support('post-thumbnails');

    // set_post_thumbnail_size( 100, 100, true ); // 305 pixels wide by 380 pixels tall, set last parameter to true for hard crop mode 
    // add_image_size( 'one', 155, 110, true ); // Set thumbnail size 
    // add_image_size( 'two', 350, 248, true ); // Set thumbnail size 
    // add_image_size( 'big', 546, 387, true ); // Set thumbnail size 
        
    function catch_the_image( $id ) {
        
        $first_img = "/images/wordpress.png";
               
        if ( empty($id) ){
            return $first_img;
        }
        
        $post_imags = get_post($id);

        // 如果设置了缩略图
        $post_thumbnail_id = get_post_thumbnail_id( $id );
        if ( $post_thumbnail_id ) {
            $output = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
            $first_img = $output[0];
        }else {
            ob_start();
            ob_end_clean();
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_imags->post_content, $matches);
            $first_img = $matches [1] [0];
        }

        return $first_img;
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
            echo '<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="' . $home . '">' . $name . '</a></li>' . $delimiter;
 
            if ( is_category() ) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, $delimiter));
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
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, $delimiter);
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
?>