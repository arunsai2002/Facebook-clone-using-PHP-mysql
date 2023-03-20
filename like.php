<?php
session_start();
   
   if(!isset($_SESSION['message'])){
session_destroy();
header("location:login.php");

}

   
?>
<?php
if(isset($_SESSION['message'])){


$conn = mysqli_connect("localhost","root","","users");

    $id = $_GET['id'];
    $result = mysqli_query($conn,"SELECT `likes` FROM `posts` WHERE `id`=$id");
    $row = mysqli_fetch_assoc($result);
    $likes = $row['likes'];
    $result1 = mysqli_query($conn,"UPDATE `posts` SET `likes` = $likes+1 WHERE `id`=$id");
    
    echo "return back to home page and refresh";
}

?>
