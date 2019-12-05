
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
                               <!-- flashdata start-->
                                    <?php if($success = $this->session->flashdata('response')):?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $success; ?> <a class="alert-link" href="#"></a>.
                                    </div>
                                    <?php elseif($error = $this->session->flashdata('msg')):?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <?php echo $error; ?> <a class="alert-link" href="#"></a>.
                                    </div>
                                <?php endif; ?>
                                        
                            <!-- flashdata end-->
                                    <h3>เอกสารประกอบการเรียน (Handout)</h3>
                                    <h4>ห้องเรียน : <?php echo $room['room']; ?></h4>
                                    <h4>วิชา : <?php echo $room['subject']; ?></h4>
                                    <h4>เซค : <?php echo $room['sec']; ?></h4>
                               
                                <hr><br>  
                                <?php 
                                    
                                    if (!empty($file)) {
                                ?>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เอกสารประกอบการเรียน (Handout)</label>
                                                            <?php foreach ($file as $file) { ?>
                                                                <a href="<?php echo site_url('downloadDocument?id=').$file['id']; ?>" style="display:inline-block ;"><button class="btn btn-success btn-block waves-effect waves-light" type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ดาวน์โหลดเอกสาร</button></a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                               

                                               
                                            </div>
                                             

                                    <?php } ?> 
                                        <form action="file_teacher_process" method="post" enctype="multipart/form-data"> 
                                        <input type="hidden" name="room_id" value="<?php echo $room['id']; ?>">
                                            <div class="row">     
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เพิ่มเอกสารประกอบการเรียน (Add Handout) <span style="color:red;">*</span></label>
                                                            <input type="file" placeholder="" class="form-control" name="file_name"  required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>คำอธิบาย (Description)</label>
                                                            <textarea class="form-control" name="description" rows="10"></textarea>
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
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                            $('#blah').attr('src', e.target.result);
                                            }
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                        }

                                        $("#imgInp").change(function() {
                                        readURL(this);
                                        });
                                </script>
