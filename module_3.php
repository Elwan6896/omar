<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>warden's Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <style media="screen">
      .table table {
        color: #000;
        font-family: monospace;
        width: 100%;
        margin: 3% 0%;
      }
      .table table tr th {
      border: 1px solid red;
      height: 43px;
      background-color: #c63d3a;
      color: #F0ED08;
      }
      .table table tr td {
        text-align: center;
		background-color: #ddd;
		height: 40px;
      }
    </style>
  </head>
  <body>
      <section class="head">
        <div class="header">
          <img src="logo/logo.png" alt="">
          <h1>Warden's Page</h1>
          <button type="button" name="logout">logout</button>
        </div>
      </section>
      <section class="table">
      <table>
          <tr>
            <th>ID</th>
            <th>ParcelID</th>
            <th>studentname</th>
            <th>PhoneCode</th>
            <th>Phone</th>
          </tr>
          <?php
            $conn = mysqli_connect("localhost", "root", "", "omar-web");
            if($conn-> connect_error){
              die("connection failed:". $conn-> connect_error);
            }

            $sql = "SELECT ID , ParcelID , studentname, PhoneCode, Phone From info";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0){
              while ($row = $result-> fetch_assoc()){
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["ParcelID"] . "</td><td>" . $row["studentname"] . "</td><td>" . $row["PhoneCode"] . "</td><td>" . $row["Phone"] . "</td></tr>";
              }
              echo "</table>";
            }
            else{
              echo " 0 result ";
            }
            $conn-> close();
          ?>
      </table>
      </section>
  </body>
</html>
