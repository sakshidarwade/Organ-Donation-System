<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['fullname'];
  $number = $_POST['mobileno'];
  $email = $_POST['emailid'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $blood_group = $_POST['blood'];
  $address = $_POST['address'];
  $donor_status = $_POST["donor_status"];

  $conn = mysqli_connect("localhost", "root", "", "donationdb") or die("Connection error");
  $sql = "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_address,donor_status) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}','{$donor_status}')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo '<div class="alert alert-success"><b>Data Saved Successfully.</b></div>';
  } else {
    echo '<div class="alert alert-danger"><b>Error: Unable to save data.</b></div>';
  }

  mysqli_close($conn);
} else {
  echo '<div class="alert alert-danger"><b>Invalid Request</b></div>';
}
?>
