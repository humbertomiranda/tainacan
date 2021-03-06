<script>
    $(function () {
        set_title_valid();
        set_description_valid();
        set_source_valid();
        set_thumbnail_valid();
        set_tags_valid();
    });
    //validando o titulo
    function set_title_valid(){
        var val =  $('#object_name').val();
        if($('#core_validation_title').length>0){
            if(val!==''){
                $('#core_validation_title').val('true');
                validate_all_fields_fixed();
                set_field_valid_fixed('title', 'core_validation_title');
            }
            
            $('#object_name').keyup(function(){
                if($(this).val()==''){
                    $('#core_validation_title').val('false');
                    set_field_valid_fixed('title', 'core_validation_title');
                    validate_all_fields_fixed();
                }else{
                    $('#core_validation_title').val('true');
                    set_field_valid_fixed('title', 'core_validation_title');
                    validate_all_fields_fixed(); 
                }
            });
        }
    }
    //conteudo
    function set_content_valid(){
        var editor  = CKEDITOR.instances.object_editor;
        if(editor&&editor.getData()){
           var val = editor.getData();
        }else{
           var val = '' 
        }
        if($('#core_validation_content').length>0){
            if(val!==''){
                $('#core_validation_content').val('true');
                validate_all_fields_fixed();
                set_field_valid_fixed('content', 'core_validation_content');
            }
            editor.on('key', function() {
               var result = editor.getData();
               if(result==''){
                    $('#core_validation_content').val('false');
                    set_field_valid_fixed('content', 'core_validation_content');
                    validate_all_fields_fixed();
                }else{
                    $('#core_validation_content').val('true');
                    set_field_valid_fixed('content', 'core_validation_content');
                    validate_all_fields(); 
                }
            });
        }
    }
    //validacao de anexos
    function set_attachments_valid(count){
        if($('#core_validation_attachments').length>0){
            if(count>0){
                $('#core_validation_attachments').val('true');
                validate_all_fields_fixed();
                set_field_valid_fixed('attachments', 'core_validation_attachments');
            }
            
            if(count==0){
                 $('#core_validation_attachments').val('false');
                 set_field_valid_fixed('attachments', 'core_validation_attachments');
                 validate_all_fields_fixed();
             }else{
                 $('#core_validation_attachments').val('true');
                 set_field_valid_fixed('attachments', 'core_validation_attachments');
                 validate_all_fields_fixed(); 
             }
        }
    }
    //descricao
    function set_description_valid(){
        var val =  $('#object_description_example').val();
        if($('#core_validation_description').length>0){
            if(val!==''){
                $('#core_validation_description').val('true');
                validate_all_fields_fixed();
                set_field_valid_fixed('description', 'core_validation_description');
            }
            
            $('#object_description_example').keyup(function(){
                if($(this).val()==''){
                    $('#core_validation_description').val('false');
                    set_field_valid_fixed('description', 'core_validation_description');
                    validate_all_fields_fixed();
                }else{
                    $('#core_validation_description').val('true');
                    set_field_valid_fixed('description', 'core_validation_description');
                    validate_all_fields_fixed(); 
                }
            });
        }
    }
    //fonte
    function set_source_valid(){
        var val =  $('#object_source').val();
        if($('#core_validation_source').length>0){
            if(val!==''){
                $('#core_validation_source').val('true');
                validate_all_fields_fixed();
                set_field_valid_fixed('source', 'core_validation_source');
            }
            
            $('#object_source').keyup(function(){
                if($(this).val()==''){
                    $('#core_validation_source').val('false');
                    set_field_valid_fixed('source', 'core_validation_source');
                    validate_all_fields_fixed();
                }else{
                    $('#core_validation_source').val('true');
                    set_field_valid_fixed('source', 'core_validation_source');
                    validate_all_fields_fixed(); 
                }
            });
        }
    }
    //tags
    function set_tags_valid(){
        var val =  $('#object_tags').val();
        if($('#core_validation_tags').length>0){
            if(val!==''){
                $('#core_validation_tags').val('true');
                validate_all_fields_fixed();
                set_field_valid_fixed('tags', 'core_validation_tags');
            }
            
            $('#object_tags').keyup(function(){
                if($(this).val()==''){
                    $('#core_validation_tags').val('false');
                    set_field_valid_fixed('tags', 'core_validation_tags');
                    validate_all_fields_fixed();
                }else{
                    $('#core_validation_tags').val('true');
                    set_field_valid_fixed('tags', 'core_validation_tags');
                    validate_all_fields_fixed(); 
                }
            });
        }
    }
    //miniatura
    function set_thumbnail_valid(){
        var val =  $('#object_thumbnail').val();
        if($('#core_validation_thumbnail').length>0){
            if(val!==''){
                $('#core_validation_thumbnail').val('true');
                validate_all_fields();
                set_field_valid_fixed('thumbnail', 'core_validation_thumbnail');
            }
            $('#object_thumbnail').change(function(){
                if($(this).val()==''){
                    $('#core_validation_thumbnail').val('false');
                    set_field_valid_fixed('thumbnail', 'core_validation_thumbnail');
                    validate_all_fields_fixed();
                }else{
                    $('#core_validation_thumbnail').val('true');
                    set_field_valid_fixed('thumbnail', 'core_validation_thumbnail');
                    validate_all_fields_fixed(); 
                }
            });
        }
    }
    
    function validate_all_fields_fixed(){
        var cont = 0;
        $( ".core_validation").each(function( index ) {
            if($( this ).val()==='false'){
                cont++;
            }
        });
        if(cont===0){
            $('#submit_container').show();
            $('#submit_container_message').hide();
        }else{
            $('#submit_container').hide();
            $('#submit_container_message').show();
        }
    }
    
     function set_field_valid_fixed(id,seletor){
        if($('#'+seletor).val()==='false'){
            $('#core_validation_'+id).val('false');
            $('#ok_field_'+id).hide();
            $('#required_field_'+id).show();
        }else{
            $('#core_validation_'+id).val('true');
            $('#ok_field_'+id).show();
            $('#required_field_'+id).hide();
            if(!$.isNumeric(id) && $('#fixed_id_'+id).length > 0){
                var id =  $('#fixed_id_'+id).val();
            }
            $('#meta-item-'+id+' h2').css('background-color','#fffff');
        }
        validate_all_fields_fixed();
    }
</script>
