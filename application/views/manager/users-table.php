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
            მომხმარებლები
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> მომხმარებლები
            </li>
        </ol>
    </div>

</div>
<form action="<?php echo site_url('manager/user_search'); ?>" method="post">
<div class="row">

<div class="col-lg-12">

        <div class="well">
        <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="ჩაწერეთ ძიება აქ...">

        <span class="input-group-btn">
        <button class="btn btn-default" type="submit">ძებნა!</button>
        </span>
        </div>
       <p class="help_block"><b>შესაძლებელია მოიძებნოს შემდეგი პარამეტრებით: </b>
       [სახელი და გვარი][ელ.მისამართი]</p>

    </div>
</div><!-- /.col-lg-6 -->
</div>
<!-- ძებნის ველი -->

 </form>
<!-- //ძებნის ველი -->
<div class="row">
<div class="col-lg-12">
<h2>მომხმარებლების სია</h2>
<p><?php echo $links;?></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
        <thead>
            <tr>
                <th><span class="glyphicon glyphicon-th"></span></th>
                <th>სახელი და გვარი</th>
                <th>ელ.მისამართი</th>
                <th>რეგისტრაციის დრო</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $users as $item ): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name_en']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['date']; ?></td>
            </tr>
        <?php endforeach; ?>
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
