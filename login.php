<!DOCTYPE html>
<html lang="en">
<?php 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hackathon');
$msg = '';
$msg1 = '';
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM registrations WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1){
        echo'You are logged in';
        header('location: landingpage.php');
    }
    else{
        echo'Credentials are invalid';
    }
}
?>
<head>
<h1>
FINVEST
</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>
            LOGIN
        </h1>
        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type='email' name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div>
                <button class="btn btn-primary" name="login">
                    Login
                </button>
            </div>
            <br>
            <a href="signup.php">Already Have An Account</a>
            <br>
            <?php if($msg != ""){ echo $msg;} ?>
            <br>
        </form>
    </div>
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
        width:20%;
    }
    button{
        margin-top:20px;
    }
    .h1{
        margin-bottom:10px;
    }
    </style>
</body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</html>