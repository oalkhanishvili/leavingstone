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
                <i class="fa fa-table"></i> დღის დახურვა
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
<p><?php echo $links;?></p>
<div class="table-responsive">

    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>ბანკიდან მოსული შეტყობინება</th>
                <th>თარიღი</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if ( !empty($day_log) ):
            foreach ( $day_log as $item ): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['respond']; ?></td>
                <td><?php echo $item['time']; ?></td>          
            </tr>
        <?php endforeach;
        endif; ?>
        </tbody>
    </table>
</div>
<p><?php echo $links;?></p>
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->-