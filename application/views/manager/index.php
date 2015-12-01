



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            მთავარი
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> მთავარი
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $tasks_count ?></div>
                                        <div>დავალება</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('manager/projects'); ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">მანახე დეტალურად</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $user_count; ?></div>
                                        <div>რეგისტრირებული</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('manager/user_list'); ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">მანახე დეტალურად</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> ბოლო პროექტები</h3>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>სათაური</th>
                                                <th>ავტორი</th>
                                                <th>შექმ. დრო</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ( !empty($last_project) ):
                                                foreach ( $last_project as $item ): ?>
                                            <tr>
                                                <td><?php echo $item['title']; ?></td>
                                                <td><?php echo $item['name_en']; ?></td>
                                                <td><?php echo $item['create_date']; ?></td>
                                            </tr>
                                            <?php endforeach;
                                            endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo site_url('manager/projects'); ?>">მაჩვენე ყველა პროექტი <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> ბოლო დავალებები</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>სათაური</th>
                                                <th>ავტორი</th>
                                                <th>დრო</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ( !empty($last_tasks) ):
                                                foreach ( $last_tasks as $item ): ?>
                                            <tr>
                                                <td><?php echo $item['title'];?></td>
                                                <td><?php echo $item['name_en']; ?></td>
                                                <td><?php echo $item['create_date']; ?></td>
                                            </tr>
                                            <?php endforeach;
                                            endif; ?>

                                        </tbody>
                                    </table>
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
