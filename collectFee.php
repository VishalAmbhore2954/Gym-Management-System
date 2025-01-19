<?php
    include('conn.php');
    error_reporting(0);
    $query = "SELECT * FROM customer WHERE status = 'Amount Remain X'";
    $data = mysqli_query($conn,$query);
    
    
    if($result = mysqli_num_rows($data)==0){
        echo "All customer paid their fees.. Thank You :)";
    }else{

    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Address</th>
            <th>Duration</th>
            <th>Fees</th>
            <th>Advance</th>
            <th>remaining Amount</th>
            <th>Gender</th>
            <th>Admition date</th>
            <th>Status</th>
            <th>Operation</th>
        </tr>
    

    <?php
    while($result = mysqli_fetch_assoc($data)){
        
        echo "<tr>
        <td>".$result['id']."</td>
        <td>".$result['name']."</td>
        <td>".$result['lname']."</td>
        <td>".$result['email']."<a href='mailto:$result[email]' id='eml'>Mail</a></td>
        <td>".$result['mno']."</td>
        <td>".$result['address']."</td>
        <td>".$result['duration']."</td>
        <td>".$result['fees']."</td>
        <td>".$result['advance']."</td>
        <td>".$result['remain']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['date']."</td>
        <td>".$result['status']."</td>
        <td><a href='RemFee.php?id=$result[id]' id='fee'>$ Fee $</a></td>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            color: white;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        table,td,th {
            border : 1px solid goldenrod;
            border-collapse : collapse;
            text-align : center;
        }

        td,th {
            padding: 5px;
            font-size : 12px;
        }

        body {
            padding: 20px;
            background-color: #141722;
        }
        a{
            background-color :rgb(255, 208, 0);
            color : black;
            border-radius : 5px;
            text-decoration : none;
            padding : 2px;
            font-size : 10px;
        }
        #fee {
            background-color : #67C21B;
        }

        #eml {
            background-color :rgb(27, 41, 194);
            color : white;
        }
    </style>
</head>
<body>
    
</body>
</html>