<?php
    include('conn.php');

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if($password != $cpassword){
            echo "<script>alert('password and confirm password not match')</script>";
        }else{

          $sql = "INSERT INTO `admin` (`name`,`lname`,`email`,`mno`,`username`,`password`,`cpassword`) VALUES ('$fname','$lname','$email','$mno','$username','$password','$cpassword')";

            $result = mysqli_query($conn,$sql);

            if($result){
                echo "<script>alert('Data inserted successfully')</script>";
             }else{
                echo "<script>alert('Data not inserted')</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="AdminRegister.css">
</head>
<body>
    <div class="logo">
        <img src="logo.png" alt="">
        <label for="">FITNESS KING</label>
    </div>
</div>
    <div class="container">
        <form method="POST">
            <h2>REGISTRATION</h2>
        <div class="form-group">
            <label for="">Enter First Name :</label><br>
            <input type="text" name="fname" required>
        </div>
        <div class="form-group">
            <label for="">Enter Last Name :</label><br>
            <input type="text" name="lname" required>
        </div>
        <div class="form-group">
            <label for="">Email ID :</label><br>
            <input type="text" name="email" required>
        </div>
        <div class="form-group">
            <label for="">Enter Mobile Number :</label><br>
            <input type="text" name="mno" required>
        </div>
        <div class="form-group">
            <label for="">Enter Username :</label><br>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label for="">Enter Password :</label><br>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="">Enter Confirm Password :</label><br>
            <input type="password" name="cpassword" required>
        </div>
        <input type="submit" name="submit" id="btn" value="REGISTER">
        <div class="nxt">
            <p>Already have account?</p><a href="AdminLogin.php">Login Here</a>
        </div>
    </div>
        </form>
    <div class="logo">
        <img src="logo.png" alt="">
        <label for="">FITNESS KING</label>
    </div>
</body>
</html>