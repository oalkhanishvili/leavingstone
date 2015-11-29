<div id="page-wrapper">
          <div class="container-fluid">
<?php if (!$this->session->flashdata('message') == null): ?>
  <div class="alert alert-success" role="alert">
      <a href="#" class="alert-link"><?php echo $_SESSION['message']; ?></a>
  </div>
<?php endif; ?>
              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                          პროექტები
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li class="active">
                              <i class="fa fa-table"></i> პროექტები
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>მოცემულ გვერდზე შეგიძლიათ ნახოთ ყველა პროექტი.პროექტის  შესრულების შემდეგ ღილაკზე  დაჭერით და გააკეთეთ აღნიშვნა</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btn-primary"  onclick="location.href='<?=site_url('manager/create_project');?>'">პროექტის დამატება</button>
    <h2>პროექტების სია</h2>
    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
    <thead>
    <tr>
    <th><span class="glyphicon glyphicon-th"></span></th>
      <th>სათაური</th>
      <th>სტატუსი</th>
      <th>შემქმნელი</th>
      <th>შექმ.დრო</th>
      <th>დასრ.დრო</th>
    </tr>
    </thead>
    <tbody>
    <?php if ( !empty($projects_list) ): ?>
      <?php foreach ( $projects_list as $item ): ?>
    <tr class="<?php  echo  $item['done']==0 ? '': 'success' ?>">
        <td>
        <!-- Split button -->
        <?php echo form_open('manager/done/'.$item['id'].'/projects' , array('id' => $item['id'], 'class' => 'project_shesruleba')); ?>
        <div class="btn-group">
          <?php if ( $item['done'] == 1){
                  $a = 0;
              }else{
                  $a = 1;
              }
           ?>
           <input  type="hidden" name="done" value="<?php echo $a; ?>" data-id="<?=$item['id']; ?>">
          <button  class="glyphicon <?=($a==1)?'glyphicon-unchecked':'glyphicon-check';?>" type="submit" data-id="<?=$item['id']; ?>"></button>

          <ul class="dropdown-menu">
            <li><a href="<?=site_url('manager/detail_project/'.$item['id']);?>">დეტალურად</a></li>
            <li><a href="<?=site_url('manager/edit_project/'.$item['id']);?>">რედაქტირება</a></li>
            <li> <a href="<?=site_url('manager/delete_project/'.$item['id']);?>" onclick="confirm_delete()">წაშლა</a></li>
          </ul>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-option-vertical"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
        </div>
        </form>
       </td>
        <td><?=$item['title'];?></td>
        <td><?=($item['done']==1)?'დასრულებულია':'პროცესშია';?></td>
        <td><a href="<?=site_url('manager/user_edit/'.$item['u_id']);?>"><?=$item['name_en'];?></a></td>
        <td><?= date( 'd/m/y -> H:i', strtotime($item['create_date']) );?></td>
        <td><?= (!empty(strtotime($item['finish_date'])))?
        date( 'd/m/y -> H:i', strtotime($item['finish_date']) ):'პროცესში';?></td>
    </tr>
  <?php endforeach; ?>
<?php endif; ?>
    </tbody>
    </table>
  </div>
</div>
<!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->
