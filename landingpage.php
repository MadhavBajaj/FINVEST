<html>
    <?php session_start(); ?>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <style>
    .button5 {
      border-radius: 50%;
      background-color: #4CAF50;
      font-size: 30px;
      padding: 16px 32px;
      border-color: white;
      
    }
    div.fixed {
      position: fixed;
      width: 50%;
      bottom: 10px;
      right: -500;
}
  </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $_SESSION['name']; ?></a>
      </li>
    </ul>
  </div>
</nav>
<div class="fixed">
<button class="button button5" onclick="myFunction()">+</button>
</div>
<script>
function myFunction() {
  location.replace("formpost.php")
}
</script>
<?php 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hackathon');
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM posts";
$result = mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    echo "<div class='card' style='width:50%;'>";
    echo "<div class='card-body'>";
    echo "<h1 class='card-title'>".$row['name']."</h1>";
    echo "<p class='card-text'>" . $row['description']. "</p>";
    echo "Idea By -: ".$row['email'];
    echo "</div>";
    echo"</div>";

}
?>
<style>
    body{
        background-image: linear-gradient(120deg, #8e44ad, #2980b9);
        align-content:center;
    }
    .card{
        margin: 0 auto; 
        float: none; 
        margin-bottom: 10px; 
    }
</style>
  </body>
</html>