 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo site_url('manager/index'); ?>"><i class="fa fa-fw fa-dashboard"></i> საერთო</a>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'],'manager/users_list') !== false) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('manager/users_list');?>"><i class="fa fa-fw fa-user"></i> მომხმარებლები</a>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'],'manager/my_tasks') !== false) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('manager/my_tasks');?>"><i class="fa fa-fw fa-tasks"></i> ჩემი დავალებები</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> პროექტები <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo site_url('manager/create_project'); ?>"><i class="fa fa-fw fa-plus"></i> პროექტის შექმნა</a>
                            </li>
                            <?php $result = $this->db->select('id,title')->get('projects')->result(); ?>
                            <?php if (!empty($result)): ?>
                              <?php foreach ($result  as  $item): ?>
                                <li>
                                    <a href="<?php echo site_url('manager/tasks/'.$item->id); ?>">
                                      <i class="fa fa-fw fa-file"></i> <?=$item->title;?>

                                    </a>
                                </li>
                              <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
