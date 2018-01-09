<?php
include 'mod1_config.php';
include 'mod1_opendb.php';

$sql= "SELECT FirstName, LastName, EmailAddress FROM contact";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "FirstName: " . $row["FirstName"]. "<br>";
        echo "LastName: " . $row["LastName"]. "<br>";
        echo "EmailAddress: " . $row["EmailAddress"]. "<br><hr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
