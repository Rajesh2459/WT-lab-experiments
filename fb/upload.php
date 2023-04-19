<?php
    session_start();
    $host = 'localhost';
    $username = 'rajesh';
    $password = 'rajesh';
    $dbname = 'rajesh';
    $conn = mysqli_connect($host, $username, $password, $dbname);
    $name = $_SESSION['name'];
    if(isset($_POST['submit']) && isset($_FILES['file'])){ 
    $file_name=$_FILES['file']['name'];
    if(!file_exists($target_file)){
        if($file_name){
            $tmp_name=$_FILES['file']['tmp_name'];
            $location="uploads/";
            $target_file=$location.basename($_FILES['file']['name']);
            $date = date('Y-m-d');
            $like=0; 
            $desc = $_POST['description'];
            $a=move_uploaded_file($tmp_name,$target_file);
            $res=mysqli_query($conn,"insert into post(name,url,date,likes,description)values('$name','$file_name','$date','$like','$desc')");
            }
      }
    
    header('Location:i2.php');}
?>