<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <a href="add_room"><button class="btn btn-success">สร้างห้องเรียน <i class="mdi mdi-book-open-page-variant"></i></button></a>
                            </div>
                            <h4 class="page-title"><?php echo $user->type == 'teacher' ? "ห้องเรียนทั้งหมด":"ห้องเรียนที่นักเรียนสามารถเข้าได้"; ?></h4>
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
                   <?php $teacher = $this->db->get_where('tbl_users',['id' => $room['teacher_id']])->row();
                         if (isset($teacher)) {
                    ?>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="media">
                                    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/users/avatar-5.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0 font-18 mb-1"><?php echo $room['room']; ?></h5>
                                        
                                            <p class="text-muted font-14"><?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></p>
                                        
                                        <div>
                                            <a href="detail_room?id=<?php echo $room['id'];?>"><button type="button" class="btn btn-success">รายละเอียด</button></a>
                                            <?php if ($room['teacher_id'] == $user->id) {?>
                                            <a href="edit_room?id=<?php echo $room['id'];?>"><button type="button" class="btn btn-warning">แก้ไขห้องเรียน</button></a>
                                            <div style=""><button type="button" class="btn btn-primary">รหัสเข้าห้องเรียน</button></div>
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