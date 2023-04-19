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
   input[type="text"]{
    visibility: hidden;
   }
   .likes{
            color:black;
            font:15px;
        }
        .posts {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 70px;
        margin: 0 auto;
        max-width: 320px;
        }
        
        .post {
        border: 7px solid white;
        height: 900px;
        width: 350px;
        box-shadow: 0 2px 2px rgba(0,0,0,0.1);
        padding: 0px;
        margin-right: 120px;
        margin-bottom: 330px;
        margin-top: -330px;
      }
      .img {
  height: 40px;
  width: 40px;
}

.cm{
    position: relative;
    top: -70px;
    left:177px;
    width:100px;
    height: 50px;
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
        .ms{
            margin-left: 15px;
            padding: 5px;
            background-color: white;
            height: 50px;
            width: 50px;
            border-radius: 15px;
            margin-top: -50px;
            margin-bottom: 50px;
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
        .imp-links a{
    text-decoration:none;
    display:flex;
    align-items:center;
    color: black;
    width:fit-content;
    line-height: 4;

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
    <br>
    <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><img src="1.jpg"  height="50" width="50">Friends</a>
                <a href="#"><img src="2.jpg" height="50" width="50">Most Recent</a>
                <a href="#"><img src="3.jpg" height="50" width="50">Group</a>
                <a href="#"><img src="4.jpg" height="50" width="50">Marketplace</a>
                <a href="#"><img src="5.jpg" height="50" width="50">Saved</a>
            </div> 
        </div>
    
    <div class="posts">
        <?php
        $host = 'localhost';
        $username = 'rajesh';
        $password = 'rajesh';
        $dbname = 'rajesh';
       $name=$_SESSION['name'];
        $conn = mysqli_connect($host, $username, $password, $dbname);
        $res = mysqli_query($conn,"select * from post order by likes desc");
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  
           $x=$images['url'];
           $y="";
           $a=mysqli_query($conn,"select * from liking where name='$name' and url='$x'");
           if(mysqli_num_rows($a) > 0){$y='t.jpg';}
           else{$y='t.jpg';}
           ?>
           <div>
           <div class="post">
               <img src="uploads/<?=$x?>"height="350px" width="350px">
               <?php echo "<br><form action='like.php' method='post'><input type='image'class='img' width='50px' height='50px'src='$y' name='submit'><label for='like' class='likes'>{$images['likes']}</label><input type='text' id='url' name='url' value='$x'></form><br>"; ?>
               <?php echo "<br><label for='description' class='description'>Description:{$images['description']}</label><br>"; ?>
               <?php echo "<br><label for='date' class='date'>Date:{$images['date']}</label>"; ?>
             <?php echo "<br><form action='comment.php' method='post'><input type='image' src='6.jpg' class='cm'  width='25px' height='25px'name='submit'><input type='text' id='url' name='url' value='$x'></form>"; ?>
             <div class="posts">
            <?php 
        $rs = mysqli_query($conn,"select * from msg where url = '$x'");
        if (mysqli_num_rows($rs) > 0) {
            while ($images = mysqli_fetch_assoc($rs)) {  ?>
             
             <div class="ms">
               <?php echo "<br><label class='sender'>{$images['froms']}:</label><br>"; ?>
               <?php echo "<label class='msg'>{$images['msg']}</label>"; ?>
              
           </div>
                
  <?php } }?>
           </div>
          
           
            </div>
            </div>
                
  <?php } }?>
        
    </div>
    
    </body>
</html>