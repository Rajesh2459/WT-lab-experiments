<?php
// Connect to the database
$conn = mysqli_connect("localhost", "rajesh", "rajesh", "rajesh");
// Check if the form is submitted
if(isset($_POST['submit'])){
  // Define the path where the uploaded image will be stored
  $target_dir = "uploads/";
  // Generate a unique filename for the image
  $target_file = $target_dir . uniqid() . '-' . basename($_FILES["image"]["name"]);
  // Move the uploaded image to the target directory
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  // Get the comment from the form data
  // Save the data to the database
  $sql = "INSERT INTO details (image) VALUES ('$target_file')";
  mysqli_query($conn, $sql);
}
?>