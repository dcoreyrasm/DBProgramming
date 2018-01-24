<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

      <?php
      // define variables and set to empty values
      $nameErr = "";
      $lname = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["lname"])) {
          $nameErr = "Name is required";
        } else {
          $lname = test_input($_POST["lname"]);
        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>

<h1>Find a customer</h1>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Last Name: <input type="text" name="lname">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
      </form>

      <?php
      include 'config.php';
      include 'opendb.php';

      $lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');


      $sql= "SELECT id, fname, lname, address, city, state FROM customers where lname = '$lname' ";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      	// output data of each row
      	while($row = mysqli_fetch_assoc($result)) {
      			echo "<b>ID: " . $row["id"]. "</b><br>";
      			echo "<b>Name: " . $row["fname"]. " " . $row["lname"]. "</b><br>";
      			echo "<b>Address: " . $row["address"]. "</b><br>";
      			echo "<b>City: " . $row["city"]. "</b><br>";
      			echo "<b>State: " . $row["state"]. "</b><br><hr>";
      	}
      } else {
      	echo "Sorry there are no matches! Please check your entry and try again.";
      }


      mysqli_close($conn);
      ?>

</body>
</html>
