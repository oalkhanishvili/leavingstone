
            
           

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
                                        <div class="huge"><?php echo $parcels_count ?></div>
                                        <div>ამანათი</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('manager/amanatebi'); ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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
                                        <div>რეგისტრირებლი</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('manager/user_list'); ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>მომხმარებელი #</th>
                                                <th>დებიტი</th>
                                                <th>ჩამოჭრა</th>
                                                <th>დრო</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ( !empty($last_parcel) ): 
                                                foreach ( $last_parcel as $item ): ?>
                                            <tr>
                                                <td><?php echo'TSG'.str_pad($item['kodi'],5,'0',STR_PAD_LEFT);?></td>
                                                <td><?php echo $item['amanati']; ?></td>
                                                <td><?php echo $item['saxeli']; ?></td>
                                                <td><?php echo $item['freight']; ?></td>
                                            </tr>
                                            <?php endforeach;
                                            endif; ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo site_url('manager/amanatebi'); ?>">მაჩვენე ყველა ამანათი <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> ბოლო ტრანსაქციები</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>მომხმარებელი #</th>
                                                <th>დებიტი</th>
                                                <th>ჩამოჭრა</th>
                                                <th>დრო</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ( !empty($last_transaction) ): 
                                                foreach ( $last_transaction as $item ): ?>
                                            <tr>
                                                <td><?php echo'TSG'.str_pad($item['user_id'],5,'0',STR_PAD_LEFT);?></td>
                                                <td><?php echo $item['debit']; ?></td>
                                                <td><?php echo $item['credit']; ?></td>
                                                <td><?php echo $item['date']; ?></td>
                                            </tr>
                                            <?php endforeach;
                                            endif; ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo site_url('manager/transaction');?>">მაჩვენე ყველა ტრანსაქცია <i class="fa fa-arrow-circle-right"></i></a>
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