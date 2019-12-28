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
                               
                                    <h3>สร้างกล่องส่งการบ้าน (Create Box Hand In HomeWork)</h3>
                               
                                <hr><br>
                                <form action="" method="post">      
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>หัวข้อ (Title) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="name_room"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>คำอธิบาย (Description) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="sec"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ส่งก่อน (No Later Than) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="subject"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                                            <?php if(isset($type) && $type == "teacher"){ ?>
                                                                <a href="teacher_my_room"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <?php }else{ ?>
                                                                <a href="index"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <?php } ?>
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
                                <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker3').datetimepicker({
                                        format: 'LT'
                                    });
                                });
                            </script>