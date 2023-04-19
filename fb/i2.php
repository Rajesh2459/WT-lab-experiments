<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:login.html");
}
?>
<html>
   <style>
      input[type=submit]{
            padding:6px 8px;
            margin:8px 0;
            margin-left: 1280px;
            top:5px 
            right:5px;
            background-color:darkblue;
            color:whitesmoke;
        }
    .logoutb{
        position:fixed;
        right:10px;
        top:5px;
}

    a {
      margin-right: 150px;
      color: black;
      text-decoration: none;
    }

    a:hover {
      color: red;
      text-decoration: none;
    }

    .flexbox {
      display: flex;
      justify-content: right;
    }

    .content {
      background-color: lightblue;
      height: 40px;
      width: 1350px;


    }
    .contents {
      background-color: lightblue;
     
      width: 1350px;
    }
    .z {
      margin-top: 10px;
    }

    .z:hover {
      height: 50px;
      color: lightgoldenrodyellow;
      margin: 0px;
    }


    nav {
      background-color: skyblue;
    }

    .imp-links a{
    text-decoration:none;
    display:flex;
    align-items:center;
    color: black;
    width:fit-content;
    line-height: 4;

}
.button2{
  position: relative;
  left:-1270px;
}
.left-sidebar{
  position: relative;
  left:1150;
  top:-450px;
}
    </style>
  
    <body>
<div class="contents">
<div>
<img src="https://logos-world.net/wp-content/uploads/2020/04/Facebook-Logo.png" width="150px" height="80px">
  </div>

  <div class="content">
    <div class="flexbox" align="right">
    <div class="z"><a href="i1.php">View Profile</a></div>
      <div class="z"><a href="i2.php">Upload Pics</a></div>
      <div class="z"><a href="i3.php">View Pics</a></div>
      <div class="z"><a href="log.php">Logout</a></div>
    </div>
  </div>
</div>
<?php echo "<h2 class='title'>Welcome {$_SESSION['name']}</h2>"; ?>
        <div class="posts">
        <div class="post">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" class="inp" name="file">
                <textarea name="description"></textarea>
                <input type="submit" name="submit" class="button2">
            </form>
        </div>
        <?php
        $host = 'localhost';
        $username = 'rajesh';
        $password = 'rajesh';
        $dbname = 'rajesh';
        $conn = mysqli_connect($host, $username, $password, $dbname);
        $name = $_SESSION['name'];
        $res = mysqli_query($conn,"select * from post where name = '$name'");
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  ?>
           
           <div class="post">
               <img src="uploads/<?=$images['url']?>" height="280px" width="280px">
               <?php echo "<br><label for='like' class='likes'>Likes:{$images['likes']}</label><br>";?>
               <?php echo "<br><label for='description' class='description'>Description:{$images['description']}</label><br>"; ?>
               <?php echo "<label for='date' class='date'>Date:{$images['date']}</label>"; ?>
           </div>
                
  <?php } }?>
        
    </div>
    </div>
       </body>
</html>