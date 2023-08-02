<?php
$sql="SELECT * FROM tbl_check WHERE
state='logout' ";
$com=mysqli_connect('localhost','root','') or die(mysqli_error());
$db_select= mysqli_select_db($com,'trip_form') or die(mysqli_error());
$res=mysqli_query($com,$sql) or die(mysqli_error());
$count=mysqli_num_rows($res);
if($count>0)
{
    header('location:http://localhost/form_project/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3{
            margin:50px;
        }
        table{
            width:90%;
            margin:50px;
            border-collapse: collapse;
        }
        th,td{
            padding:10px;
            border:1px solid #ccc;
            text-align:center;
        }
        a{
            margin-right:100px;
            float:right;
            text-decoration:none;
            font-size:30px;
            color:#8D7D37;
        }
    </style>
</head>
<body>
    <a href="http://localhost/form_project/logout.php">Logout</a>
    <h3>All information about the participants:</h3>
    <table>
       <tr>
        <th>Serial No.</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Other Info.</th>
       </tr>
       <tr>
        <?php
        $sql="SELECT * from tbl_form";
        $con=mysqli_connect('localhost','root','') or die(mysqli_error());
        $select_db=mysqli_select_db($con,'trip_form') or die(mysqli_error());
        $res=mysqli_query($con,$sql) or die(mysqli_error());
        $count=mysqli_num_rows($res);
        $serial=1;
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $name=$row['name'];
                $age=$row['age'];
                $email=$row['email'];
                $phone=$row['phone'];
                $gender=$row['gender'];
                $info=$row['info'];
                ?>
                <tr>
                    <td><?php echo $serial;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $age;?></td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $phone;?></td>
                    <td><?php echo $gender;?></td>
                    <td><?php echo $info;?></td>
                </tr>
                <?php
                $serial=$serial+1;
            }
        }
        ?>
       </tr>
    </table>
</body>
</html>