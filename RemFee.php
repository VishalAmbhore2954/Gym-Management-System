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
    <link rel="stylesheet" href="RemFee.css">
</head>
<body>

    <div class="container">
        <form method="POST">
            <h2><img src="logo.png" alt="">Collect Fee<img src="logo.png" alt=""></h2>
            <div class="form-group">
            <label for="">Customer Id :</label><br>
            <input type="text" name="id" value="<?php echo $result['id']?>" required>
        </div>
        <div class="form-group">
            <label for="">Total Fee :</label><br>
            <input type="text" name="fees" value="<?php echo $result['fees']?>" required>
        </div>
        <div class="form-group">
            <label for="">Advanced Fee :</label><br>
            <input type="text" name="advance" value="<?php echo $result['advance']?>" required>
        </div>

        <div class="form-group">
            <label for="">Remain Fee :</label><br>
            <input type="text" name="remain" Style="color:red" value="<?php echo $result['remain']?>" required>
        </div>

        <div class="form-group">
            <label for="">Enter amount to Credit :</label><br>
            <input type="text" name="crfee" value="<?php echo $result['remain']?>" Style="color:green" required>
        </div>
        
        <input type="submit" name="submit" id="btn" value="Collect Fee">
    </div>
        </form>

</body>
</html>

<?php
    if($_POST['submit']){
        $crfee = $_POST['crfee'];
        $advance = $_POST['advance'] + $crfee;

        if(!empty($_POST['fees']&&$_POST['advance'])){
            $advance1 = $_POST['advance'] + $crfee;
            $remain = $_POST['fees'] - $advance1;
        }

        if(!empty($_POST['fees']&&$_POST['advance'])){
            $advance1 = $_POST['advance'] + $crfee;
            if($_POST['fees']>$advance1){
                $status = "Amount Remain &#10060;";
            }else{
                $status = "Paid &#9989;";
            }
        }
        
        $sql = "UPDATE customer SET advance='$advance', remain = '$remain', status ='$status'  WHERE id = '$id'";

        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Collected $crfee Rupees')</script>";
            ?>
                <meta http-equiv="refresh" content="0; url=AdminHome.php" />
            <?php
            }else{
            echo "<script>alert('Problem to credit')</script>";
        }
    }
?>