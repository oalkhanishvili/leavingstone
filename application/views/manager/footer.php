    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery-2.1.4.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('js/plugins/morris/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/plugins/morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/plugins/morris/morris-data.js'); ?>"></script>
    <script src="<?php echo base_url('js/tableExport.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.base64.js'); ?>"></script>
    <script src="<?php echo base_url('js/app.js'); ?>"></script>

    <script type="text/javascript">
    function confirm_delete() {
    confirm("დარწმუნებული ხართ რომ წაშლა გინდათ?");
    }
// var plant = document.getElementById('taken');
// var id = plant.getAttribute('data-id');
// $('#'+id).on('click', function(){
//     console.log( $( this ).attr('data-id') );
//     alert('deklaracia');
// });

    $('body').on('submit', 'form.gatana', function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $.post( $(this).attr('action'), $(this).serialize(), function(resp) {
            tr.toggleClass('success');
            var value = tr.find('input[name=taken]').attr("value")
            if(value == 1) {
                tr.find('input[name=taken]').attr("value", 0);
            }
            else if (value == 0) {
                tr.find('input[name=taken]').attr("value", 1);
            }

            if ( resp == 'ok' ) {
                alert('დეკლარაცია შევსებულია');
            }
        });
    });

        $('.curency').on('submit', function(e){
            e.preventDefault();
            $.post($(this).attr('action'), $(this).serialize(), function(resp){
                if ( resp ){
                    alert('ჩანაწერი დამახსოვრებულია');
                    console.log(resp);
                }
            });
        });

</script>
</body>
</html>
