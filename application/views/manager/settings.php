<div id="page-wrapper">
<div class="container-fluid">
<?php if (!$this->session->flashdata('message') == null): ?>
    <div class="alert alert-success" role="alert">
        <a href="#" class="alert-link">წარმატებით აიტვირთა</a>
    </div>
<?php endif; ?>
    <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ტრანსაქციები
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> პარამეტრები
            </li>
        </ol>
    </div>

</div>
<form action="<?php echo site_url('manager/transaction_search'); ?>" method="post">

<!-- ძებნის ველი -->

 </form>
<!-- //ძებნის ველი -->
<div class="row">
<div class="col-lg-12">
<h2>საბანკო დღის დახურვა</h2>
<div class="table-responsive">

        <h1 class="page-header">
            ტრანსაქციები
        </h1>
        <form class="curency" action="<?php echo site_url('manager/change_curency'); ?>" method="post">
            <input type="text" name="curency" value="<?=$curency['cur'];?>">
            <p class="help-block">1 ლარის ექვივალენტი იენთან</p>
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-right"> დამახსოვრება</span></button>
        </form>
        

</div>
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->-