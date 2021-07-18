<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../appchat/public/css/register/register_style.css">
    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome to TMess</h3>
                <input type="submit" name="" value="Login" /><br />
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Register Now And Connect with your friends!!!</h3>
                        <div class="row register-form">
                            <form action="" method="post">
                                <div class="form-row">
                                <span class="badge badge-success" style="<?php echo (isset($data['Success']))? "display:visible": "display:none";?>">
                                    <?php echo (isset($data['Success']))? $data['Success']:"";?>
                                </span>     
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                        
                                        <span class="badge badge-danger" style="<?php echo (isset($data['Error']))? "display:visible": "display:none";?>">
                                            <?php echo (isset($data['Error']))? $data['Error']:"";?>
                                        </span>
                                        </br>
                                        <input type="password" class="form-control" name="pass" placeholder="Password">
                                        </br>
                                        <input type="password" class="form-control" name="prePass" placeholder="prePassword">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Name">
                                        <div class="form-group">    
                                            <input type="submit" class="btnRegister"  value="Register"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>