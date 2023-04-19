<html>
  <body>
<?php
$display_error=ini_get('display_errors');
ini_set('display_errors',0);
$name=$_POST["un"];
$email=$_POST["e"];
$dob=$_POST["dob"];
$gen=$_POST["r"];
$pass=$_POST["pas"];
$a=$_POST["add"];
$rel=$_POST["rel"];
$l=$_POST["lang"];
$cpass=$_POST["cpas"];
$phno=$_POST["pn"];
 
?>
<h1>Submitted Data: </h1>
<table>
  <tr><td>Username: </td>
  <td><?php 
      if (!preg_match("/^[a-zA-z]*$/", $name)){
        $ErrMsg = "Only alphabets and whitespace are allowed.";
        echo $ErrMsg; 
      }
      else{
        echo $name;
      }
  
  ?></td>
</tr>
<tr><td>EMAIL: </td>
  <td><?php 
      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
      if (!preg_match ($pattern, $email) ){  
        $ErrMsg = "Email is not valid.";  
                echo $ErrMsg;  
    } else {  
        echo $email;  
    }
  ?></td>
</tr>
<tr><td>Phone: </td>
  <td><?php
      $length = strlen($phno);
       echo $phno;
    ?></td>
</tr>
<tr><td>Gender: </td>
<td><?php echo $gen;?></td>
</tr>
<tr><td>Religion: </td>
 <td><?php echo $rel;?></td>
</tr>
<tr><td>Date of birth: </td>
 <td><?php echo $dob;?></td>
</tr>
<tr><td>Language: </td>
 <td><?php foreach($l as $item){
 echo $item . "\n";
}?></td>
</tr>
<tr><td>Address: </td>
 <td><?php echo $a;?></td>
</tr>
</table>
<?php
$servernmae="localhost";
$username="rajesh";
$password="rajesh";
$dbname="rajesh";

$name=$_POST["un"];
$email=$_POST["e"];
$dob=$_POST["dob"];
$gen=$_POST["r"];
$pass=$_POST["pas"];
$a=$_POST["add"];
$rel=$_POST["rel"];
$l=$_POST["lang"];
$cpass=$_POST["cpas"];
$phno=$_POST["pn"];

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    die("Connection failed:".mysqli_connect_error());
}
$sql="INSERT INTO details (username,email,password,mobile,dob,gender,languages,address)
VALUES('$name','$email','$pass','$phno','$dob','$gen','$l','$a')";

if(mysqli_query($conn,$sql))
{
    echo "new record inserted into database" . "<br>";
}
else{
    echo "Error:".$sql."<br>".mysqli_error($conn);
}
$sql1="SELECT * FROM details";
$result=mysqli_query($conn,$sql1);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) 
  {
  
    echo "<br>" . "  Name: " . $row["username"]. "   Email: " . $row["email"]. "   Password: " . $row["password"]."  Mobile: " . $row["mobile"]."<br>";
  }
} else {
  echo "0 results";
}
header('Location:login.html');
mysqli_close($conn);
?>
