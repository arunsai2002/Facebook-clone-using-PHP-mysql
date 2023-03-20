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
    

    $sql = "SELECT `dislikes` FROM `posts` WHERE `id`=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $dislikes = $row['dislikes'];
    
    
    $sql1 = "UPDATE `posts` SET `dislikes` = $dislikes+1 WHERE `id`=$id";
    $result1 = mysqli_query($conn,$sql1);

    echo "return back to home page and refresh";
}

?>
