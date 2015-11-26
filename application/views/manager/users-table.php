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
       [სახელი და გვარი][ელ.მისამართი][ოთახის ნომერი][პირადი ნომერი]
       [ნიკი][კომპანიის საიდენფიკაციო][კომპანიის სახელი][მობილური]</p>

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
<div class="well">
    <a href="<?php echo site_url('manager/user_add'); ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"> მომხმარებლის დამატება</span></button></a>
</div>
    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
        <thead>
            <tr>
                <th><span class="glyphicon glyphicon-th"></span></th>
                <th>სახელი და გვარი</th>
                <th>ოთახის ნომერი</th>
                <th>ბალანსი</th>
                <th>მობილური</th>
                <th>პირადი ნომერი</th>
                <th>კომპანია</th>
                <th>ს/კოდი</th>
                <th>ელ.მისამართი</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $users as $item ): ?>
            <tr>
                <td>
                <!-- Split button -->
                <div class="btn-group">
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span> 
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <button class="btn btn-danger" type="submit" data-id="<?php echo $item['id']; ?>">Action</button>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('manager/user_edit/'.$item['id']); ?>">რედაქტირება</a></li>
                    <li> <a href="<?php echo site_url('manager/user_delete/'.$item['id']); ?>" onclick="confirm_delete()">წაშლა</a></li>
                  </ul>
                </div>
               </td>
                <td><?php echo $item['name_ge']; ?></td>
                <td><a class="kodi" href="#"><?php echo str_pad($item['id'],5,'0',STR_PAD_LEFT); ?></a></td>
                <td><?php echo $item['balance']; ?></td>
                <td><?php echo $item['mobile']; ?></td>
                <td><?php echo $item['personal_id']; ?></td>
                <td><?php echo $item['company_name']; ?></td>
                <td><?php echo $item['company_id']; ?></td>
                <td><?php echo $item['email']; ?></td>
                
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