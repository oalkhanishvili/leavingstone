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
                          asfa
                      </h1>
                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                          </li>
                          <li>
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/tasks/'.$tasks_list[0]['project_id']);?>> დავალებები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i> <?=$tasks_list[0]['title'];?>
                          </li>
                      </ol>
                  </div>
              </div>
<div class="row">
<div class="col-lg-8">
  <div class="input-group">
    <div class="alert alert-info" role="alert">
    <p>მოცემულ გვერდზე შეგიძლიათ იხილოთ დეტალური ინფორმაცია კონკრეტული დავალების შესახებ.დაამატოთ კომენტარები და ფაილები</p>
  </div>

  </div><!-- /input-group -->
</div>
</div><!-- /.col-lg-6 -->
<div class="row">
  <div class="col-lg-12">
    <h2>დავალების დეტალები</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="well tasks">
            <div class="detail-task">
              <<?php if ($tasks_list[0]['done'] == 1): ?>
                <span class="progress-status">
                  <h4><i class="glyphicon glyphicon-check"></i>დასრულებული</h4>
                </span>
              <?php else: ?>
                <span class="progress-status">
                  <h4><i class="glyphicon glyphicon-hourglass"></i>პროცესშია</h4>
                </span>
              <?php endif; ?>


              <ul class="detail-list">

                <li><i class="fa fa-tasks"></i><b>პროექტი:</b><?=$tasks_list[0]['p_title'];?></li>
                <li><i class="fa fa-list"></i><b>სათაური:</b><?=$tasks_list[0]['title'];?></li>
                <li><i class="fa fa-list-alt"></i><b>აღწერა:</b><?=$tasks_list[0]['description'];?></li>
                <li><i class="fa fa-user"></i><b>შემსრულებელი:</b><?=$tasks_list[0]['name_en'];?></li>
                <li><i class="fa fa-flag"></i><b>სტატუსი:</b><?=$tasks_list[0]['status'];?></li>
                <li><i class="fa fa-paperclip"></i><b>მიმაგრებული ფაილი:</b>
                  <a href="<?=site_url('manager/file_download/'.$tasks_list[0]['attachment']);?>">
                  <?=$tasks_list[0]['attachment'];?></a></li>
                <li><i class="glyphicon glyphicon-time"></i><b>შექმნის დროს:</b><?=date('Y/m/d H:i:s' ,strtotime($tasks_list[0]['create_date']));?>
                </li>
                <li><i class="glyphicon glyphicon-time"></i><b>დასრულების დრო:</b>
                  <?=(!empty(strtotime($tasks_list[0]['finish_date'])))?date('Y/m/d H:i:s' ,strtotime($tasks_list[0]['finish_date'])):'დამუშავების პროცესში';?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detailBox">
            <div class="titleBox">
            <label>კომენტარები</label>
            </div>

            <div class="actionBox">
              <ul class="commentList">
                <?php if ( !empty($tasks_list['comments']) ): ?>
                  <?php foreach ( $tasks_list['comments'] as $item ): ?>
                  <li>
                      <div class="commenterImage">
                        <p rel="tooltip" data-placement="right" data-original-title="<?=$item['user'];?>">
                          <?=strtoupper($item['user'][0]);?></p>
                      </div>
                      <div class="commentText">
                          <p class="u-comment"><?=$item['comment'];?></p>
                           <?php if ( !empty($item['attachment']) ): ?>
                            <p class="u-attachment"><i class="fa fa-link"> </i><a href="<?=site_url('manager/file_download/'.$item['attachment']);?>"><?=$item['attachment'];?></a></p>
                          <?php endif; ?>
                          <span class="date sub-text"><?=date('\o\n M jS, Y',strtotime($item['create_date']));?></span>
                      </div>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
              </ul>
            <form action="<?=site_url('manager/add_comment');?>" method="post" class="form-inline" role="form">
            <div class="form-group">
              <input type="hidden" name="task_id" value="<?=$tasks_list[0]['id'];?>">
              <input type="hidden" name="user_id" value="<?=$tasks_list[0]['id'];?>">
              <input class="form-control" type="text" name="comment" placeholder="ჩაწერეთ კომენტარი" />
            </div>
            <div class="form-group">
              <button id="send-message" type="submit" class="btn btn-default"><i class="fa fa-send"></i></button>
            </div>
            <ul id="filelist"></ul>
            <br>
            <div id="container">
            <button type="button" class="btn btn-default"
            id="browse" href="javascript:;" rel="tooltip"
             data-placement="right" data-original-title="აირჩიეთ ფაილი ასატვირთად (ლიმიტი 20MB)">
              <i class="fa fa-folder-open"></i>
            </button>
            <button type="button" class="btn btn-default"
            id="start-upload" href="javascript:;" rel="tooltip"
             data-placement="right" data-original-title="დააჭირეთ ფაილის ასატვირთად">
              <i class="glyphicon glyphicon-cloud-upload"></i>
            </button>
            </div>
            <br />
            <pre id="console"></pre>

            </form>
            </div>
          </div>
          <!-- /.comment -->
        </div>
      </div>
  </div>
</div>
<!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->
