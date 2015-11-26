<?php
$hashmap = array(
    'm' => 'chinaflag.png',
    'g' => 'plane.png',
    'c' => 'georgia.png',
    'a' => 'გატანილი',
    '1' => '<span class="glyphicon glyphicon-ok-sign"  aria-hidden="true" style="color:green;"></span>',
    '0' => '<span class="glyphicon glyphicon-remove-sign" aria-hidden="true" style="color:red;"></span>'
    );
?>
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
            Tables
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
            </li>
            <li>
                <i class="fa fa-table"></i> <a href=<?php echo site_url('manager/amanatebi');?>>ამანათები</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> ძიების რეზულტატი
            </li>
        </ol>
    </div>

</div>
<form action="<?php echo site_url('manager/parcel_search'); ?>" method="post">
<div class="row">
<div class="col-lg-12">
<div class="well">
        <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="ჩაწერეთ ძიება აქ...">    

        <span class="input-group-btn">
        <button class="btn btn-default" type="submit">ძებნა!</button>
        </span>
        </div>
       <div class="alert alert-info" role="alert">
       <p class="help_block"><b>შესაძლებელია მოიძებნოს შემდეგი პარამეტრებით: </b>
       [ამანათის კოდი][მფლობელი][ოთახის ნომერი][რეისი ნომერი]</p></div>
</div>
</form>
</div>
</div>
<!-- //ძებნის ველი -->
<div class="row">
<?php if ( !empty($error) ): ?>
    <h1> ბაზაში მსგავსი მომხმარებელი არ მოიძებნა</h1>
<?php else: ?>
   
    <div class="col-lg-12">
        <h2>ამანათების სია</h2>
        <div class="table-responsive">
        <div class="well">
            <form action="<?php echo site_url('manager/export_exel'); ?>" method="post">
            <input type="hidden" name="search" value="<?php echo $_POST['search']; ?>">
            <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"> გადმოწერა excel ფაილში</span>
            </button>
            </form>
        </div>
            <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
                <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-th"></span></th>
                        <th>ამანათის ნომერი</th>
                        <th>ოთახის ნომერი</th>
                        <th>სტატუსი</th>
                        <th>წონა</th>
                        <th>ფასი</th>
                        <th>რეისის ნომერი</th>
                        <th>გამოგზავნის დრო</th>
                        <th>დეკლარაცია</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ( $parcels as $item ): ?>
                    <tr rel="<?php echo $item['id']; ?>" class="<?php  echo  $item['taken']==0 ? '': 'success' ?>">
                        <td>
                        <!-- Split button -->
                        <?php echo form_open('manager/taken/'.$item['id'] , array('id' => $item['id'], 'class' => 'gatana')); ?>
                        <div class="btn-group">
                        <?php if ( $item['taken'] == 1){
                                $a = 0;
                            }else{
                                $a = 1;
                            }
                         ?>
                        <input  type="hidden" name="taken" value="<?php echo $a; ?>" data-id="<?php echo $item['id']; ?>">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span> 
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <button class="btn btn-danger" type="submit" data-id="<?php echo $item['id']; ?>">გაცემა</button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('manager/amanati_edit/'.$item['id']); ?>">რედაქტირება</a></li>
                            <li><a href="<?php echo site_url('manager/amanati_delete/'.$item['id']); ?>" onclick="confirm_delete()">წაშლა</a></li>
                          </ul>
                        </div>
                        </form>
                        </td>
                        <td><?php echo $item['amanati']; ?></td>
                        <td><a class="kodi" href="#"><?php echo str_pad($item['kodi'],5,'0',STR_PAD_LEFT); ?></a></td>
                        <td><?php echo "<img src=".base_url("images/".$hashmap[$item['status']]).">";?></td>
                        <td><?php echo $item['weight']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['freight']; ?></td>
                        <td><?php echo $item['send_date']; ?></td>
                        <td><?php echo $hashmap[$item['declaration']]; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->