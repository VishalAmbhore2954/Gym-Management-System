<?php
    include('conn.php');


    if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];
        $address = $_POST['address'];
        $duration = $_POST['duration'];
        $fees = $_POST['fees'];
        $advance = $_POST['advance'];
        $gender = $_POST['gender'];
        if(!empty($_POST['fees']&&$_POST['advance'])){
            $fees1 = $_POST['fees'];
            $advance1 = $_POST['advance'];
            $remain = $fees1 - $advance1;
        }

        if(!empty($_POST['fees']&&$_POST['advance'])){
            $fees1 = $_POST['fees'];
            $advance1 = $_POST['advance'];
            if($fees1>$advance1){
                $status = "Amount Remain X";
            }else{
                $status = "Paid";
            }
        }
        
        $sql = "INSERT INTO `customer`(`name`, `lname`, `email`, `mno`, `address`, `duration`, `fees`, `advance`, `remain`, `gender`, `status`) VALUES ('$fname','$lname','$email','$mno','$address','$duration','$fees','$advance','$remain','$gender','$status')";

        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Data inserted successfully')</script>";
            ?>
                <meta http-equiv="refresh" content="0; url=AdminHome.php" />
            <?php
            }else{
            echo "<script>alert('Data not inserted')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="UserForm.css">
</head>
<body>

    <div class="container">
        <form method="POST">
            <h2><img src="logo.png" alt="">REGISTER USER<img src="logo.png" alt=""></h2>
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
            <label for="">Enter Address :</label><br>
            <input type="text" name="address" required>
        </div>
        <div class="form-group">
            <label for="">Enter Duration in Month :</label><br>
            <input type="text" name="duration" required>
        </div>
        <div class="form-group">
            <label for="">Enter Total Fee :</label><br>
            <input type="text" name="fees" required>
        </div>
        <div class="form-group">
            <label for="">Enter Advance Fee :</label><br>
            <input type="text" name="advance" required>
        </div>
        <div id="gender">
            <label for="">Gender :</label>
            <input type="radio" name="gender" value="Male">  Male
            <input type="radio" name="gender" value="Female">  Female
        </div>
        <input type="submit" name="submit" id="btn" value="REGISTER">
    </div>
        </form>

</body>
</html>