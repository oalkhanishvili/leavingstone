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
                          პროექტის დეტალები
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/projects/');?>> პროექტები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> <?=$project_list['title'];?>
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>მოცემულ გვერდზე შეგიძლიათ იხილოთ დეტალური ინფორმაცია კონკრეტული პროექტის შესახებ.</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-12">
    <h2>პროექტის დეტალები</h2>
      <div class="row">
        <div class="col-md-12">
          <div class="well tasks">
            <div class="detail-task">
              <<?php if ($project_list['done'] == 1): ?>
                <span class="progress-status">
                  <h4><i class="glyphicon glyphicon-check"></i>დასრულებული</h4>
                </span>
              <?php else: ?>
                <span class="progress-status">
                  <h4><i class="glyphicon glyphicon-hourglass"></i>პროცესშია</h4>
                </span>
              <?php endif; ?>


              <ul class="detail-list">

                <li><i class="fa fa-tasks"></i><b>სათაური:</b><?=$project_list['title'];?></li>
                <li><i class="fa fa-list-alt"></i><b>აღწერა:</b><?=$project_list['description'];?></li>
                <li><i class="fa fa-user"></i><b>შემსრულებელი:</b><?=$project_list['name_en'];?></li>
                <li><i class="fa fa-flag"></i><b>სტატუსი:</b><?=($project_list['done']==1)?'დასრულებულია':'პროცესშია';?></li>
                <li><i class="glyphicon glyphicon-time"></i><b>შექმნის დროს:</b><?=date('Y/m/d H:i:s' ,strtotime($project_list['create_date']));?>
                </li>
                <li><i class="glyphicon glyphicon-time"></i><b>დასრულების დრო:</b>
                  <?=(!empty(strtotime($project_list['finish_date'])))?date('Y/m/d H:i:s' ,strtotime($project_list['finish_date'])):'დამუშავების პროცესში';?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->
