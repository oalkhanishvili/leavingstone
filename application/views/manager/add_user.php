<div id="page-wrapper">
<div class="container-fluid">
<?php if ( validation_errors() == TRUE ): ?>
    <div class="error_message">
    <p><?php echo validation_errors(); ?></p>
    </div>
<?php endif; ?>
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
                                <i class="fa fa-table"></i><a href=<?php echo site_url('manager/users_list');?>> მომხმარებლები</a>
                            </li>
                            <li class="active">
                             <i class="fa fa-table"></i> მომხმარებლის დამატება
                            </li>
                        </ol>
                    </div>
                </div>

<div class="row">
<h2>ამანათების დამატება</h2>   
    <div class="col-md-5">
         <form role="form" action="<?php echo site_url('manager/user_add'); ?>" method="post">
            <div class="form-group">
                <label>სახელი და გვარი (ლათ)</label>
                <input class="form-control" value="<?php set_value('name_en'); ?>" name="name_en" required title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის სახელი და გვარი</p>
            </div>
            <div class="form-group">
                <label>მსახელი და გვარი (ქართ)</label>
                <input class="form-control" value="<?php set_value('name_ge'); ?>" name="name_ge" title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის სახელი და გვარი</p>
            </div>
            <div class="form-group">
                <label>დაბადების თარიღი</label>
                <p>
                <select class="selectpicker" name="day">
                <?php foreach ($birth_date_day as $day): ?>
                    <option><?php echo $day; ?></option>
                <?php endforeach; ?>
                </select>
                <select class="selectpicker" name="month">
                <?php foreach ($birth_date_month as $month): ?>
                    <option><?php echo $month; ?></option>
                <?php endforeach; ?>
                </select>
                <select class="selectpicker" name="year">
                 <?php foreach ($birth_date_year as $year): ?>
                    <option><?php echo $year; ?></option>
                <?php endforeach; ?>
                </select>
                </p>
                <p class="help-block">დაბადების თარიღი</p>
            </div>
            <div class="form-group">
                <label>მობილურის ნომერი</label>
                <input class="form-control" value="<?php set_value('mobile'); ?>" name="mobile" title"შეავსეთ ველი">
                <p class="help-block">საკონტაქტო მობილური</p>
            </div>
            <div class="form-group">
                <label>პირადი ნომერი</label>
                <input class="form-control" value="<?php set_value('personal_id'); ?>" name="personal_id" title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის 11 ნიშნა ნომერი</p>
            </div>
            <div class="form-group">
                <label>ქალაქი</label>
                <input class="form-control" value="<?php set_value('city'); ?>" name="city" title"შეავსეთ ველი">
                <p class="help-block">საცხოვრებელი ქალაქი</p>
            </div>
            <div class="form-group">
                <label>მისამართი</label>
                <input class="form-control" value="<?php set_value('address'); ?>" name="address" title"შეავსეთ ველი">
                <p class="help-block">საცხოვრებელი მისამართი</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-right"> დამახსოვრება</span></button>
            </div>
    </div>
    <div class="col-md-5">
            <div class="form-group">
                <label>იურიდიული პირი</label>
                <label class="checkbox-inline">
                <input type="radio" name="is_company" value="1"> კი
                </label>
                <label class="checkbox-inline">
                <input type="radio" name="is_company" value="0"> არა
                </label>
                <p class="help-block">თუ იურიდიული პირია მონიშნეთ</p>
            </div>
            <div class="form-group">
                <label>ს/კოდი</label>
                <input class="form-control" value="<?php set_value('company_id'); ?>" name="company_id" title"შეავსეთ ველი">
                <p class="help-block">იურიდიული პირის საინდენტიფიკაციო კოდი</p>
            </div>
            <div class="form-group">
                <label>იურიდიული სახელწონება</label>
                <input class="form-control" value="<?php set_value('company_name'); ?>" name="company_name" title"შეავსეთ ველი">
                <p class="help-block">კომპანიის ან ი.პირის სახელწოდება</p>
            </div>
            <div class="form-group">
                <label>ნიკი</label>
                <input class="form-control" value="<?php set_value('username'); ?>" name="username" title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის ნიკი რითაც შევა სისტემაში</p>
            </div>
            <div class="form-group">
                <label>პაროლი</label>
                <input class="form-control" name="password" title"შეავსეთ ველი">
                <p class="help-block">სისტემაში შესასვლელი პაროლი</p>
            </div>
            <div class="form-group">
                <label>გაიმეორეთ პაროლი</label>
                <input class="form-control" name="conf_password" title"შეავსეთ ველი">
                <p class="help-block">გაიმეორეთ პაროლი</p>
            </div>
            <div class="form-group">
                <label>ელ.მისამართი</label>
                <input class="form-control" value="<?php set_value('email'); ?>" name="email" title"შეავსეთ ველი">
                <p class="help-block">საკონტაქტო ელ.მისამრთი</p>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->