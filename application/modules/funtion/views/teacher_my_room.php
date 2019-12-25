<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <a href="add_room?type=teacher"><button class="btn btn-success">สร้างห้องเรียน <i class="mdi mdi-book-open-page-variant"></i></button></a>
                            </div>
                            <h4 class="page-title">ห้องเรียนของฉัน</h4>
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
                   <?php $teacher = $this->db->get_where('tbl_teacher',['id' => $room['teacher_id']])->row();
                         if (isset($teacher)) {
                    ?>
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
                                            <div class="mt-0 font-16 mb-1">ผู้สอน : <?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></div>
                                            
                                        <div>
                                            <a href="detail_room?id=<?php echo $room['id'];?>&type=teacher"><button type="button" class="btn btn-success"><i class="fa fa-file-text" aria-hidden="true"></i></button></a>
                                            <?php if ($room['teacher_id'] == $user['id']) { ?>
                                            <a href="edit_room?id=<?php echo $room['id'];?>&type=teacher"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>
                                            <a href="delete_room?id=<?php echo $room['id'];?>&type=teacher" onclick="return confirm('ท่านต้องการลบห้องเรียน ?')"><button type="button" class="btn btn-danger" onclick="myDelete()"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                            <div style="display:inline-block" data-toggle="modal" data-target="#exampleModal<?php echo $room['id'];?>"><button type="button" class="btn btn-primary"><i class="fa fa-key" aria-hidden="true"></i></button></div>
                                            <a href="file_teacher?id=<?php echo $room['id'];?>&type=teacher"><button type="button" class="btn btn-info"><i class="fa fa-file-archive-o" aria-hidden="true"></i></button></a>

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
                                                    <div class="modal-body">
                                                       <div style="font-size:16px;">รหัสเข้าห้องเรียน : <?php echo $room['generate'];?></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <?php } ?>
                                        </div>


                                        
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
                   <?php } ?>
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->