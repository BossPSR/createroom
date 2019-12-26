<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                
                            </div>
                            <h4 class="page-title">ห้องเรียนทั้งหมด</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

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

                <div class="row">
               
                   <?php foreach ($rooms as $room) { ?>
                  
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="media">
                                    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/room.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                            <h5 class="mt-0 font-16 mb-1">ห้อง : <?php echo $room['room']; ?></h5>
                                            <div class="font-16">วิชา : <?php echo $room['subject']; ?></div>
                                            <div class="font-16">เซค : <?php echo $room['sec']; ?></div>
                                            <div class="font-16" style="display:flex">เวลา : 
                                                <?php echo date('h:i A',strtotime($room['start_time'])); ?>
                                                <div style="justify-content: center;display: flex;align-items: center; font-size:10px; margin: 0 5px;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                                                <?php echo date('h:i A',strtotime($room['end_time'])); ?>
                                            </div>
                                            <?php 
                                                $teacher = $this->db->get_where('tbl_teacher',['id' => $room['teacher_id']])->row_array();
                                            ?>
                                            <div class="mt-0 font-16 mb-1">ผู้สอน : <?php echo $teacher['title'].$teacher['first_name'].' '.$teacher['last_name']; ?></div>
                                            
                                        <div>
                                            <a href="detail_room_student?id=<?php echo $room['id'];?>"><button type="button" class="btn btn-success"><i class="fa fa-file-text" aria-hidden="true"></i></button></a>
                                            <div style="display:inline-block" data-toggle="modal" data-target="#exampleModal<?php echo $room['id'];?>"><button type="button" class="btn btn-primary"><i class="fa fa-laptop" aria-hidden="true"></i></button></div>
                                        </div>
                                         <!-- Modal -->
                                         <div class="modal fade" id="exampleModal<?php echo $room['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="exampleModalLabel">รหัสเข้าห้องเรียน (เพื่อให้นักเรียนสามารถเข้ามาเรียนได้)</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <div class="p-20">
                                                                    <div class="form-group">
                                                                        <label>รหัสเข้าห้องเรียน <span style="color:red;">*</span></label>
                                                                        <input type="text" placeholder="" class="form-control" name="password" value="" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                         </div>
                                        <!-- End Modal -->
                                        
                                        <!-- <ul class="social-links list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fa fa-skype"></i></a>
                                            </li>
                                         -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <?php } ?>
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->