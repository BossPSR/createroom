   <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       
      <!--   <link rel="shortcut icon" href="public/assets/4.png"> -->
        <link href="https://fonts.googleapis.com/css?family=Maitree" rel="stylesheet">
        <!-- Plugins css -->
        <link href="public/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="public/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <!-- DataTables -->
        <link href="public/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="public/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="public/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!--Morris Chart CSS -->
        
        <link rel="stylesheet" href="public/assets/plugins/morris/morris.css">
        <!-- bootstrap -->
        <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="public/assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- fileupload  -->
        <link href="public/assets/fileupload/css/uploads.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
<br>
 <hr>
        <!-- Begin page -->
      

        <div class="wrapper-page" style="margin-top: 0px">
            
          

            

            <div class="card">
                <div class="card-body">
                    <h4 class="text-muted text-center font-18"><b>สมัครเข้าใช้ระบบ</b></h4>

                    <div class="p-3">
                        <!-- flashdata start-->
                        <?php if($response = $this->session->flashdata('response') ):?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo $response; ?> <a class="alert-link" href="#"></a>.
                        </div>
                        <?php endif; ?>
                        <?php if($msg = $this->session->flashdata('msg') ):?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo $msg; ?> <a class="alert-link" href="#"></a>.
                        </div>
                        <?php endif; ?>

                        <form class="form-horizontal m-t-20" action="Register_complete" method="POST">

                            <div class="form-group row">
                                
                                <div class="col-12">
                                    <input class="form-control" type="text" placeholder="รหัสประชาชน" name="Public_code" id="Public_code" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="ชื่อ" name="Frist_name" id="Frist_name" required>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="นามสกุล" name="last_name" id="last_name" required>
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="number" placeholder="รหัสนักศึกษา" name="code_student" id="code_student" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <input class="form-control" type="password" placeholder="รหัสผ่าน" name="password" id="password" required>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="password" placeholder="ยืนยันรหัสผ่าน" name="cpassword" id="confirm_password" required>
                                </div>
                                <span id="message" style="margin-left: 14px;"></span>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" placeholder="อีเมล" name="email" id="email" required>
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" placeholder="เบอร์โทร" name="tel" id="tel" required>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-6">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">สมัคร</button>
                                </div>
                                <div class="col-6">
                                    <a href="Login"><button class="btn btn-basic btn-block waves-effect waves-light" type="button">เข้าสู่ระบบ</button></a>
                                </div>

                            </div>   
                          <!--  <a href=""><div style="text-align: center; font-size: 12px ">สมัครขอรับทุน</div></a>  -->
                          
                          <!--   <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                </div>
                            </div> -->
                        </form>
                    </div>

                </div>
            </div>
        </div>

<!-- jQuery  -->
<script src="public/assets/js/jquery.min.js"></script>
<script src="public/assets/js/popper.min.js"></script>
<script src="public/assets/js/bootstrap.min.js"></script>
<script src="public/assets/js/modernizr.min.js"></script>
<script src="public/assets/js/detect.js"></script>
<script src="public/assets/js/fastclick.js"></script>
<script src="public/assets/js/jquery.slimscroll.js"></script>
<script src="public/assets/js/jquery.blockUI.js"></script>
<script src="public/assets/js/waves.js"></script>
<script src="public/assets/js/jquery.nicescroll.js"></script>
<script src="public/assets/js/jquery.scrollTo.min.js"></script>

<!-- Plugins js -->
<script src="public/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<!-- Plugins Init js -->
<script src="public/assets/pages/form-advanced.js"></script>
<!--Morris Chart-->

<script src="public/assets/plugins/morris/morris.min.js"></script>
<script src="public/assets/plugins/raphael/raphael-min.js"></script>
<script src="public/assets/pages/dashborad.js"></script>

<!-- Required datatable js -->
<script src="public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="public/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="public/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="public/assets/plugins/datatables/jszip.min.js"></script>
<script src="public/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="public/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="public/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="public/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="public/assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="public/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="public/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    var t = $('.example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
<!--Wysiwig js-->
<script src="public/assets/plugins/tinymce/tinymce.min.js"></script>
<script>
    $(document).ready(function () {
        if($("#elm1").length > 0){
            tinymce.init({
                selector: "textarea#elm1",
                theme: "modern",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        }
    });
</script>
<script>
    $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('');
    }else
        $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
    });
</script>
<script src="public/assets/fileupload/global.js" type="text/javascript"></script>
<script src="public/assets/fileupload/js/uploadslider.js" type="text/javascript"></script>


      
<!-- Datatable init js -->
<script src="public/assets/pages/datatables.init.js"></script>
<!-- App js -->
<script src="public/assets/js/app.js"></script>


</body>
</html>
