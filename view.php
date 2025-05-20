<?php
include("Components/Header.html");
include("Connection.php");
?>
<div class="container mt-2 ">
  <div class="main ">
    <a href="./form.php" class="btn btn-primary">Back to the Form</a>
  <h2 class="text-center">Student Information Data</h2>

  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-info text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Age</th>
        <th scope="col">Gender</th>
        <th scope="col">Class</th>
        <th scope="col">Document</th>
        <th scope="col">Profile</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>



      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM students";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
    
      ?>
        <tr>
          <td><?=  $row['id'] ?></td>
          <td><?=  $row['name'] ?></td>
          <td><?=  $row['email'] ?></td>
          <td><?=  $row['age'] ?></td>
          <td><?=  $row['gender'] ?></td>
          <td><?=  $row['class'] ?></td>
          <td><a class="btn btn-secondary text-white" target="_blank"  href="uploads/<?=  $row['document'] ?>">View</a></td>
          <td><img style="border-radius: 50% ; object-fit: cover;" src="uploads/Profile_Pictures/<?= $row['Profile_picture'] ;?>" width="50" height="50"  alt="Profile-Picture"></td>
          <td><a href="./update.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a></td>
          <td><a href="./delete.php?id=<?=  $row['id'] ?>" class="btn btn-danger">Delete</a></td>


        </tr>
<?php


      }
?>
    </tbody>
  </table>



</div>


<?php
 
include("Components/Footer.html");

?>