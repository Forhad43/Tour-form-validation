<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            margin-left: 200px;
        }
        input[type=text],textarea{
            width: 70%;
            padding: 10px;
            margin: 10px;
            margin-left: 200px;
            display: inline-block;
            border: 1px solid #ccc;
        }
        form{
            margin-top: 50px;
            background-repeat:no-repeat;
            background-size:cover;
        }
        input[type=radio]{
            width: 15px;
            margin: 10px;
            margin-left: 200px;
        }
        .gender{
            margin-left: 20px;
        }
        button{
            margin: 10px;
            padding: 15px;
            margin-left: 200px;
            background-color: #4CAF50;
            border: 1px solid #ccc;
        }
        h2,h4{
            text-align:center;
        }
        p{
            text-align:center;
            font-family: 'Brush Script MT';
            color:#2E8B57;
            font-size:20px;
        }
    </style>  
</head>
<body>
    <h2>Welcome to the Trip form!</h2>
    <h4>Please fill the form and then submit it to ensure your participation in the trip.</h4>
    <p id="welcome_message"></p>
    <form action="" method="post" style="background-image: url('../background.webp');">
    <label for="name">Full Name: </label><br>
    <input type="text" placeholder="Enter your name:" name="full_name" required><br>
    <label for="age">Age: </label><br>
    <input type="text" placeholder="Enter your age:" name="age" required><br>
    <label for="email">Email</label><br>
    <input type="text" placeholder="Enter your email:" name="email" required><br>
    <label for="phone">Phone: </label><br>
    <input type="text" placeholder="Enter your phone no.:" name="phone" required><br>
    <label for="gender">Gender: </label><br><br>
    <input type="radio" value="Male" name="gender" required>
    <label for="male" class="gender">Male</label><br>
    <input type="radio" value="Female" name="gender" required>
    <label for="female" class="gender">Female</label><br>
    <input type="radio" value="Others" name="gender" required>
    <label for="others" class="gender">Others</label><br><br>
    <label for="information">Other information: </label><br>
    <textarea name="information" rows="10" placeholder="Enter any other information here:" name="information"></textarea><br>
    <button type="submit" name="submit"><b>Submit</b></button>
    </form>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['full_name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $info=$_POST['information'];
    $sql="INSERT INTO tbl_form SET
    name='$name',
    age='$age',
    email='$email',
    phone='$phone',
    gender='$gender',
    info='$info'
    ";
    $com=mysqli_connect('localhost','root','') or die(mysqli_error());
    $db_select= mysqli_select_db($com,'trip_form') or die(mysqli_error());
    $res=mysqli_query($com,$sql) or die(mysqli_error());
    if($res==TRUE)
    {
        ?>
       <script>
        document.getElementById("welcome_message").innerHTML="Thanks for submitting your form. We are happy to see you joining us.";
       </script>
       <?php
    }
}
?>
</body>
</html>