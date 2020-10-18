<!DOCTYPE html>
<?php 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hackathon');
$msg = '';
$msg1 = '';
$msg2 = '';
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(isset($_POST['submit'])){
    $fullname=$_POST['fullname'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $cpass=$_POST['cpass'];
    if($fullname == '' || $email=='' || $password=='' || $cpass ==''){
        $msg = "You cannot leave any feild empty.";
    }
    elseif($password != $cpass){
        $msg1 = "Both passwords do not match.";
    }
    else{
        $sql = "SELECT * FROM registrations WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1){
            $msg2 = 'This email has already been used.';
        }
        else{
            $insert = "INSERT INTO registrations(name, email, password) VALUES('$fullname','$email','$password')";
            $iquery = mysqli_query($con, $insert);
            if($iquery){
                echo'YOUR ACCOUNT HAS SUCCESSFULY BEEN MADE';
                header('location : login.php');
                session_start();
                $_SESSION['name'] = $fullname;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
            }
        }
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="h1">
            Create Account
        </h1>
        <form method="post">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text"  class="form-control" name="fullname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div>
                <label for="cpass">Confirm Password</label>
                <input type="password" class="form-control" name="cpass">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            <br>
            <a href="login.php">Already Have An Account</a>
        </form>
        <?php if($msg != ""){ echo $msg;} ?>
        <?php if($msg1 != ""){ echo $msg1;} ?>
        <?php if($msg2 != ""){ echo $msg2;} ?>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    body{
        text-align: center;
        background-image: linear-gradient(120deg, #8e44ad, #2980b9);
    }
    .container{
        background-color:white;
        margin-top:5%;
        color:black;
        border-radius: 11px;
        width:auto;
        height: 65%;
        margin-left:25%;
        margin-right: 25%;
        box-shadow:5px 5px 50px #d1d1d1;
        margin-bottom: auto;
    }
    .form-control{
        align-content: center;
        width:40%;
        display: block;
        margin:auto;
    }
    button{
        margin-top:20px;
    }
    .h1{
        margin-bottom:10px;
    }
</style>
</body>
</html>