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
                          დავალების რედაქტირება
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/tasks/'.$task_list['project_id']);?>> დავალებები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> დავალების რედაქტირება
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>დავალების დასარედაქტირებლად შეიყვანეთ სათაური და აღწერა პროექტის შესახებ</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-6">
    <h2>დავალების დეტალები</h2>
       <form role="form" action="<?php echo site_url('manager/update_task/'.$task_list['id']); ?>" method="post">
          <div class="form-group">
              <label>დავალების სათაური</label>
              <input class="form-control" name="title" value="<?=$task_list['title'];?>" required title="პროექტის სათაური აუცილებელია">
          </div>
           <div class="form-group">
              <label>დავალების აღწერა</label>
              <p><textarea name="description" cols="85" rows="10" required title="პროექტის დეტალები აუცილებელია"><?=$task_list['description'];?></textarea>
              </p>
          </div>
          <div class="form-group">
            <p>
              <label>შემსრულებელი</label>
            </p>

              <select name="user">
                <?php if ( !empty($users_list) ): ?>
                  <<?php foreach ($users_list as $item): ?>
                    <?php if ($task_list['user_id'] == $item['id']): ?>
                      <option value="<?=$item['id'];?>" selected><?=$item['name_en'];?></option>
                    <?php else: ?>
                    <option value="<?=$item['id'];?>"><?=$item['name_en'];?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
          </div>
          <div class="form-group">
            <p>
              <label>სტატუსი</label>
            </p>
              <select name="status">
                <option value="">აირჩიეთ ტიპი</option>
                <option value="content" <?=$task_list['status']=='content'?'selected':'';?>>content</option>
                <option value="front-end" <?=$task_list['status']=='front-end'?'selected':'';?>>front-end</option>
                <option value="back-end" <?=$task_list['status']=='back-end'?'selected':'';?>>back-end</option>
                <option value="bug" <?=$task_list['status']=='bug'?'selected':'';?>>bug</option>
                <option value="important" <?=$task_list['status']=='important'?'selected':'';?>>important</option>
              </select>
          </div>
          <div class="form-group">
            <p>
              <label>დრო</label>
            </p>
              <input type="date" name="date" value="<?=date('Y-m-j',strtotime($task_list['create_date']));?>">
              <input type=time  name="clock" value="<?=date('H:m',strtotime($task_list['create_date']));?>">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-right"> დამახსოვრება</span></button>
          </div>
      </form>
  </div>
</div>
<!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->
