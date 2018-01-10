<html>
<head>
  <title>My First PHP Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
	<body>

<h1>
	Find a record
		</h1>
	<?php
	include 'mod2_config_sampledb.php';
	include 'mod2_opendb.php';

               $id= (isset($_POST['id'])    ? $_POST['id']   : '');

$sql= "	SELECT id, fname, lname, address, city, state, zip from customers WHERE id = $id LIMIT 1";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
				echo "<b>Record successfully found:</b><br>";
				echo "<b>ID: " . $row["id"]. "</b><br>";
        echo "<b>Name: " . $row["fname"]. " " . $row["lname"]. "</b><br>";
				echo "<b>Address: " . $row["address"]. "</b><br>";
				echo "<b>City: " . $row["city"]. "</b><br>";
				echo "<b>State: " . $row["state"]. "</b><br>";
				echo "<b>Zip: " . $row["zip"]. "</b><br><hr>";
				echo "<br><b>Record successfully DELETED!</b><br>";

    }
} else {
    echo "Sorry there are no matches! Please check your entry and try again.";
}

$sql= "	DELETE FROM customers WHERE id = $id";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);

?>



	  <h4>YOUR APP NAME &copy; 2016</h4>
	</body>
</html>
