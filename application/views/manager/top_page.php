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
                            ზედა გვერდები
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> ზედა გვერდები
                            </li>
                        </ol>
                    </div>
                <!-- /.row -->
                  <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">ზედა გვერდების რედაქტირება</div>
  <div class="panel-body">
    <p><div class="well">
<a href="<?php echo site_url('manager/insert_page'); ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"> გვერდის დამატება</span></button></a>
</div></p>
  </div>

  <!-- List group -->
  <ul class="list-group">
  <?php if ( !$pages == null ): ?>
    <?php foreach ( $pages as $item ): ?>
    <li class="list-group-item"><?php echo $item['menu_name']; ?>

                <!-- Split button -->
                <div class="btn-group" style="float:right;">
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span> 
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <button class="btn btn-danger" type="submit">action</button>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('manager/edit_top_page/'.$item['id']); ?>">რედაქტირება</a></li>
                    <li> <a href="<?php echo site_url('manager/delete_top_page/'.$item['id']); ?>">წაშლა</a></li>
                  </ul>
                </div>
    </li>

    <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</div>
                    </div>
            
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->