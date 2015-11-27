// $('body').on('submit', 'form#add_task', function(e) {
//       e.preventDefault();
//       $.ajax({
//   			url : $(this).attr('action'),
//   			secureuri :false,
//   			fileElementId	:'userfile',
//   			dataType : 'json',
//   			data : $(this).serialize(),
//   			success	: function (data, status)
//   			{
//   				console.log(data);
//   			}
//   		});
//   		return false;
//     });
$('body').on('submit', 'form.shesruleba', function(e) {
    e.preventDefault();
    var tr = $(this).closest('tr');
    $.post( $(this).attr('action'), $(this).serialize(), function(resp) {
        tr.toggleClass('success');
        var value = tr.find('input[name=done]').attr("value")
        if(value == 1) {
            tr.find('input[name=done]').attr("value", 0);
        }
        else if (value == 0) {
            tr.find('input[name=done]').attr("value", 1);
        }

        if ( resp == 'ok' ) {
            alert('დეკლარაცია შევსებულია');
        }
    });
});
$('body').on('submit', 'form.form-inline', function(e) {
    e.preventDefault();
    $.post( $(this).attr('action'), $(this).serialize(), function(resp) {
        $('ul.commentList').append(resp);
    },'json');
});
