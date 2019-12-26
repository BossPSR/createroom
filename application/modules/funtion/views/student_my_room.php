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
               
                  
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="media">
                                    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/room.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                            
                                            
                                        <div>
                                            

                                            <!-- Modal -->

     
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

                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->