<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $name = $_POST["name"];
    $pass = $_POST["password"];


    $host = 'localhost';
    $uname = 'rajesh';
    $password = "rajesh";
    $dbname = "rajesh";
    $conn = mysqli_connect($host, $uname, $password, $dbname);
    if ($conn) {
        echo "Connection successful.";
    } else {
        echo "Connection Failed.";
        die("Connection Failed:" . mysqli_connect_error());
    }
    $sql = "select * from details where  username='$name' and password='$pass'";
    $res = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($res);
        if($rows==1)
		{
			session_start();
			$_SESSION['name'] = $name;
			while($row=mysqli_fetch_array($res))
			{
				$_SESSION['user_id'] = (int)$row["id"];  
				
			}
			header("Location: dash.php");
			
			
         }
   
    else {
        echo "PLLES";
        echo "<script> alert('Invalid Credentials')</script>";
        header('Location:login.html');
    }

    
}
?>
