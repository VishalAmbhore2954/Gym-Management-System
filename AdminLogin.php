<?php
    include('conn.php');

    if(isset($_POST['signin'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM admin WHERE username = '$user' and password = '$pass'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_num_rows($result);
        // echo "<script>alert($data)</script>";
        if($data>0){
            header('location:AdminHome.php');
        }else{
            echo "<script>alert('Wrong username or password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="AdminLogin.css">
</head>
<body>
    <div class="navbar">
        <img src="logo.png" alt="Logo" id="logo">
        <span id="logoname">
            FITNESS KING
        </span>
    </div>
    <div class="formBody">
        <div class="builder">
            <img src="Builder.png" alt="">
        </div>
        <div class="container">
                <div class="loginlogo">
                    <img src="LoginLogo.png" alt="Login Logo">
                    <h1>Login</h1>
                </div>
                <form action="#" method="POST">
                <div class="form-group">
                    <label for="">USERNAME :</label><br>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="">PASSWORD :</label><br>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" value="LOGIN" id="btn" name="signin">
                <div class="nxt">
                    <p>Don't have account?</p><a href="AdminRegister.php">Register Here</a>
                </div>
            </form>
        </div>
        <div class="builder">
            <img src="Builder.png" alt="">
        </div>
    </div>
</body>
</html>