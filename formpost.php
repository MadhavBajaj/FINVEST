<html>
<?php 
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hackathon');
$msg = '';
$msg1 = '';
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(isset($_POST['submit'])){
    $company = $_POST['companyname'];
    $desc = $_POST['desc'];
    $email = $_SESSION['email'];
    if($company == "" || $desc == ""){
        echo"Please enter all credentials";
    }
    else{
        $iquery = "INSERT INTO posts(name, description, email) VALUES('$company','$desc','$email') ";
        $insert = mysqli_query($con, $iquery);
        $msg = "Post has been created"; 
    }
    
}
?>
  <head>
    <style>
    
      body{
        background-image: linear-gradient(120deg, #40739e, #9c88ff);
      }
      
      .container{
        width:30px;
        height:auto;
        position: relative;
        background: #f5f6fa;
        margin:50px;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 0 20px #192a56 ;
        
      }
      
      .form-group{
        padding:10px;
      }
      
      .btn{
        top:50%;
        left:50%;
        position: relative;
        transform: translateY(-50%) translateX(-50%);
        margin-top: 30px;
      }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <div class=container>
<form method="post">
  <div class="form-group">
    <input class="form-control" name="companyname" placeholder="Company Name">
  </div>
  <div class="form-group">
    <label for="chooseFile">Photos</label>
    <input type="file" class="form-control-file" name="choosefile">
  </div>
  <div class="form-group">
      <label>Business Description</label>
    <textarea rows="5" class="form-control" placeholder="Post Description" name="desc"></textarea>
  </div>
  <?php if ($msg != ""){ echo $msg;}  ?>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
</form>
</div>

</body>
</html>