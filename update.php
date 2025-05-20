<?php
include("Components/Header.html");
include("Connection.php");
?>

<?php
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'] ;
  $email = $_POST['email'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $class = $_POST['class'];

  $sql = "UPDATE students SET name='$name' , email='$email' ,age = $age ,gender = '$gender' , class = '$class' where id = $id ";
  $result = $conn->query($sql);
  if($result){
    echo "<script>
      alert('Your Data has been Submitted');
     window.location.href = 'view.php';
    </script>";

  }
} else {
  $result = $conn->query("SELECT * FROM students where id = $id");
  $row = $result->fetch_assoc();
};



?>

<div class="container w-50 mt-2">
  <h2 class="text-center">Update Student Information </h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?? "" ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?? "" ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Age</label>
      <input type="number" class="form-control" name="age" value="<?php echo $row['age'] ?? "" ?>" required>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" value="Male" name="gender"  <?= $row['gender'] === 'Male' ?  'checked' : ' ' ?> required>
      <label class="form-check-label">
        Male
      </label>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="radio" value="Female" name="gender"   <?= $row['gender'] === 'Female' ?  'checked' : ' ' ?> required>
      <label class="form-check-label">
        Female
      </label>
    </div>
    <select class="form-select mb-3" name="class" value="<?php echo $row['class'] ?? "" ?>" required>
      <option selected>Open this select menu</option>
      <option value="Class 1" <?= $row['class'] == 'Class 1' ? 'selected' : '' ?>>Class 1</option>
      <option value="Class 2" <?= $row['class'] == 'Class 2' ? 'selected' : '' ?>>Class 2</option>
      <option value="Class 3" <?= $row['class'] == 'Class 3' ? 'selected' : '' ?>>Class 3</option>
      <option value="Class 4" <?= $row['class'] == 'Class 4' ? 'selected' : '' ?>>Class 4</option>
      <option value="Class 5" <?= $row['class'] == 'Class 5' ? 'selected' : '' ?>>Class 5</option>
      <option value="Class 6" <?= $row['class'] == 'Class 6' ? 'selected' : '' ?>>Class 6</option>
      <option value="Class 7" <?= $row['class'] == 'Class 7' ? 'selected' : '' ?>>Class 7</option>
      <option value="Class 8" <?= $row['class'] == 'Class 8' ? 'selected' : '' ?>>Class 8</option>
      <option value="Class 9" <?= $row['class'] == 'Class 9' ? 'selected' : '' ?>>Class 9</option>
      <option value="Class 10" <?= $row['class'] == 'Class 10' ? 'selected' : '' ?>>Class 10</option>

    </select>


    <button type="submit" class="btn btn-primary  mb-2">Update</button>
  </form>
</div>
<?php

include("Components/Footer.html");

?>