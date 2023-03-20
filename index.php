<?php
//session for logout
session_start();
   if(isset($_POST['logout'])){

    session_destroy();
    header("location:login.php");
   }
//if login is not done,then this page cant be accessed
   if(!isset($_SESSION['message'])){
session_destroy();
header("location:login.php");

}

//if session is set,it will display the username
if(isset($_SESSION['message'])){
    echo "Welcome, " . $_SESSION['message']. "<br>"; 
    $conn = mysqli_connect("localhost","root","","users");
    $sql = "SELECT `requestfrom` FROM `crud` WHERE `mail`='$_SESSION[message]'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $requestfrom = $row['requestfrom'];
    }
    echo "You have a request from:$requestfrom";
   
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Clone</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- header starts -->
    <div class="header">
        <div class="header__left">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1200px-Facebook_f_logo_%282019%29.svg.png"
                alt="" />
            <div class="header__input">
                <span class="material-icons"> search </span>
                <input type="text" placeholder="Search Facebook" />
            </div>
        </div>

        <div class="header__middle">
            <div class="header__option active">
                <span class="material-icons"> home </span>
            </div>
            <div class="header__option">
                <span class="material-icons"> flag </span>
            </div>
            <div class="header__option">
                <span class="material-icons"> subscriptions </span>
            </div>
            <div class="header__option">
                <span class="material-icons"> storefront </span>
            </div>
            <div class="header__option">
                <span class="material-icons"> supervised_user_circle </span>
            </div>
        </div>

        <div class="header__right">
            
            <span class="material-icons"> add </span>
            <span class="material-icons"> forum </span>
            <span class="material-icons"> notifications_active </span>
            <span class="material-icons"> expand_more </span>
        </div>
    </div>
    <!-- header ends -->

    <!-- main body starts -->
    <div class="main__body">
        <!-- sidebar starts -->
        <div class="sidebar">
            <div class="sidebarRow">

                <button type="button" style="width:100px" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    <img class="user__avatar"
                        src="data:image/png;base64,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"
                        alt="" />
                </button>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> local_hospital </span>

                <button type="button" style="width:100px" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal1">
                    create post
                </button>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> emoji_flags </span>
                <h4>Pages</h4>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> people </span>
               
                <button type="button" style="width:100px" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal3">
                   Find People
                </button>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> chat </span>
                <h4>Messenger</h4>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> storefront </span>
                <h4>Marketplace</h4>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> video_library </span>
                <h4>Videos</h4>
            </div>

            <div class="sidebarRow">
                <span class="material-icons"> expand_more </span>
                <h4>More</h4>
            </div>
        </div>
        <!-- sidebar ends -->

        <!-- feed starts -->
        <div class="feed">

<!--query to display posts from database-->
        <?php
        if(isset($_SESSION['message'])){
           
           
        
$conn = mysqli_connect("localhost","root","","users");
$sql = "SELECT `id` FROM `crud` WHERE `mail`= '$_SESSION[message]'";
$result = mysqli_query($conn,$sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
}

$sql1 = "SELECT `id`,`image`,`likes`,`dislikes`,`comments` FROM `posts` WHERE `userid`='$id'";
$result1 = mysqli_query($conn,$sql1);

 
   
    while($row = mysqli_fetch_assoc($result1)){


       
        
    
    
echo "<img class=card-img-top src=$row[image] height=500px;>
<div class=d-flex justify-content-start>
        <button class=btn btn-primary me-2 ><i class=fa fa-thumbs-up></i> <a href=like.php?id=$row[id]>Likes($row[likes])
   
        </a> </button>
        <button class=btn btn-primary me-2><i class=bi bi-hand-thumbs-down></i> <a href=dislike.php?id=$row[id]>Dislikes($row[dislikes])</a></button>
         <button type=button style=width:100px class=btn btn-primary data-toggle=modal data-target=#exampleModal2>comments</button>
        <button class=btn btn-danger me-2 ><i class=bi bi-hand-thumbs-down></i> <a href=delete.php?id=$row[id]>Delete</a></button>
    
</div>
";}

    }

   
?>







                            <!--scheduled posts-->
                            <?php

// $conn =  mysqli_connect("localhost","root","","users");
// $content = "Hello, world!";
// $scheduled_time = "2023-03-14 10:03:20";
// $sql = "INSERT INTO `scheduled_posts` (`content`, `scheduled_time`) VALUES ('$content', '$scheduled_time')";
// $result = mysqli_query($conn,$sql);

// $current_time = date('Y-m-d H:i:s');
// $sql1 = "SELECT * FROM `scheduled_posts` WHERE `scheduled_time` <= '$current_time'";
// $result1 = mysqli_query($conn,$sql1);
// if (mysqli_num_rows($result1)>0) {
//     while($row = mysqli_fetch_assoc($result1)) {
        
//         echo $row["content"] . " published at " . $row["scheduled_time"] . "<br>";
//     }
// }

?>
        </div>



    </div>

</body>

</html>



<!-- Modal for posts -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Your Post</h5>
                <button type="button" style="width:100px" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="upload1" accept="image/*" onchange="showPreview(event);">


                    <div class="preview">
                        <img id="file-ip-1-preview" style="height:100%;width:100%">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit1">POST</button>
                    <button type="button" style="width:100px" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}
</script>

<!--php script to insert data into db after post-->
<?php
if(isset($_POST['submit1'])){
    
    if(isset($_SESSION['message'])){
        $conn = mysqli_connect("localhost","root","","users");
$filename1 = $_FILES["upload1"]["name"];
$tempname1 = $_FILES["upload1"]["tmp_name"];
$folder1 = "facebookimages/".$filename1;



$sql = "SELECT `id` FROM `crud` WHERE `mail`= '$_SESSION[message]'";
$result = mysqli_query($conn,$sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
}

$sql1 = "INSERT INTO `posts`(`image`,`userid`) VALUES ('$folder1','$id')";

$result1 = mysqli_query($conn,$sql1);
if($result1){
move_uploaded_file($tempname1,$folder1);

}
    }

    


}
?>


<!-- Modal for profile-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>Hola &nbsp;<span>
                    <?php
$conn = mysqli_connect("localhost","root","","users");
$sql1 = "SELECT `name` FROM `crudnew` WHERE id=(SELECT max(id) FROM `crudnew`)";
$result1 = mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($result1);
echo $row['name'];


?>
                </span> </h5>
                <button type="button" style="width:100px" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<!--php code to update profile image and profile name-->
                <?php

if(isset($_POST['submit'])){



$conn = mysqli_connect("localhost","root","","users");
$filename = $_FILES["upload"]["name"];
$tempname = $_FILES["upload"]["tmp_name"];
$folder = "facebookimages/".$filename;

$name = $_POST['name'];


$sql = "INSERT INTO `crudnew`(`name`,`image`) VALUES ('$name','$folder')";

$result = mysqli_query($conn,$sql);
if($result){
move_uploaded_file($tempname,$folder);
}


}

?>
                <?php
$conn = mysqli_connect("localhost","root","","users");

$sql1 = "SELECT `image` FROM `crudnew` WHERE id=(SELECT max(id) FROM `crudnew`)";
$result1 = mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($result1);
echo "<img class=card-img-top src=$row[image]>";


?>

                <form action="" method="POST" enctype="multipart/form-data" style="width:500px">
                    <div class="form-group">

                        <input type="text" class="form-control mt-2" placeholder="edit name" name="name"
                            style="width:470px">

                    </div>


                    <input type="file" name="upload">
                    <button type="submit" class="btn btn-primary" name="submit">save</button>


                    <button type="submit" class="btn btn-primary" name="logout">
                        logout

                    </button>
                </form>

            </div>

        </div>
    </div>
</div>

   
<!--modal for people-->

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">People You May Know</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            
            <tbody>
                <tr>
               
                    <td>
                    <!--php code to update requests sent to friends-->
                    <?php
        $conn = mysqli_connect("localhost","root","","users");
        $result = mysqli_query($conn,"SELECT * FROM `crud`");
        while($row = mysqli_fetch_assoc($result)){
           echo $row['mail'] ;
           echo "
           <form  method=POST enctype=multipart/form-data>
           <button type=button class=btn btn-primary name=request><a href=?id=$row[id]>request</a></button>
           </form>";

           
           
        }
        
        ?> 
        <?php
       
        $request = $_SESSION['message'];
        $conn = mysqli_connect("localhost","root","","users");
        $id = $_GET['id'];
        
        $sql = "UPDATE `crud` SET `request`='1',`requestfrom`='$_SESSION[message]' WHERE `id`=$id";
        $resultrequest = mysqli_query($conn,$sql);
       
       
        if($resultrequest){
            $_SESSION['flash_message'] = "request sent";
            if(isset($_SESSION['flash_message'])) {
                $message = $_SESSION['flash_message'];
                unset($_SESSION['flash_message']);
                echo $message;
               
            }
           

        }
           

            
            
        
        ?>
        
        </td>
       
                   
                </tr>
            </tbody>
        </table>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
