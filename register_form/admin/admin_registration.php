<?php

function admin_register_menu() {
    add_menu_page('Register User', 'Register User', 'administrator', 'admin_register', 'admin_register_form', '', 1);
    add_action('admin_init', 'admin_register_option');
}
add_action('admin_menu', 'admin_register_menu');

function admin_register_option() {
    register_setting('register_group', 'register_text');
}
/*
 * Add ajax to plugin
 * 
 **/
if(is_admin()){
    add_action('wp_ajax_excute_ajaxs','excute_ajax');
    add_action('wp_ajax_nopriv_excute_ajaxs','excute_ajax');
}
function init_ajax_value(){
    wp_enqueue_script('excute_ajaxs', plugin_dir_url(__FILE__) . 'res/js/common.js', array('jquery'), null, true);
    wp_localize_script('excute_ajaxs','LoadAjax',array(
        'ajaxurl'=>  admin_url('admin-ajax.php'),
        'site_url'=>  site_url(),
        'theme_url'=>  get_bloginfo('stylesheet_directory'),
        'nonce' => wp_create_nonce('ajax_register_nonce')
    ));
}
add_action('admin_enqueue_scripts','init_ajax_value');
/*
 * Proccess Ajax when change select field type
 * Get field html from field.php file
 **/
function excute_ajax(){
    $field_type=$_REQUEST['field_type'];    
    $action=$_REQUEST['do_action'];
    switch ($action){
        case 'add_attribute':
            show_field_attribute_option($field_type);
            exit();
          break; 
        case 'add_field':
            insert_field_type();
            exit();
          break;
    }
}
/*
 * Insert form to add field attribute through ajax
 **/
function show_field_attribute_option($field_type){
    $field_html=new Field_Attribute();    
    switch ($field_type){
        case 'text':
            $field_html->field_Text();           
          break;
        case 'textarea':
            $field_html->field_Textarea();           
          break;
      case 'number':
            $field_html->field_Number();          
          break;
      case 'email':
            $field_html->field_Email();           
          break;
      case 'password':
            $field_html->field_Password();            
          break;
        case 'select':
              $field_html->field_Select();            
            break;        
      case 'checkbox':
            $field_html->field_Checkbox();           
          break;
      case 'radio':
            $field_html->field_Radio();            
          break;
      case 'datebox':
            $field_html->field_Date();           
          break;
    }
}
/*
 * Insert field to form demo
 **/
function insert_field_type(){
    $insert_field=new Field_Type();
    $field_val=$_REQUEST['field_value'];
    switch ($field_val['option']){
        case 'text':
            $insert_field->field_Text($field_val['name'], $field_val['label'], $field_val['default'], $field_val['placeholder']);
            break;
        case 'textarea':
            $insert_field->field_Textarea($field_val['name'], $field_val['label'], $field_val['default'], $field_val['placeholder'],$field_val['rows'],$field_val['cols']);
            break;
        case 'number':
            $insert_field->field_Number($field_val['name'], $field_val['label'], $field_val['default'], $field_val['placeholder']);
            break;
        case 'password':
            $insert_field->field_Password($field_val['name'], $field_val['label'], $field_val['default'], $field_val['placeholder']);
            break;
        case 'email':
            $insert_field->field_Email($field_val['name'], $field_val['label'], $field_val['default'], $field_val['placeholder']);
            break;
        case 'select':
            $insert_field->field_Select($field_val['name'], $field_val['label'], $field_val['select'], $field_val['select_multiple']);
            break;
        case 'checkbox':
            $insert_field->field_Checkbox($field_val['name'], $field_val['label'], $field_val['select'], $field_val['layout']);
            break;
        case 'radio':
            $insert_field->field_Radio($field_val['name'], $field_val['label'], $field_val['select'], $field_val['layout']);
            break;
        case 'datebox':
            $insert_field->field_Date($field_val['name'], $field_val['label']);
            break;
        case 'image':
            $insert_field->field_Image($field_val['name'], $field_val['label']);
            break;
    }
}

function admin_register_form() {
    echo '<h3>Wellcom  to register form</h3>';
    
    ?>
    <form method="post" action="optios.php">
    <?php settings_fields('register_group'); ?>
        <table class="form-table" width="100%" border="1" bgcolor="#fff">
            <tr valign="top">
                <td width="40%">
                    <h3>Edit Field Group</h3>
                    <div class="top-option-field">
                        <div class="field-register">
                            <span class="label">Field type:</span>
                            <select name="field_option" width="100%" class="field-option">
                                <option value=""> --Select field type-- </option>
                                <option value="text">Text</option>
                                <option value="textarea">Text Area</option>
                                <option value="number">Number</option>
                                <option value="email">Email</option>
                                <option value="password">Password</option>
                                <option value="image">Image</option>
                                <option value="select">Select</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radio">Radio</option>
                                <option value="datebox">Date box</option>                         
                            </select>
                        </div>
                        <div class="field-register">
                            <span class="label">Field label:</span>
                            <input type="text" name="field_label" />
                        </div>
                        <div class="field-register">
                            <span class="label">Field name:</span>
                            <input type="text" name="field_name" />
                        </div>                       
                       
                    </div>
                    <div class="edit-field"></div>
                    <div class="field-register">
                            <span class="label">Required ?:</span>
                            <input type="radio" name="field_required" value="yes" />Yes
                            <input type="radio" name="field_required" value="no" checked="checked" />No
                    </div>
                    <div class="field-button">
                        <button type="button" id="add_field">Add</button>
                    </div>
                </td>
                <td width="60%" class="field-demo">
                    <div class="main-field-demo">                        
                    </div>
                    <div class="button-save">
                        <button type="button">Save</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <?php
}
