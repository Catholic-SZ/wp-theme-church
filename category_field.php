<?php 

    function get_select($value){
        
        $template =array(
            array('--默认--'=>''),
            array('--列表--'=>'list'),
            array('--图表--'=>'image')
        );
        
        $option='';
        
        for($i=0,$n=count($template);$i<$n;$i++){
            $selected = '';
            $item_key = key($template[$i]);
            $item_value = current($template[$i]);
            
            if(empty($value)){
                if( $i == 0 ){
                    $selected = 'selected';
                }
            }elseif($item_value == $value){
                $selected = 'selected';
            }
            
             $option = $option.'<option '.$selected.' value="'.$item_value.'">'.$item_key.'</option>'; 
        }
        
        return $option;
    }
    
    // 分类添加字段
    function ems_add_category_field(){
        echo '<div class="form-field">
                <label for="cat-template">内容显示方式</label>
                <select name="cat-template" id="cat-template">'
                    .get_select('').
                '</select>
                <p>内容显示方式.</p>
              </div>';
    }
    
    add_action('category_add_form_fields','ems_add_category_field',10,2);

    // 分类编辑字段
    //echo get_option('cat-template-'.$tag->term_id)
    function ems_edit_category_field($tag){
        
        $value = get_option('cat-template-'.$tag->term_id);
        
        echo '<tr class="form-field">
                <th scope="row"><label for="cat-template">内容显示方式</label></th>
                <td>
                    <select name="cat-template" id="cat-template">'
                       .get_select($value).
                    '</select>
                    <br>
                    <span class="cat-template">内容显示方式.</span>
                </td>
            </tr>';           
    }
    
    add_action('category_edit_form_fields','ems_edit_category_field',10,2);

    // 保存数据
    function ems_taxonomy_metadate($term_id){
        if(isset($_POST['cat-template'])){
            //判断权限--可改
            if(!current_user_can('manage_categories')){
                return $term_id;
            }
            // 模板
            $template_key = 'cat-template-'.$term_id; // key 选项名为 cat-tel-1 类型
            $template_value = $_POST['cat-template'];// value
                
            // 更新选项值
            update_option( $template_key, $template_value ); 
        }
    }

    // 虽然要两个钩子，但是我们可以两个钩子使用同一个函数
    add_action('created_category','ems_taxonomy_metadate',10,1);
    add_action('edited_category','ems_taxonomy_metadate',10,1);
?>