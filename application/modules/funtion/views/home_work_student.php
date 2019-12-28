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
                                                        <?php $teacher = $this->db->get_where('tbl_teacher',['id'=> $room->teacher_id])->row();?>
                                                        <div class="form-group">
                                                            <label>ผู้สอน (Teacher): <?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="p-20">
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             

                                    <?php } ?> 

                                    <?php 
                                    
                                        if (!empty($home_work)) {
                                    ?>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label style="font-size:18px;">การบ้านของฉัน (My Home Work)</label>
                                                            <div>
                                                                <?php foreach ($home_work as $key => $home_work) { 
                                                                    $nameFile = explode('.',$home_work['file_name']);
                                                                ?>
                                                                    <label style="display:block;"></label>
                                                                        <a class="form-group" href="<?php echo site_url('downloadHomework_student?id=').$home_work['id']; ?>" style="display:inline-block ;"><button class="btn btn-info btn-block waves-effect waves-light" type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $home_work['file_name'];?></button></a>
                                                                        <a href="delete_home_work?id=<?php echo $home_work['id'];?>&room_id=<?php echo $home_work['room_id'];?>"  onclick="return confirm('ท่านต้องการลบเอกสารประกอบการเรียน ?')"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบเอกสารประกอบการเรียน</button></a>
                                                                    <div class="form-group">
                                                                        <label>คำอธิบาย (Description)</label>
                                                                        <textarea class="form-control" rows="10" readonly><?php echo empty($home_work['description']) ? "-" : $home_work['description'] ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>ส่งเมื่อ (Send On)</label>
                                                                        <div class="form-control"><?php echo date('วันที่ d-m-Y เวลา H:i:s น.',strtotime($home_work['send_on'])); ?></div>
                                                                    </div>
                                                                   <hr style="border-top:3px solid rgba(0,0,0,.1)">
                                                                <?php } ?>
                                                            </div>
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
                                        <?php 
                                    
                                             if (isset($room)) {
                                        ?>
                                           <input type="hidden" name="id" value="<?php echo $room->id; ?>">
                                        <?php 
                                             }
                                        ?>
                                           
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