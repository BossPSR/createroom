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
                               
                                    <h3>ส่งการบ้าน (Home)</h3>
                               
                                <hr><br>  
                                <?php 
                                    
                                    if (isset($room)) {
                                ?>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ชื่อห้อง (Name Room) : <?php echo $room->room; ?></label>
                                                        </div>  
                                                        <div class="form-group"> 
                                                            <label>เช็ค (Sec) : <?php echo $room->sec; ?></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>วิชา (Subject) : <?php echo $room->subject; ?></label>
                                                        </div>   
                                                        <div class="form-group">
                                                            <label>เวลา (Time) : <?php echo date('h:i A',strtotime($room->start_time)); ?> - <?php echo date('h:i A',strtotime($room->end_time)); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="p-20">
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             

                                    <?php } ?> 

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">ส่งการบ้าน</button> 
                                                        <a href="student_my_room"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                    </div>
                                                </div>
                                            </div> 
                                           
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



                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ส่งการบ้าน</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <form action="home_work_process" method="post" enctype="multipart/form-data">   
                                        <div class="modal-body">
                                           
                                           
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>การบ้าน (Home Work) <span style="color:red;">*</span></label>
                                                            <input type="file" placeholder="" class="form-control" name="file_name"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>คำอธิบาย (Description) <span style="color:red;">* หากไม่มีให้ใส่ - *</span></label>
                                                            <textarea class="form-control" name="description" rows="10" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">บันทึกเอกสาร</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                            
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>