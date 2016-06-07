jQuery(document).ready(function ($) {
    
    /*
     * Ajax proccess get fields attribute when change select fields  
     **/
    $('.field-option').on('change',function(){      
        var field_type=$(this).val();
        $.post(
            LoadAjax.ajaxurl,
            {
                action:'excute_ajaxs',
                do_action:'add_attribute',
                field_type:field_type                        
            },
            function(response){
              if(response!=''){
                  $('.edit-field').html(response);
              }  
            }        
        );
    });
    /*
     * Ajax when click button add field 
     * 
     */
    $('#add_field').on('click',function(){       
        var field_label=$('input[name=field_label]').val();
        var field_name=$('input[name=field_name]').val();
        var field_default=$('input[name=field_default]').val();
        var field_option=$('[name=field_option]').val();
        var field_placeholder=$('input[name=field_placeholder]').val();
        var field_rows=$('input[name=field_rows]').val();
        var field_cols=$('input[name=field_cols]').val();
        var field_required=$('input[name=field_required]').val();
        var field_select=$('#field_select').val();
        var field_select_multiple=$('input[name=field_select_multiple]:checked').val();       
        var field_layout=$('input[name=field_layout]').val();
        var field_format=$('input[name=field_format]').val();
        
        var field_value={
            'label':field_label,
            'name':field_name,
            'default':field_default,
            'option':field_option,
            'placeholder':field_placeholder,
            'rows':field_rows,
            'cols':field_cols,
            'required':field_required,
            'select':field_select,
            'select_multiple':field_select_multiple,
            'layout':field_layout,
            'format':field_format            
        };
        $.post(
            LoadAjax.ajaxurl,
            {
                action:'excute_ajaxs',
                do_action:'add_field',
                field_value:field_value
            },
            function(response){
                if(response){
                    $('.main-field-demo').append(response);
                }
            }        
        )
            
        
    });
            
});
