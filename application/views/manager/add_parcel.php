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
                            Tables
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i><a href=<?php echo site_url('manager/amanatebi');?>> ამანათები</a>
                            </li>
                            <li class="active">
                             <i class="fa fa-table"></i> ამანათის დამატება
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">      
<div class="col-lg-8">
    <div class="input-group">
      <div class="alert alert-info" role="alert">
      <p>ამანათების მასიურად ასატვირთად საჭიროა გადმოტვირთოთ excel ფაილის ნიმუში და შესაბამისი სათაურების ქვევით ჩამოწეროთ მონაცემები.თუ არ გინდათ რომელიმე პარამეტრის შეტანა დატოვეთ ცარიელი</p>
    <p><a href="<?php echo base_url('uploads/form.xlsx');?>" style="color:red;"><span class="glyphicon glyphicon-paperclip"> ნიმუშის გადმოწერა xls ფორმატში</span></a></p>
    </div>
        <form action="<?php echo site_url('manager/insert_forma'); ?>" method="post" enctype="multipart/form-data">
        <p>
            <input type="file" name="userfile"/>
        </p>
        <button type="submit" class="btn btn-success">ატვირთვა</button>
        </form>
    </div><!-- /input-group -->
</div>  
</div><!-- /.col-lg-6 -->
<div class="row">
<h2>ამანათების დამატება</h2>   
    <div class="col-lg-8">
         <form role="form" action="<?php echo site_url('manager/amanati_add'); ?>" method="post">
            <div class="form-group">
                <label>ამანათის კოდი</label>
                <input class="form-control" name="amanati">
                <p class="help-block">თრექინგ კოდი</p>
            </div>
             <div class="form-group">
                <label>მფლობელი</label>
                <input class="form-control" name="saxeli">
                <p class="help-block">სახელი და გვარი</p>
            </div>
             <div class="form-group">
                <label>ოთახის ნომერი</label>
                <input class="form-control" name="kodi">
                <p class="help-block">ოთახის ნომერი ფორმატით 00000</p>
            </div>
             <div class="form-group">
                <label>სტატუსი</label>
                <select name="status">
                    <option value="m">ჩინეთში</option>
                    <option value="g">გამოგზავნილი</option>
                    <option value="c">ჩამოსული</option>
                </select>
                <p class="help-block">ამანათის ადგილმდებარეობა</p>
            </div>
             <div class="form-group">
                <label>წონა</label>
                <input class="form-control" name="weight">
                <p class="help-block">შეგვიძლია დავტოვოთ ცარიელი ამანათის ჩამოსვლამდე</p>
            </div>
             <div class="form-group">
                <label>ფასი</label>
                <input class="form-control" name="price">
                <p class="help-block">შეგვიძლია დავტოვოთ ცარიელი ამანათის ჩამოსვლამდე</p>
            </div>
            <div class="form-group">
                <label>რეისის ნომერი</label>
                <input class="form-control" name="freight">
                <p class="help-block">რეისის ნომერი ფორმატით TB0000</p>
            </div>
            <div class="form-group">
                <label>გამოგზავნის დრო</label>
                <input class="form-control" name="send_date">
                <p class="help-block">გამოგზავნის დრო ფორმატით რიცხვი/თვე/წელი 01/01/15</p>
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