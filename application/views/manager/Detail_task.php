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
                              <i class="fa fa-table"></i><a href=<?php echo site_url('manager/projects');?>> დავალებები</a>
                          </li>
                          <li class="active">
                           <i class="fa fa-table"></i>
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
<h2>დავალებების სია</h2>

  <div class="col-lg-12">
    <div class="well">
      <div class="row">
        <div class="col-md-6">
          <b>პროექტი:</b>
          <p><?=$tasks_list[0]['p_title'];?></p>
          <b>სათაური:</b>
          <p><?=$tasks_list[0]['title'];?></p>
          <b>აღწერა:</b>
          <p><?=$tasks_list[0]['description'];?></p>
          <b>სტატუსი:</b>
          <p><?=$tasks_list[0]['status'];?></p>
          <b>მიმაგრებული ფაილი:</b>
          <p><?=$tasks_list[0]['attachment'];?></p>
          <b>შემსრულებელი:</b>
          <p><?=$tasks_list[0]['name_en'];?></p>
          <b>შექმნის დროს:</b>
          <p><?=date('Y/m/d H:i:s' ,strtotime($tasks_list[0]['create_date']));?></p>
          <b>დასრულების დრო:</b>
          <p><?=date('Y/m/d H:i:s' ,strtotime($tasks_list[0]['finish_date']));?></p>
        </div>
        <div class="col-md-6">
          <div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">

        <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>
    <div class="actionBox">
                  <ul class="commentList">
                    <?php if ( !empty($tasks_list['comments']) ): ?>
                      <?php foreach ( $tasks_list['comments'] as $item ): ?>
                      <li>
                          <div class="commenterImage">
                            <img src="http://lorempixel.com/50/50/people/6" />
                          </div>
                          <div class="commentText">
                              <p class=""><?=$item['comment'];?></p>
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
                  <input class="form-control" type="text" name="comment" placeholder="Your comments" />
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">Add</button>
              </div>
          </form>
      </div>
  </div>
          <!-- /.comment -->
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
