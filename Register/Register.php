<?php
$conn = mysqli_connect("localhost:3306", "root", "", "guvi");
// Choose a function depends on value of $_POST["action"]

if($_POST["action"] == "submit"){
  insert();
}
// Function
function insert(){
  global $conn;

  $fullname = $_POST["fullname"];
  $username =$_POST["username"];
  $email = $_POST["email"];
  $phone_number = $_POST["phone_number"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $gender = $_POST["gender"];

  // Check if email still available
  $sameEmail = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");
  if(mysqli_num_rows($sameEmail) > 0){
    // Output
    echo 2;
    exit;
  }

  // Insert value to database
  $stmt = $conn->prepare("INSERT INTO register (fullname , username ,email ,phone_number,password,gender)values(?,?,?,?,?,?)");
  $stmt->bind_param("sssiss", $fullname, $username, $email, $phone_number, $password,$gender );
  $stmt->execute();
  $stmt->close();
  $conn->close();
  echo 1;
  exit;
}