<html>
		<head>
	<title>Find a record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
Sorted Variables
		</h1>	</div>
				<div data-role="content">
	<?php

	//array example

//THis declares the variable sort_stuff and sets it to an array called 'stuff'. 'Stuff' comes from the HTML form when you set the input name="stuff[]" for each field variable that you want to sort
	$sort_stuff = array(['stuff']);

//This is using the asort function to sort the 'stuff' array.
  asort($_POST['stuff']);

	// Loop through the  array. This loops through the array to print the values the user entered.
  foreach ($_POST['stuff'] as $value) {

      // Do something with each entry ...
      if ($value) {

	        echo $value."<br />";
        }
      }


	?>

				<div data-role="footer" data-theme="b">
	  <h4>YOUR APP NAME &copy; 2017</h4>
	</div>
	</body>
</html>
