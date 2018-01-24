
<?php
//sample if statement
$samplevariable = date("h:i:sa");

echo "The current time in your time zone is:" . date("h:i:sa");

if ($samplevariable < 20) {
    echo "<br>Make sure you complete all of your assignments before it's too late.";
}
?>
