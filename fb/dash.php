<?php
session_start(); ?>
    <?php
    if(isset($_SESSION["name"])){
    
    }
    else{
        header('Location:login.html');
    }
    ?>
<html>
<head>
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
    </style>
</head>
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
  <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><img src="1.jpg"  height="50" width="50">Friends</a>
                <a href="#"><img src="2.jpg" height="50" width="50">Most Recent</a>
                <a href="#"><img src="3.jpg" height="50" width="50">Group</a>
                <a href="#"><img src="4.jpg" height="50" width="50">Marketplace</a>
                <a href="#"><img src="5.jpg" height="50" width="50">Saved</a>
            </div> 
        </div>
    </body>
</html>
