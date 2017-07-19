
<?php
//strpos example
echo "This will print the position of 'world' in the string 'Hello world!' The position is: ". strpos("Hello world!", "world");

//str_replace
echo "<br>This will replace 'world' in the string 'Hello world!' with 'Dolly' The new string is: ". str_replace("world", "Dolly", "Hello world!");

//str_replace
//The string that will be changes by the replace function.
$origString = "<br>Welcome Class of 2021!";

//replace string
$classYear = str_replace("2021", "2022", $origString);
echo "<br>Here is the message with the old Class Year: ". $origString . "<br />";
echo "<br>Here is the message with the new Class Year: ". $classYear . "<br />";

?>
