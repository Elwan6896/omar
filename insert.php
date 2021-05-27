<?php
$ParcelID = $_POST['ParcelID'];
$studentname = $_POST['studentname'];
$PhoneCode = $_POST['PhoneCode'];
$Phone = $_POST['Phone'];

if (!empty($ParcelID ) || !empty($studentname) || !empty($PhoneCode) || !empty($Phone)){
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "omar-web";

  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }else {
    $SELECT = "SELECT ParcelID  From info Where ParcelID  = ? Limit 1";
    $INSERT = "INSERT Into info (ParcelID, studentname, PhoneCode, Phone) values(?,?,?,?)";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $ParcelID);
    $stmt->execute();
    $stmt->bind_result($ParcelID );
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0) {
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssii", $ParcelID , $studentname, $PhoneCode, $Phone);
      $stmt->execute();
	echo '<script>alert("New Record Inserted Sucessfully")</script>';
	exit();
    }else {
        echo '<script>alert("Someone Already Using This Id")</script>';
	exit();
    }
    $stmt->close();
    $conn->close();
  }


}else {
  echo "All field are reqired";
  die();
}
 ?>
