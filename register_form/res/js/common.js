jQuery(document).ready(function ($) {
            //====Ajax        
             $('.thanh_toan').on('change',function(){
                 //console.log('select');
                var value=$(this).val();
                    $.post(
                        LoadAjax.ajaxurl,
                        {
                            action: 'do-ajax-jobs',
                            dieu_kien:value,
                            nonce: LoadAjax.nonce
                        },
                    function(response) {
                        if(response!=0)
                        {   
                            //$('#dieu_3').val(response);
                            //tinymce.init({selector:'textarea'});
                            tinyMCE.activeEditor.setContent(response);
                         }
                         //console.log(response);   
                    }
                );
            });
            $('.field-option').on('change',function(){
                var field_type=$(this).val();
                $.post(
                    LoadAjax.ajaxurl,
                    {
                        action:'excute_ajaxs',
                        field_type:field_type                        
                    },
                    function(response){
                      if(response!=''){
                          $('.edit-field').html(field_type);
                      }  
                    }        
                );
            });
            
});
