$(document).ready(function(){
  function addZero(i) {
      if (i < 10) {
          i = "0" + i;
      }
      return i;
  }
  function submitForm(obj,formName){
    var tr = obj.closest('tr');
    var td = tr.find('.progress-date');
    var button = obj.find('.glyphicon');
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear().toString().substr(2,2);
    var hour = addZero(date.getHours());
    var minute = addZero(date.getMinutes());
    if ( formName == 'project_shesruleba' ){
      var status = tr.find('.progress-status');
    }
    $.post( obj.attr('action'), obj.serialize(), function(resp) {
        tr.toggleClass('success');
        var value = tr.find('input[name=done]').attr("value")
        if(value == 1) {
            tr.find('input[name=done]').attr("value", 0);
            button.removeClass('glyphicon-unchecked').addClass('glyphicon-check');
            td.text(day+'/'+month+'/'+year+'-> '+hour+':'+minute);
            if ( formName == 'project_shesruleba' ) status.text('დასრულებულია');

        }
        else if (value == 0) {
            tr.find('input[name=done]').attr("value", 1);
            button.removeClass('glyphicon-check').addClass('glyphicon-unchecked');
            td.text('პროცესში');
            if ( formName == 'project_shesruleba' ) status.text('პროცესშია');
        }
    });
  }
  $('body').on('submit', 'form.shesruleba', function(e) {
      e.preventDefault();
      submitForm($(this), 'shesruleba');
  });
  $('body').on('submit', 'form.project_shesruleba', function(e) {
      e.preventDefault();
      submitForm($(this), 'project_shesruleba');
  });
  $('body').on('submit', 'form.form-inline', function(e) {
      e.preventDefault();
      $.post( $(this).attr('action'), $(this).serialize(), function(resp) {
        if ( resp.status ){
          $('ul.commentList').append(resp.html).scrollTop(9999999);
          $('.form-control').val('');
        }else{
          alert('ველი ცარიელია');
        }
      },'json');
  });


//file uploader
  var user_id = $('input[name="user_id"]').val();
  var task_id = $('input[name="task_id"]').val();
  var uploader = new plupload.Uploader({
      runtimes : 'gears,html5,flash,silverlight,browserplus',
      max_file_size : '20mb',
      browse_button: 'browse', // this can be an id of a DOM element or the DOM element itself
      url: '../../file_upload/',
      multipart_params :{
        'user_id': user_id,
        'task_id': task_id
      }
  });



  uploader.init();

  uploader.bind('FilesAdded', function(up, files,object) {
      var html = '';
      plupload.each(files, function(file) {
          html = '<li class="upload_status" id="' + file.id + '">ფაილი:' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
      });
      document.getElementById('filelist').innerHTML = html;
  });
  uploader.bind('FileUploaded', function(upldr, file, object) {
      var myData;
      try {
          myData = eval(object.response);
      } catch(err) {
          myData = eval('(' + object.response + ')');
      }
      if (myData.OK){
        $('ul.commentList').append(myData.html).scrollTop(9999999);
      }else{
        alert('ფაილი არ აიტვირთა');
        console.log(myData.error);
      }
  });
  uploader.bind('UploadProgress', function(up, file) {
      document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";

    $('ul.commentList').scrollTop(9999999);
  });

  uploader.bind('Error', function(up, err) {
      document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
  });

  document.getElementById('start-upload').onclick = function() {
      uploader.start();
  };
  $('.commenterImage p').tooltip();
  $('.btn.btn-default').tooltip();
});
