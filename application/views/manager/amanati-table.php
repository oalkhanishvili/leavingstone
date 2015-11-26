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
            ამანათები
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> ამანათები
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
</div><!-- /.col-lg-6 -->
<!-- ძებნის ველი -->
</div>

<!-- //ძებნის ველი -->
<div class="row">
<div class="col-lg-12">
<h2>ამანათების სია</h2>
<form action="<?php echo site_url('manager/update_forma'); ?>" method="post" enctype="multipart/form-data">
        <p>ამანათების განახლება excel</p>
        <p>
            <input type="file" name="userfile"/>
        </p>
        <button type="submit" class="btn btn-success">ატვირთვა</button>
</form>
<p><?php 
if ( strlen($links) ){
echo $links;
}?>
<form action="<?php echo site_url('manager/update_freight'); ?>" method="post" style="float:right;">
 <p><label>რეისების სტატუსების შესაცვლელი</label></p>
    <select name="freight">
        <option>-რეისი-</option>
        <?php $freight = array(); ?>
        <?php foreach ( $status as $item ):
        if ( in_array($item['freight'], $freight) ){
            continue;
        }
        $freight[] = $item['freight']; ?>
        <option><?php echo $item['freight']; ?></option>
    <?php endforeach; ?>
    </select>
        <select name="status">
        <option>-სტატუსი-</option>
        <option value="m">ჩინეთში</option>
        <option value="g">გზაშია</option>
        <option value="c">ჩამოსულია</option>
    </select>
    <button type="submit">განახლება</button>
    </p>
</form>
<div class="table-responsive">
<div class="well">
<a href="<?php echo site_url('manager/amanati_add'); ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"> ამანათის დამატება</span></button></a>
</div>
<table class="table table-striped table-bordered table-hover dataTable" id="datatable">
<thead>
<tr>
<th><span class="glyphicon glyphicon-th"></span></th>
<?php foreach ( $fields as $key => $name ): ?>
    <th <?php if ($sort_by == $key ){echo "class=\"sort_$sort_order\"" ;}?>>
    <?php echo anchor("manager/amanatebi/$key/".
    (($sort_order == 'asc' && $sort_by == $key)?'desc':'asc'),$name); ?></th>
<?php endforeach; ?>
</tr>
</thead>
<tbody>
<?php foreach ( $parcels as $item ): ?>
<tr rel="<?php echo $item->id; ?>" class="<?php  echo  $item->taken==0 ? '': 'success' ?>">
    <td>
    <!-- Split button -->
    <?php echo form_open('manager/taken/'.$item->id , array('id' => $item->id, 'class' => 'gatana')); ?>
    <div class="btn-group">
    <?php if ( $item->taken == 1){
            $a = 0;
        }else{
            $a = 1;
        }
     ?>
    <input  type="hidden" name="taken" value="<?php echo $a; ?>" data-id="<?php echo $item->id; ?>">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span> 
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <button class="btn btn-danger" type="submit" data-id="<?php echo $item->id; ?>">გაცემა</button>
      <ul class="dropdown-menu">
        <li><a href="<?php echo site_url('manager/amanati_edit/'.$item->id); ?>">რედაქტირება</a></li>
        <li> <a href="<?php echo site_url('manager/amanati_delete/'.$item->id); ?>" onclick="confirm_delete()">წაშლა</a></li>
      </ul>
    </div>
    </form>
   </td>
    <td><?php echo $item->amanati; ?></td>
    <td><a class="kodi" href="<?php echo site_url('manager/user_edit/'.$item->kodi); ?>">
    <?php echo 'TSG'.str_pad($item->kodi,5,'0',STR_PAD_LEFT); ?></a></td>
    <td><?php echo "<img src=".base_url("images/".$hashmap[$item->status]).">";?></td>
    <td><?php echo $item->weight; ?></td>
    <td><?php echo $item->price; ?></td>
    <td><?php echo $item->freight; ?></td>
    <td><?php echo $item->send_date; ?></td>
    <td><?php echo $hashmap[$item->declaration]; ?></td>
    <td><?php echo $hashmap[$item->payed]; ?></td>
    
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
<!-- /#page-wrapper -->