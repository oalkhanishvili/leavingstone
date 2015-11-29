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
                          პროექტის რედაქტირება
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/projects');?>> პროექტები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> პროქტის რედაქტირება
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>პროექტის დასარედაქტირებლად შეიყვანეთ სათაური და აღწერა პროექტის შესახებ</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-8">
    <h2>პროექტის დეტალები</h2>
       <form role="form" action="<?php echo site_url('manager/update_project/'.$project_list['id']); ?>" method="post">
          <div class="form-group">
              <label>პროექტის სათაური</label>
              <input class="form-control" name="title" value="<?=$project_list['title'];?>" required title="პროექტის სათაური აუცილებელია">
          </div>
           <div class="form-group">
              <label>პროექტის აღწერა</label>
              <p><textarea name="description" id="editor1"  rows="10" cols="80" required title="პროექტის დეტალები აუცილებელია"><?=$project_list['description'];?></textarea>
              </p>
              <script>
              // Replace the <textarea id="editor1"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace( 'editor1' );
              </script>
          </div>
          <div class="form-group">
              <input type="date" name="date" value="<?=date('Y-m-j',strtotime($project_list['create_date']));?>">
              <input type=time  name="clock" value="<?=date('H:m',strtotime($project_list['create_date']));?>">
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
