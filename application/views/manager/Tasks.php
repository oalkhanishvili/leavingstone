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
                          პროექტი: <?=$project_title['title']?>
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/projects');?>> პროექტები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> <?=$project_title['title']?>
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>მოცემულ პროექტზე საჭიროა შექმნათ დავალებები და გაანაწილოთ მომხმარებლებზე.დავალების შესრულების შემდეგ ღილაკზე "Done" დაჭერით გააკეთეთ აღნიშვნა</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">დავალების დამატება</button>
    <h2>დავალებების სია</h2>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">დეტალები</h4>
          </div>
          <div class="modal-body">
            <form  id="add_task" action="<?php echo site_url('manager/add_task'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="project_id" value="<?=$project_id?>">
              <div class="form-group">
                <label for="recipient-name" class="control-label">სათაური:</label>
                <input type="text" class="form-control" id="recipient-name" name="title" required title="დავალების სათაური აუცილებელია">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">აღწერა:</label>
                <textarea class="form-control" id="message-text" name="description"></textarea>
              </div>
              <div class="form-group">
                 <label>შემსრულებელი:</label>
                 <select name="user_id">
                   <?php if ( !empty($users_list) ):?>
                     <option value="<?=$_SESSION['user_id'];?>">შევასრულებ მე</option>
                     <?php unset($users_list[array_search($_SESSION['user_id'],$users_list)]); ?>
                     <?php foreach ( $users_list as $item ): ?>
                     <option value="<?=$item['id']?>"><?=$item['name_en']?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                 </select>
             </div>
             <div class="form-group">
                <label>სტატუსი:</label>
                <select name="status" required title="გთხოვთ აირჩიოთ სტატუსი">
                  <option value="">აირჩიეთ ტიპი</option>
                  <option value="content">content</option>
                  <option value="front-end">front-end</option>
                  <option value="back-end">back-end</option>
                  <option value="bug">bug</option>
                  <option value="important">important</option>
                </select>
            </div>
             <div class="form-group">
                <label>მიმაგრებლი ფაილი:</label>
                <p>
                    <input type="file" name="userfile" id="userfile"/>
                </p>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default cancel-task" data-dismiss="modal">დახურვა</button>
            <button type="submit" class="btn btn-primary create-task">დამატება</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
    <thead>
    <tr>
    <th><span class="glyphicon glyphicon-th"></span></th>
      <th>სათაური</th>
      <th>სტატუსი</th>
      <th>შემსრულებელი</th>
      <th>შექმ.დრო</th>
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
            <li><a href="<?=site_url('manager/detail_task/'.$item['id'])?>;">დეტალურად</a></li>
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
        <td><?=$item['name_en'];?></td>
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
