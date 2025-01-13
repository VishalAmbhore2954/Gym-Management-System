<?php
    $conn = mysqli_connect("localhost","root","","GYM");
    if($conn == false){
        echo "<script>alert('Database Connection error'.mysqli_connect_error)</script>";
    }else{
        // echo "<script>alert('Database Connection successfull!')</script>";
    }
?>