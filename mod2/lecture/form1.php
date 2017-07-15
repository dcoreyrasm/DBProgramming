<html>
		<head>
	<title>Find a record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<style>
.error {color: #FF0000;}
</style>
</head>

<body>

<?php
include 'config.php';
include 'opendb.php';

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
<div id="page" data-role="page" data-theme="b" >
<div data-role="header" data-theme="b">
<h2>PHP Form Validation Example</h2>
</div>
</div>

<div data-role="content">

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Last Name: <input type="text" name="lname">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
</div>

<?php
include 'config.php';
include 'opendb.php';

						//  $lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');
						 //
						//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
						// 	 if (empty($_POST["lname"])) {
						// 		 $nameErr = "Name is required";
						// 	 } else {
						// 		 $lname = test_input($_POST["lname"]);
						// 	 }
						 //
						//  }

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

				<div data-role="footer" data-theme="b">
	  <h4>YOUR APP NAME &copy; 2016</h4>
	</div>
	</body>
</html>
