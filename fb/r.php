<?php
session_start();
$servername="localhost";
$username="rajesh";
$password="rajesh";
$dbname="rajesh";
$conn=mysqli_connect($servername,$username,$password,$dbname);
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    tr,td
    {
      padding-right:50px;

    }
    body
    {
        color:black;
    }
    </style>
  </head>
  <body>
   <table border=1 cellspacing = "20px" style="border-collapse:collapse">
     <tr>
       <td>S.no</td>
       <td>Username</td>
       <td>Photo</td>
       <td>Likes</td>
       <td>description</td>
     </tr>
     <?php
          $i = 1;
     $q = mysqli_query($conn,"SELECT name,url,likes,description from post where likes != 0   order by likes DESC limit 5;");
      ?>
      <?php while($row = mysqli_fetch_row($q))
      { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['0']; ?></td>
        <td> <img style = "border: 1px solid white;" src="uploads/<?php echo $row[1]; ?>" width = "135px" height = "135px"></td>
        <td><?php echo $row[2]; ?></td>
        <td>
        <?php echo $row[3]; ?>
         </td>
      </tr>
    <?php } ?>
   </table>
  </body>
</html>