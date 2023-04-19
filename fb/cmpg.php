<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:login.html");
}
$url=$_SESSION['addr'];
$name=$_SESSION['name'];
$host = 'localhost';
$username = 'rajesh';
$password = 'rajesh';
$dbname = 'rajesh';
$conn = mysqli_connect($host, $username, $password, $dbname);
?>
<html>
    <style>

        *{
            font-family: "Poppins", sans-serif;
            
        }
        body{
            background-color: white;
        border: 7px solid white;
        border-radius: 14px;
        }
        .title{
            margin: auto;
            font-size: 0.8cm;
            color: rgb(255, 255, 255);
        }
        .ms{
            margin-left: 15px;
            padding: 5px;
            background-color: white;
            height: 90px;
            width: 500px;
            border-radius: 10px;
        }
        .posts{
            display: flex;
            flex-direction: column;
            gap:1em;

        }
        .sender{
            color:  rgb(28, 57, 101);

            font-size: 15px;
            padding: 2px;
        }
        .msg{
            color:  black;

            font-size: 13px;
            padding: 2px;
        }
        .post{
            background-color: black;
            width: fit-content;
            color:aliceblue;
        }
        .type{
            padding: 3px;
            margin: 5px;
        }
         input[type=submit]{
            padding:6px 8px;
            margin:8px 0;
            top:5px;

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
.ms{
  border: 4px solid black;
}

    nav {
      background-color: skyblue;
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
      <div class="z"><a href="i2.php">Upload pics</a></div>
      <div class="z"><a href="i3.php">View Pics</a></div>
      <div class="z"><a href="log.php">Logout</a></div>
    </div>
  </div>
  </div>
    <?php echo "<h2 class='title'>Welcome {$_SESSION['name']}</h2>"; ?>
    <br>
      <div class="posts">
    <?php
        $res = mysqli_query($conn,"select * from msg where url='$url' order by date");
        if (mysqli_num_rows($res) > 0) {
            while ($i = mysqli_fetch_assoc($res)) {?>
            <div class="ms">
               <?php echo "<br><label class='sender'>{$i['froms']}:</label><br>"; ?>
               <?php echo "<label class='msg'>{$i['msg']}</label>"; ?>
           </div>
            <?php } }?>
        <div class='type'>
            <form action="incm.php" method="post">
                <input type="type" class="inp" name="msg">
                <input type="submit" name="submit" class="button2">
            </form>
        </div>
    </div>
    </body>
</html>