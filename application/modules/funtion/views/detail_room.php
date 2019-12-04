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
                               
                                    <h3>รายเอียดห้องเรียน (Room Detail)</h3>
                               
                                <hr><br>  
                                <?php 
                                    
                                    if (isset($room)) {
                                ?>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ชื่อห้อง (Name Room)</label>
                                                            <div class="form-control"><?php echo $room->room; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เช็ค (Sec)</label>
                                                            <div class="form-control"><?php echo $room->sec; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>วิชา (Subject)</label>
                                                            <div class="form-control"><?php echo $room->subject; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>รับกี่คน (Limit Room)</label>
                                                            <div class="form-control"><?php echo $room->limit_room; ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div>
                                             

                                    <?php } ?>      
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
