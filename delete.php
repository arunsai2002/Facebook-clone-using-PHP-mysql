<?php
session_start();
   
   if(!isset($_SESSION['message'])){
session_destroy();
header("location:login.php");

}

   
?>
<?php
//delete the posts
if(isset($_SESSION['message'])){
    $conn = mysqli_connect("localhost","root","","users");
    $id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM `posts` WHERE id=$id");
}

?>
