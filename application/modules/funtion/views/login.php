<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Upcube - Responsive Flat Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="public/assets/images/favicon.ico">

        <!-- App css -->
        <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>

        <!-- Begin page -->
        
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="" class="logo logo-admin"><img src="public/assets/images/logo-dark.png" height="30" alt="logo"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="LoginMe" method="post">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                            

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            
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
        <script src="public/assets/js/waves.js"></script>
        <script src="public/assets/js/jquery.slimscroll.js"></script>
        <script src="public/assets/js/jquery.nicescroll.js"></script>
        <script src="public/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>

    </body>
</html>