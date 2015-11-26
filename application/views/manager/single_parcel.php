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
             <i class="fa fa-table"></i> <?php echo $single_parcel['amanati']; ?>
            </li>
        </ol>
    </div>
</div>
               

<div class="row">
<h2>ამანათის რედაქტირება</h2> 
    <div class="col-md-6">
          <form role="form" action="<?php echo site_url('manager/amanati_update/'.$single_parcel['id']); ?>" method="post">
            <div class="form-group">
                <label>ამანათის კოდი</label>
                <input class="form-control" name="amanati" value="<?php echo $single_parcel['amanati']; ?>">
                <p class="help-block">თრექინგ კოდი</p>
            </div>
             <div class="form-group">
                <label>მფლობელი</label>
                <input class="form-control" name="saxeli" value="<?php echo $single_parcel['saxeli']; ?>">
                <p class="help-block">სახელი და გვარი</p>
            </div>
             <div class="form-group">
                <label>ოთახის ნომერი</label>

                <input class="form-control" name="kodi" value="<?php echo 'TSG'.str_pad($single_parcel['kodi'],5,'0',STR_PAD_LEFT);; ?>">
                <p class="help-block">ოთახის ნომერი ფორმატით 00000</p>
            </div>
             <div class="form-group">
                <label>სტატუსი</label>
                <select name="status">
                    <option value="m" <?php echo $single_parcel['status']=='m'?'selected':'';?>>ჩინეთში</option>
                    <option value="g" <?php echo $single_parcel['status']=='g'?'selected':'';?>>გამოგზავნილი</option>
                    <option value="c" <?php echo $single_parcel['status']=='c'?'selected':'';?>>ჩამოსული</option>
                </select>
                <p class="help-block">ამანათის ადგილმდებარეობა</p>
            </div>
             <div class="form-group">
                <label>წონა</label>
                <input class="form-control" name="weight" value="<?php echo $single_parcel['weight']; ?>">
                <p class="help-block">შეგვიძლია დავტოვოთ ცარიელი ამანათის ჩამოსვლამდე</p>
            </div>
             <div class="form-group">
                <label>ფასი</label>
                <input class="form-control" name="price" value="<?php echo $single_parcel['price']; ?>">
                <p class="help-block">შეგვიძლია დავტოვოთ ცარიელი ამანათის ჩამოსვლამდე</p>
            </div>
             <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-right"> დამახსოვრება</span></button>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label>რეისის ნომერი</label>
                <input class="form-control" name="freight" value="<?php echo $single_parcel['freight']; ?>">
                <p class="help-block">რეისის ნომერი ფორმატით TB0000</p>
            </div>
            <div class="form-group">
                <label>გამოგზავნის დრო</label>
                <input class="form-control" name="send_date" value="<?php echo $single_parcel['send_date']; ?>">
                <p class="help-block">გამოგზავნის დრო ფორმატით რიცხვი/თვე/წელი 01/01/15</p>
            </div>
            <div class="form-group">
                <label>დეკლარაცია:ვებ-გვერდი</label>
                <input class="form-control" name="webpage" value="<?php echo $single_parcel['webpage']; ?>">
                <p class="help-block">კლიენტის მიერ შევსებული დეკლარაცია</p>
            </div>
            <div class="form-group">
                <label>დეკლარაცია:ნივთი</label>
                <input class="form-control" name="item" value="<?php echo $single_parcel['item']; ?>">
                <p class="help-block">კლიენტის მიერ შევსებული დეკლარაცია</p>
            </div>
            <div class="form-group">
                <label>დეკლარაცია:ფასი</label>
                <input class="form-control" name="item_price" value="<?php echo $single_parcel['item_price']; ?>">
                <p class="help-block">კლიენტის მიერ შევსებული დეკლარაცია</p>
            </div>
           
        </form>
    </div>
    
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->