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
                          Tables
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/projects');?>> დავალებები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> დავალება
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>ამანათების მასიურად ასატვირთად საჭიროა გადმოტვირთოთ excel ფაილის ნიმუში და შესაბამისი სათაურების ქვევით ჩამოწეროთ მონაცემები.თუ არ გინდათ რომელიმე პარამეტრის შეტანა დატოვეთ ცარიელი</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
<h2>დავალებების სია</h2>

  <div class="col-lg-12">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">დავალების დამატება</button>
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
                <input type="text" class="form-control" id="recipient-name" name="title">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">აღწერა:</label>
                <textarea class="form-control" id="message-text" name="description"></textarea>
              </div>
              <div class="form-group">
                 <label>შემსრულებელი:</label>
                 <select name="user_id">
                   <?php if ( !empty($users_list) ): ?>
                     <?php foreach ( $users_list as $item ): ?>
                     <option value="<?=$item['id']?>"><?=$item['id']?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                 </select>
             </div>
             <div class="form-group">
                <label>შემსრულებელი:</label>
                <p>
                    <input type="file" name="userfile" id="userfile"/>
                </p>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">დახურვა</button>
            <button type="submit" class="btn btn-primary">დამატება</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable" id="datatable">
    <thead>
    <tr>
    <th><span class="glyphicon glyphicon-th"></span></th>
      <th>სტატუსი</th>
      <th>აღწერა</th>
      <th>შემსრულებელი</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        <!-- Split button -->
        <div class="btn-group">

              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <button class="btn btn-danger" type="submit" data-id="">გაცემა</button>
          <ul class="dropdown-menu">
            <li><a href="">რედაქტირება</a></li>
            <li> <a href="" onclick="confirm_delete()">წაშლა</a></li>
          </ul>
        </div>
        </form>
       </td>
        <td>1231</td>
        <td>1231</td>
        <td>1231</td>

    </tr>
    </tbody>
    </table>
  </div>
</div>
<!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->
