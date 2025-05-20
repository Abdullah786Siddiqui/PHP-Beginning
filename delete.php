<?php
include("Components/Header.html");
include("Connection.php");
?>

<?php 
$id = $_GET['id'];
echo $id;
$sql = "DELETE FROM students where id = $id ";
$conn->query($sql);
mysqli_query($conn, "SET @count = 0");
mysqli_query($conn, "UPDATE students SET id = (@count := @count + 1)");

// AUTO_INCREMENT bhi reset karo
mysqli_query($conn, "ALTER TABLE students AUTO_INCREMENT = 1");
header("Location: view.php");



?>

<?php
 
include("Components/Footer.html");

?>