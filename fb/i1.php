<?php
session_start();?>
    <?php
    if(isset($_SESSION['name'])){
      
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
  <h1 align="center">View Profile</div>
</body>
</html>
<?php
$host = 'localhost';
$uname = 'rajesh';
$password = "rajesh";
$dbname = "rajesh";
$conn = mysqli_connect($host, $uname, $password, $dbname);
$vid = $_SESSION['user_id'];
$query = "SELECT * FROM details where id=".$vid."";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result))  
	{  
		?>
    <style>
      table{
  color:red;
  text-align:center;
}
      </style>
    <br></br>
    <table border=1 cellspacing="0px" cellpadding="5px" align="center" width="1000px" height="400px">
    <tr>
    <td>Name</td>
		<td><?php echo $row['username']; ?></td>  
  </tr>
  <tr>
    <td>email</td>
		<td><?php echo $row['email']; ?></td>  
  </tr>
  <tr>
    <td>mobile</td>
		<td><?php echo $row['mobile']; ?></td>  
  </tr>
  <tr>
    <td>date-of-birth</td>
		<td><?php echo $row['dob']; ?></td>  
  </tr>
  <tr>
    <td>Gender</td>
		<td><?php echo $row['gender']; ?></td>  
  </tr>
  <tr>
    <td>Address</td>
		<td><?php echo $row['address']; ?></td>  
  </tr>
 <?php
	}
  ?>

