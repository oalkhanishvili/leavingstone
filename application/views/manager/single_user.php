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
            ზედა გვერდები
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
            </li>
            <li>
                <i class="fa fa-table"></i><a href=<?php echo site_url('manager/users_list');?>> მომხმარებლები</a>
            </li>
            <li class="active">
             <i class="fa fa-table"></i> <?php echo $user['name_ge']; ?>
            </li>
        </ol>
    </div>
               

<div class="row">
    <div class="col-md-4">
    <form action="<?php echo site_url('manager/user_edit/'.$user['id']); ?>" method="post">
            <div class="form-group">
                <label>სახელი და გვარი (ლათ)</label>
                <input  value="<?php echo $user['name_en']; ?>" class="form-control" name="name_en" required title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის სახელი და გვარი</p>
            </div>
            <div class="form-group">
                <label>მსახელი და გვარი (ქართ)</label>
                <input value="<?php echo $user['name_ge']; ?>" class="form-control" name="name_ge" title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის სახელი და გვარი</p>
            </div>
            <div class="form-group">
                <label>დაბადების თარიღი</label>
                <p>
                <select class="selectpicker" name="day">
                <?php foreach ($birth_date_day as $day): ?>
                <?php if ( $birthday[0] == $day ): ?>
                    <option selected><?php echo $day; ?></option>
                <?php else: ?>
                    <option><?php echo $day; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <select class="selectpicker" name="month">
                <?php foreach ($birth_date_month as $month): ?>
                    <?php if ( $birthday[1] == $month ): ?>
                    <option selected><?php echo $month; ?></option>
                <?php else: ?>
                    <option><?php echo $month; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <select class="selectpicker" name="year">
                 <?php foreach ($birth_date_year as $year): ?>
                    <?php if ( $birthday[2] == $year ): ?>
                    <option selected><?php echo $year; ?></option>
                <?php else: ?>
                    <option><?php echo $year; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
                </select>
                </p>
                <p class="help-block">დაბადების თარიღი</p>
            </div>
            <div class="form-group">
                <label>ბალანსზე</label>
                <input value="<?php echo $user['balance']; ?>" class="form-control" name="balance" title"შეავსეთ ველი">
                <p class="help-block">რამდენი აქ ანგარიშზე</p>
            </div>
            <div class="form-group">
                <label>მობილურის ნომერი</label>
                <input value="<?php echo $user['mobile']; ?>" class="form-control" name="mobile" title"შეავსეთ ველი">
                <p class="help-block">საკონტაქტო მობილური</p>
            </div>
            <div class="form-group">
                <label>პირადი ნომერი</label>
                <input value="<?php echo $user['personal_id']; ?>" class="form-control" name="personal_id" title"შეავსეთ ველი">
                <p class="help-block">მომხმარებლის 11 ნიშნა ნომერი</p>
            </div>
            <div class="form-group">
                <label>ქალაქი</label>
                <input value="<?php echo $user['city']; ?>" class="form-control" name="city" title"შეავსეთ ველი">
                <p class="help-block">საცხოვრებელი ქალაქი</p>
            </div>
            <div class="form-group">
                <label>მისამართი</label>
                <input value="<?php echo $user['address']; ?>" class="form-control" name="address" title"შეავსეთ ველი">
                <p class="help-block">საცხოვრებელი მისამართი</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-right"> დამახსოვრება</span></button>
            </div>
    </div>
    <div class="col-md-4">
            <div class="form-group">
                <label>იურიდიული პირი</label>
                <label class="checkbox-inline">
                <input type="radio" name="is_company" value="1" <?php echo  $user['is_company'] == 1 ? 'checked' : ''?>> კი
                </label>
                <label class="checkbox-inline">
                <input type="radio" name="is_company" value="0" <?php echo  $user['is_company'] == 0 ? 'checked' : ''?>> არა 
                </label>
                <p class="help-block">თუ იურიდიული პირია მონიშნეთ</p>
            </div>
            <div class="form-group">
                <label>ს/კოდი</label>
                <input value="<?php echo $user['company_id']; ?>" class="form-control" name="company_id" title"შეავსეთ ველი">
                <p class="help-block">იურიდიული პირის საინდენტიფიკაციო კოდი</p>
            </div>
            <div class="form-group">
                <label>იურიდიული სახელწონება</label>
                <input value="<?php echo $user['company_name']; ?>" class="form-control" name="company_name" title"შეავსეთ ველი">
                <p class="help-block">კომპანიის ან ი.პირის სახელწოდება</p>
            </div>
            <div class="form-group">
                <label>ნიკი</label>
                <input value="<?php echo $user['username']; ?>" class="form-control" name="username" title"შეავსეთ ველი">
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
                <input value="<?php echo $user['email']; ?>" class="form-control" name="email" title"შეავსეთ ველი">
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