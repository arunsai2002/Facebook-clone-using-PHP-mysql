<?php
session_start();
   
   if(!isset($_SESSION['message'])){
session_destroy();
header("location:login.php");

}

   
?>

<?php
$conn = mysqli_connect("localhost","root","","users");


    $text = $_POST['textarea'];
    $result0 = mysqli_query($conn,"INSERT INTO `posts`(`comments`) VALUES ('$text') WHERE `id`=54");


// $sql = "SELECT `comments` FROM `posts`";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($result);
// echo $row['comments'];


?>


