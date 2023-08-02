<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width:30%;
            border: 1px solid #ccc;
            text-align:center;
            margin:5% auto;
        }
        input[type=text]{
            width: 40%;
            padding: 10px;
            margin: 20px;
            display: inline-block;
            border: 1px solid #ccc;
        }
        input[type=password]{
            width: 40%;
            padding: 10px;
            margin: 20px;
            display: inline-block;
            border: 1px solid #ccc;
        }
        form{
            margin-top: 150px;
            text-align:center;
        }
        button{
            padding: 15px;
            background-color: #4CAF50;
            margin:20px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <form action="" method="post">
    <div>
        <h2 for="login">Login</h2><br>
        <h4 id="unsuccess" style="color:#FA5F55;"></h4>
        <label for="name">User Name:</label><br>
        <input type="text" name="user_name"><br>
        <label for="pass">Password</label><br>
        <input type="password" name="pass"><br>
        <button type="submit" name="submit"><b>Submit</b></button>
    </div>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $user_name=$_POST['user_name'];
        $pass=$_POST['pass'];
        $sql="SELECT * FROM tbl_login WHERE 
        name='$user_name' AND
        password='$pass' ";
        $con=mysqli_connect('localhost','root','') or die(mysqli_error());
        $db_select= mysqli_select_db($con,'trip_form') or die(mysqli_error());
        $res=mysqli_query($con,$sql) or die(mysqli_error());
        $count=mysqli_num_rows($res);
        if($count>0)
        {
            $sql2="DELETE FROM tbl_check where state='login' ";
            $sql3="DELETE FROM tbl_check where state='logout' ";
            $res1= mysqli_query($con,$sql2) or die(mysqli_error());
            $res1= mysqli_query($con,$sql3) or die(mysqli_error());
            $sql1="INSERT INTO tbl_check SET
            state='login' ";
            $res1=mysqli_query($con,$sql1) or die(mysqli_error());
            header("Location:http://localhost/form_project/display_information.php");
        }
        else
        {
        ?>
        <script> 
        document.getElementById("unsuccess").innerHTML="user name or password did not match";
        </script>
        <?php
        }
    }
    ?>
</body>
</html>