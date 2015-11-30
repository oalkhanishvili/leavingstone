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
                          ჩემი დავალებები
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/projects');?>> პროექტები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> ჩემი დავალებები
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>მოცემულ გვერდზე შეგიძლიათ დაათვალიეროთ თქვენზე მომაგრებული დავალებები</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-12">
    <h2>დავალებების სია</h2>
    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
    <thead>
    <tr>
      <th <?php if ($sort_by == 'done' ){echo "class=\"sort_$sort_order\"" ;}?>>
        <?php echo anchor("manager/my_tasks/done/".
      (($sort_order == 'asc' && $sort_by == 'done')?'desc':'asc'),'<span class="glyphicon glyphicon-th"></span>'); ?></th>
      <th <?php if ($sort_by == 'title' ){echo "class=\"sort_$sort_order\"" ;}?>>
        <?php echo anchor("manager/my_tasks/title/".
      (($sort_order == 'asc' && $sort_by == 'title')?'desc':'asc'),'სათაური'); ?></th>
      <th>სტატუსი</th>
      <th>პროექტი</th>
      <th <?php if ($sort_by == 'create_date' ){echo "class=\"sort_$sort_order\"" ;}?>>
        <?php echo anchor("manager/my_tasks/create_date/".
      (($sort_order == 'asc' && $sort_by == 'create_date')?'desc':'asc'),'შექმ.დრო'); ?></th>
      <th>დასრ.დრო</th>
    </tr>
    </thead>
    <tbody>
    <?php if ( !empty($tasks_list) ): ?>
      <?php foreach ( $tasks_list as $item ): ?>
    <tr class="<?php  echo  $item['done']==0 ? '': 'success' ?>">
        <td>
        <!-- Split button -->
        <?php echo form_open('manager/done/'.$item['id'].'/tasks' , array('id' => $item['id'], 'class' => 'shesruleba')); ?>
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
            <li><a href="<?=site_url('manager/detail_task/'.$item['id']);?>">დეტალურად</a></li>
            <li><a href="<?=site_url('manager/edit_task/'.$item['id']);?>">რედაქტირება</a></li>
            <li> <a href="<?=site_url('manager/delete_task/'.$item['id']);?>" onclick="confirm_delete()">წაშლა</a></li>
          </ul>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-option-vertical"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
        </div>
        </form>
       </td>
        <td><?=$item['title'];?></td>
        <td><?=$item['status'];?></td>
        <td><?=anchor('manager/tasks/'.$item['project_id'],$item['p_name']);?></td>
        <td><?= date( 'd/m/y -> H:i', strtotime($item['create_date']) );?></td>
        <td class="progress-date"><?= (!empty(strtotime($item['finish_date'])))?
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
