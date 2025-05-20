<?php
include("Components/Header.html");
include("Connection.php");
?>

<div class="container mt-2 w-50">
  <h2 class="text-center">Student Information Form</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-2">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-2">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-2">
      <label class="form-label">Age</label>
      <input type="number" class="form-control" name="age" required>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" value="Male" name="gender" required>
      <label class="form-check-label">
        Male
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" value="Female" name="gender" required>
      <label class="form-check-label">
        Female
      </label>
    </div>
    <select class="form-select mb-2" name="class" required>
      <option selected>Open this select menu</option>
      <option value="Class 1">Class 1</option>
      <option value="Class 2">Class 2</option>
      <option value="Class 3">Class 3</option>
      <option value="Class 4">Class 4</option>
      <option value="Class 5">Class 5</option>
      <option value="Class 6">Class 6</option>
      <option value="Class 7">Class 7</option>
      <option value="Class 8">Class 8</option>
      <option value="Class 9">Class 9</option>
      <option value="Class 10">Class 10</option>
    </select>
    <div class="mb-3">
      <label class="form-label">Upload Document (PDF only)</label>
      <input type="file" class="form-control" accept=".pdf" name="document" required>
    </div>
     <div class="mb-3">
      <label class="form-label">Upload Profile Picture (jpg , png)</label>
      <input type="file" class="form-control" accept=".jpg , .jpeg , .png" name="profile_picture" required>
    </div>


    <button type="submit" class="btn btn-success  mb-2">Submit</button>
  </form>
  <a href="./view.php" class="btn btn-primary  ">Show Student Data</a>


</div>
<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $class = $_POST['class'];
  $document = $_FILES['document']['name'];
  $Tmpdocs =  $_FILES['document']['tmp_name'];
  
  $UploadDir = "uploads/";
  if (!is_dir($UploadDir)) {
    mkdir($UploadDir);
  }
  $newFile = time() . "_" . basename($document);
  $destination = $UploadDir . $newFile;

  // profile picture
  $Profile = $_FILES['profile_picture']['name'];
  $tmpProfile =  $_FILES['profile_picture']['tmp_name'];
  $ProfileDir = "uploads/Profile_Pictures/";
   if (!is_dir($ProfileDir)) {
    mkdir($ProfileDir);
  };
    $newFile2= time() . "_" . basename($Profile);
      $destination2 = $ProfileDir . $newFile2;




  if (move_uploaded_file($Tmpdocs, $destination) && move_uploaded_file($tmpProfile, $destination2) ) {
    $sql = "INSERT INTO students (name,email,age,gender,class ,document,Profile_picture) values ('$name','$email','$age','$gender','$class','$newFile','$newFile2')";
    $result = $conn->query($sql);
  }


  if ($result) {
?>
    <script>
      alert("Your Data has been Submitted")
    </script>
<?php
  }
}


?>


<?php

include("Components/Footer.html");

?>