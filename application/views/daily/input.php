<html lang="en-US">  
  <head>  
    <title>Daily Notes</title>  
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
    <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
    <script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>  
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>  
    <meta charset="UTF-8">  
    <style>  
        body { font-size: 75%; }  
        label, input { display:block; }  
        input.text { margin-bottom:12px; width:95%; padding: .4em; }  
        h1 { font-size: 1.2em; margin: .6em 0; }  
        a{text-decoration:none;}  
        {font-size:60%};  
    </style>  
    <script>  
    $(function() {  
   
        $( "#dialog:ui-dialog" ).dialog( "destroy" );  
   
        $( "#dialog-confirm" ).dialog({  
            autoOpen: false,  
            resizable: false,  
            height:140,  
            modal: true,  
            hide: 'Slide',  
            buttons: {  
                "Delete": function() {  
                    var del_id = {id : $("#del_id").val()};  
                    $.ajax({  
                        type: "POST",  
                        url : "<?php echo site_url('daily/delete')?>",  
                        data: del_id,  
                        success: function(msg){  
                            $('#show').html(msg);  
                            $('#dialog-confirm' ).dialog( "close" );  
                            //$( ".selector" ).dialog( "option", "hide", 'slide' );  
                        }  
                    });  
   
                    },  
                Cancel: function() {  
                    $( this ).dialog( "close" );  
                }  
            }  
        });  
   
        $( "#form_input" ).dialog({  
            autoOpen: false,  
            height: 300,  
            width: 350,  
            modal: false,  
            hide: 'Slide',  
            buttons: {  
                "Add": function() {  
                    var form_data = {  
                        id: $('#id').val(),  
                        amanati: $('#amanati').val(),  
                        kodi: $('#kodi').val(),  
                        saxeli: $('#saxeli').val(),  
                        ajax:1  
                    };  
   
                    $('#amanati').attr("disabled",true);  
                    $('#kodi').attr("disabled",true);  
                    $('#saxeli').attr("disabled",true);  
   
                  $.ajax({  
                    url : "<?php echo site_url('daily/submit')?>",  
                    type : 'POST',  
                    data : form_data,  
                    success: function(msg){  
                    $('#show').html(msg),  
                    $('#amanati').val(''),  
                    $('#id').val(''),  
                    $('#kodi').val(''),  
                    $('#saxeli').val(''),  
                    $('#amanati').attr("disabled",false);  
                    $('#kodi').attr("disabled",false);  
                    $('#saxeli').attr("disabled",false);  
                    $( '#form_input' ).dialog( "close" )  
                    }  
                  });  
   
            },  
                Cancel: function() {  
                    $('#id').val(''),  
                    $('#name').val('');  
                    $('#amount').val('');  
                    $( this ).dialog( "close" );  
                }  
            },  
            close: function() {  
                $('#id').val(''),  
                $('#name').val('');  
                $('#amount').val('');  
            }  
        });  
   
    $( "#create-daily" )  
            .button()  
            .click(function() {  
                $( "#form_input" ).dialog( "open" );  
            });  
    });  
   
    $(".edit").live("click",function(){  
        var id = $(this).attr("id");  
        var date = $(this).attr("amanati");  
        var name = $(this).attr("kodi");  
        var amount = $(this).attr("saxeli");  
   
        $('#id').val(id);  
        $('#amanati').val(date);  
        $('#kodi').val(name);  
        $('#saxeli').val(amount);  
   
        $( "#form_input" ).dialog( "open" );  
   
        return false;  
    });  
   
    $(".delbutton").live("click",function(){  
        var element = $(this);  
        var del_id = element.attr("id");  
        var info = 'id=' + del_id;  
        $('#del_id').val(del_id);  
        $( "#dialog-confirm" ).dialog( "open" );  
   
        return false;  
    });  
    </script>  
   
  </head>  
   
  <body>  
    <div id="show">  
        <?php $this->load->view('daily/show'); ?>  
    </div>  
    <p>  
        <button id="create-daily">Input New</button>  
    </p>  
   
<div id="form_input">  
      <table>  
        <?php echo form_open('daily/submit'); ?>  
        <input type="hidden" value='' id="id" name="id">  
        <tr >  
            <td> <?php echo form_label('Date : '); ?></td>  
            <td> <?php echo form_input('amanati','','id="amanati"'); ?></td>  
        </tr>  
        <tr>  
            <td> <?php echo form_label('Name : ');?> </td>  
            <td> <?php echo form_input('kodi','','id="kodi"'); ?></td>  
        </tr>  
        <tr>  
            <td> <?php echo form_label('Amount : ');?> </td>  
            <td> <?php echo form_input('saxeli','','id="saxeli"'); ?></td>  
        </tr>  
      </table>  
    </div>  
   
    <div id="dialog-confirm" title="Delete Item ?">  
    <p>  
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>  
        <input type="hidden" value='' id="del_id" name="del_id">  
        Are you sure?</p>  
</div>  
   
  </body>  
</html>  