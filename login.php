<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('admin_image/blood-cells.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 400px;
            background-image: url('admin_image/glossy1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
</head>
<body>

    <div class="container">
        <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username<span style="color:red">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span style="color:red">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
        include 'conn.php';

        if(isset($_POST["login"])){

            $username=mysqli_real_escape_string($conn,$_POST["username"]);
            $password=mysqli_real_escape_string($conn,$_POST["password"]);

            $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
            $result=mysqli_query($conn,$sql) or die("query failed.");

            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION["username"]=$username;
                    header("Location: dashboard.php");
                }
            }
            else {
                echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
            }

        }
    ?>

</body>
</html>
