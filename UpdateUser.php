<?php
    include('conn.php');
    error_reporting(0);
    $id = $_GET['id'];
    $query = "SELECT * FROM customer WHERE id = '$id'";
    $data = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="UpdateUser.css">
</head>
<body>

    <div class="container">
        <form method="POST">
            <h2><img src="logo.png" alt="">UPDATE USER<img src="logo.png" alt=""></h2>
            <!-- <div class="form-group">
            <label for="">Customer Id :</label><br>
            <input type="text" name="id" value="<?php echo $result['id']?>" required>
        </div> -->
        <div class="form-group">
            <label for="">Enter First Name :</label><br>
            <input type="text" name="fname" value="<?php echo $result['name']?>" required>
        </div>
        <div class="form-group">
            <label for="">Enter Last Name :</label><br>
            <input type="text" name="lname" value="<?php echo $result['lname']?>" required>
        </div>
        <div class="form-group">
            <label for="">Email ID :</label><br>
            <input type="text" name="email" value="<?php echo $result['email']?>" required>
        </div>
        <div class="form-group">
            <label for="">Enter Mobile Number :</label><br>
            <input type="text" name="mno" value="<?php echo $result['mno']?>" required>
        </div>
        <div class="form-group">
            <label for="">Enter Address :</label><br>
            <input type="text" name="address" value="<?php echo $result['address']?>" required>
        </div>
        <div class="form-group">
            <label for="">Enter Duration in Month :</label><br>
            <input type="text" name="duration" value="<?php echo $result['duration']?>" required>
        </div>
        <div class="form-group">
            <label for="">Enter Total Fee :</label><br>
            <input type="text" name="fees" value="<?php echo $result['fees']?>" required>
        </div>
        <div class="form-group">
            <label for="">Enter Credited Fee :</label><br>
            <input type="text" name="advance" value="<?php echo $result['advance']?>" required>
        </div>
        <!-- <div id="gender">
            <label for="">Gender :</label>
            <input type="radio" name="gender" value="Male" >  Male
            <input type="radio" name="gender" value="Female">  Female
        </div> -->
        <input type="submit" name="submit" id="btn" value="UPDATE">
    </div>
        </form>

</body>
</html>

<?php
    if($_POST['submit']){

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
                $status = "Paid &#9989;";
            }
        }
        
        $sql = "UPDATE customer SET name = '$fname', lname = '$lname', email = '$email',mno = '$mno', address = '$address' , duration = '$duration',fees = '$fees', advance='$advance', remain = '$remain',status ='$status'  WHERE id = '$id'";

        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Data updated successfully')</script>";
            ?>
                <meta http-equiv="refresh" content="0; url=AdminHome.php" />
            <?php
            }else{
            echo "<script>alert('Data not Updated')</script>";
        }
    }
?>