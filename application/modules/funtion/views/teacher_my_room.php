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
                            $zoom_id = $this->db->get_where('tbl_zoom',['room_id' => $room['id']])->row_array();  
                    ?>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="media">
                                    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/room.jpg" alt="Generic placeholder image">
                                    <div class="media-body" style="position:relative;">
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
                                            <a href="detail_room?id=<?php echo $room['id'];?>&type=teacher"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="รายละเอียดห้องเรียน"><i class="fa fa-file-text" aria-hidden="true"></i></button></a>
                                            <?php if ($room['teacher_id'] == $user['id']) { ?>
                                            <a href="edit_room?id=<?php echo $room['id'];?>&type=teacher"><button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="แก้ไขห้องเรียน"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>
                                            <a href="delete_room?id=<?php echo $room['id'];?>&type=teacher" onclick="return confirm('ท่านต้องการลบห้องเรียน ?')"><button type="button" class="btn btn-danger" onclick="myDelete()" data-toggle="tooltip" data-placement="bottom" title="ลบห้องเรียน"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                            <div style="display:inline-block" data-toggle="modal" data-target="#exampleModal<?php echo $room['id'];?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="รหัสเข้าห้องเรียน"><i class="fa fa-key" aria-hidden="true"></i></button></div>
                                            <a href="file_teacher?id=<?php echo $room['id'];?>&type=teacher"><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="เอกสารประกอบการเรียน"><i class="fa fa-file-archive-o" aria-hidden="true"></i></button></a>
                                            <div style="position:absolute; top:0; right:0;">      
                                                <a href="box_homework?id=<?php echo $room['id'];?>&type=teacher" style="display: inline-block;"><button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="กล่องส่งการบ้าน">การบ้าน <i class="fa fa-archive" aria-hidden="true"></i></button></a>
                                            </div>
                                            <!-- <a href="<?php echo $zoom_id['zoom_url']; ?>" target="_blank" <?php echo ($zoom_id['zoom_url'] ? '$zoom_id['."'zoom_url'".']' : " ");?>><button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="เข้าห้องเรียน"><i class="fa fa-flickr" aria-hidden="true"></i></button></a> -->
                                            <div style="display:inline-block" data-toggle="modal" data-target="#exampleModalMeeting<?php echo $room['id'];?>"><button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="การประชุมวิดีโอ"><i class="fa fa-video-camera" aria-hidden="true"></i></button></div>
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

                                                <div class="modal fade" id="exampleModalMeeting<?php echo $room['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="exampleModalLabel">ลิงค์ของฉัน (เพื่อให้นักเรียนสามารถเข้ามาเรียนได้)</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="google_hangouts_success" method="POST">
                                                        <input type="hidden" name="teacher_id" value="<?php echo $user['id']; ?>">
                                                        <input type="hidden" name="type" value="teacher_my_room">
                                                        <div class="modal-body">
                                                            <div style="color:red;">**หากไม่มีให้คลิกปุ่มนี้<a href="https://gsuite.google.com/intl/th/products/meet/?utm_source=google&utm_medium=cpc&utm_campaign=japac-TH-all-th-dr-bkws-all-golden-remotework-e-dr-1008070&utm_content=text-ad-none-none-DEV_c-CRE_427114312538-ADGP_Hybrid%20%7C%20AW%20SEM%20%7C%20BKWS%20~%20EXA%20%7C%20Hangouts%20%7C%20%5B1:1%5D%20%7C%20TH%20%7C%20TH%20%7C%20Google%20Hangout-KWID_43700052569444208-kwd-37763983073-userloc_21036-network_g&utm_term=KW_google%20hangout&gclid=Cj0KCQjwybD0BRDyARIsACyS8msmtO-3R2k2dw9DXk8Z8MgrGubZcgug1eCNFSx7r3lmy-VG_Vv_o6AaAk6cEALw_wcB&gclsrc=aw.ds" target="_blank" style="display:inline-block; margin:0 5px;"><button type="button" class="btn btn-warning"><i class="fa fa-google" aria-hidden="true"></i></button></a>เพื่อไปยัง Google Hangout**</div>
                                                            <div><label>ลิงค์ Google Hangouts</label><input class="form-control" type="text" name="google_hangouts" id="" value="<?php echo $user['google_hangouts']; ?>"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">
                                                                บันทึก
                                                            </button>
                                                        </div>
                                                    </form>
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