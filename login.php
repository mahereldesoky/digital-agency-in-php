<title>login</title>

<?php 
include('./admin/config/config.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>
<body>
    <?php if (isset($_SESSION['auth'])){   ?>
    <div class="py-5" style="margin-top: 400px;">
        <div class="container text-center d-flex justify-content-center align-items-center">
        <h2 class="bg-warning ">Hey! You Already Logged In</h2>
        </div>
    </div>
    <?php } ?>
    <?php if (!isset($_SESSION['auth'])){   ?>
    <div class="py-5">
        <div class="container py-5 ">
            <div class="row justify-content-center py-5">
                <div class="col-md-6 py-5">
                <?php include('./admin/message.php'); ?> 
                    <div class="card ">
                        <div class="card-header">
                            <h4>login</h4>
                        </div>
                        <div class="card-body">

                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Email Id</label>
                                <input type="email" name="email" placeholder="Enter Email adress" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="login_btn" >Login Now</button>
                            </div>
                        </form>    
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php } ?>
</body>
</html>








