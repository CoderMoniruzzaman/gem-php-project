<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMS</title>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/all.css">
    <link rel="stylesheet" href="public/css/fontawesome.css">
    <link rel="stylesheet" href="public/css/sass/style.css">
</head>

<body>
    <!-- navbar -->
    <header class="mb-5">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- logo -->
                <a class="navbar-brand" href="index.php">
                    <img src="public/public/images/Property.png" alt="" class="img-fluid">
                </a>
                <!-- logo end -->
                <!-- Toggle start -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Toggle end -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Main menu start -->
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <!-- Main menu end -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar start -->
    </header>

    <!-- navbar -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1>Registration</h1>
                        </div>
                        <div class="card-body">
                            <form action="resource/auth/registra_post.php" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Type Your Name">
                                        <?php if(!empty($_GET['namerr'])){ ?>
                                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                                            <?php echo $_GET['namerr'];?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Type Your Email">
                                        <?php if(!empty($_GET['emailerr'])){ ?>
                                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                                            <?php echo $_GET['emailerr'];?>
                                        </div>
                                        <?php }?>
                                        <?php if(!empty($_GET['extmess'])){ ?>
                                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                                            <?php echo $_GET['extmess'];?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="pass" placeholder="password">
                                        <?php if(!empty($_GET['paserr'])){ ?>
                                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                                            <?php echo $_GET['paserr'];?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label>Re-Password</label>
                                        <input type="password" class="form-control" name="re_password"
                                            placeholder="Confirm Password">
                                        <?php if(!empty($_GET['repaserr'])){ ?>
                                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                                            <?php echo $_GET['repaserr'];?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <?php if(!empty($_GET['mess'])){ ?>
                                <div class="alert alert-success mt-1" role="alert">
                                    <?php echo $_GET['mess'];?>
                                </div>
                                <?php }?>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- scripts -->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.js"></script>
    <script src="public/js/fontawesome.min.js"></script>
    <script src="public/js/custom.js"></script>
</body>

</html>