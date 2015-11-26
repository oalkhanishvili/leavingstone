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
                            მბრუნავი სლაიდერი
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href=<?php echo site_url('manager');?>>მთავარი</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i><a href=<?php echo site_url('manager/slider');?>> მბრუნავი სლაიდერი</a>
                            </li>
                            <li class="active">
                             <i class="fa fa-table"></i> მბრუნავი სლაიდერის დამატება
                            </li>
                        </ol>
                    </div>
               

                <div class="row">
                    <div class="col-lg-8">
                            <div class="form-group">
                                <label>სათაური</label>
                            <?php echo form_open_multipart('manager/insert_slider');?>
                                <input name="title" class="form-control">
                                
                                <label>კონტენტი</label>
                                <p><textarea name="content" id="editor1" rows="10" cols="80"></textarea>
                                </p>
                                <p>
                                    <label>გადასასვლელი ლინკი</label>
                                    <input name="link" class="form-control">
                                    <p>დატოვეთ ცარიელი თუ არ გსურთ გამოყენება</p>
                                </p>
                                <p>
                                    <label>პოზიცია მენიუში</label>
                                    <input name="position" class="form-control">
                                </p>
                                <p> 
                                    <label>ფაილის ზომა უნდა იყოს 900x320</label>
                                    <input type="file" name="userfile" size="20" />
                                </p>
                                <button type="submit">დამატება</button>
                            </form>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->