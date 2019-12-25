<br>
<br>
<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <!-- Top Bar Start -->
       <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                   
                                </ol>
                            </div>
                            <h4 class="page-title"></h4>
                        </div>
                    </div>
                </div>
        <!-- Top Bar End -->
        <br>
        <br>
        <br>
        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">
                        <div class="card m-b-30">
                            <div class="card-body">
                               
                                    <h3>โปรไฟล์ (Profile)</h3>
                               
                                <hr><br>
                                <form action="add_room_process" method="post">      
                                            <div class="row">
                                            <?php if(isset($type)){ ?>
                                                <input type="hidden" name="type" value="<?php echo $type; ?>">

                                            <?php } ?>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>Username (Username) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="username"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>คำนำหน้าชื่อ (Title) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="title"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ชื่อ (First Name) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="first_name"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>นามสกุล (Last Name) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="last_name"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>        
                                                            <a href="index"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                                </div> <!-- end col -->
                                </div> <!-- end row -->
                                </div><!-- container -->
                                </div> <!-- Page content Wrapper -->
                                </div> <!-- content -->
                               
