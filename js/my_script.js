//paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
//end jquery loading gif 


$('input[name="is_company"]').click(function(){
	$('.show-me').css('display',($(this).val()==='1')?'block':'none');
});
/*javascript parcel tabs*/
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
/*END-javascript parcel tabs*/
$('#exampleModal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget); // Button that triggered the modal
  var item = button.data('item');
  var webpage = button.data('webpage');
  var price = button.data('price');
  var id = button.data('id');

  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.form-item input#dec_item').val(item);
  modal.find('.form-webpage input#dec_webpage').val(webpage);
  modal.find('.form-price input#dec_price').val(price);
  modal.find('input#parcel_id').val(id);
  var link=modal.find('.modal-body form').attr('action');
  var numerInString = link.match(/\d+/);
   var newname ="";
  if(numerInString != null)
  {

     newname = link.substr(0,link.lastIndexOf("/")+1)+id;
  } 
  else{

  	newname  =  link+"/"+id;
  }
 
  modal.find('.modal-body form').attr('action', newname);

$('#decForm').on('submit', function(e) {
    e.preventDefault();
    $.post( $(this).attr('action'), $(this).serialize(), function(resp) {
      if ( resp == 'ok' ) {
        alert('დეკლარაცია შევსებულია');
        $( '#'+id ).removeClass( "glyphicon glyphicon-info-sign" ).addClass( "glyphicon glyphicon-ok-sign" );

      }
    });
  });

});
// 
$('#gadaxda').on('submit',function(e){
  e.preventDefault();
  $.post($(this).attr('action'),$(this).serialize(),function(resp){
    if ( resp == true ){
    alert('გადახდა წარმატებით განხორციელდა');
    $('input:checked').before('<img src="http://tsexpress.ge/images/payed.png" height="20"/>');
    $('input:checked').remove();
    }else{
      alert('ანგარიშზე არ გაქვთ საკმარისი თანხა')
      $('input:checked').parents('tr').css('background-color','red');
    }
  });
});
// ამანათების პანელი შავი ინფო ჰოვერი
$(function () {
  $('[data-toggle="modal"]').tooltip()
})
//END

// function convertacia(){
// 	var chinuri = document.convert.chinuri.value.replace(",",".");
// 	if(chinuri > 0){
    
// 		document.convert.lari.value = moculoba(chinuri * 0.39);
// 	}	
// }



function vcona(){
var length = document.mnishvneloba.length.value.replace(",",".");
var width = document.mnishvneloba.width.value.replace(",",".");
var height = document.mnishvneloba.height.value.replace(",",".");

if(length > 0 && width > 0 && height > 0){
document.mnishvneloba.price.value = moculoba((length * width * height)/6000)+' კგ';
}}




function moculoba(num) {
	var result = Math.round(num*Math.pow(10,2))/Math.pow(10,2);
	return result;
}



var rate = new Object();
    rate['CNY'] = param/10;
    rate['GEL'] = 1;
    rate['EUR'] = 2;
    rate['GBP'] = 3.514;
    
    
    var CNY = rate['CNY'];
    var EUR = rate['EUR'];
    var GBP = rate['GBP'];
    var GEL = rate['GEL'];
    
    var rate = new Array(1/CNY, 1/GEL, 1/GBP, 1/EUR);
    
    function currency_convert(origin)
    {
        var origin_value = eval('document.currency.c' + origin + '.value');
        
        if(true)
        {
            var euro_equivalent = rate[origin];
            var v;
            for (i=0; i < rate.length; i++)
            {
                if (i != origin)
                {
                    v = Math.round(rate[i]*origin_value/euro_equivalent * 100) / 100;
                    eval('document.currency.c'+i+'.value = '+v);
                }
            }
        }
        else
        {
            eval('document.currency.c' + origin + '.value = 0');
            currency_convert(origin);
            alert("Wrong Data");
        }
        return true;
    }
function confirm_delete() {
    confirm("დარწმუნებული ხართ რომ წაშლა გინდათ?");
}
//bootstrap hove info
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})