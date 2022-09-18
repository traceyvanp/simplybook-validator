<?php 
echo "Hello Tracey";
$json = file_get_contents('php://input');
$dec = json_decode($json, true);
print_r($dec); // this prints the array
print "Tracey print";
?>
