<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//display_errors = on;

//https://www.skysilk.com/blog/2018/how-to-connect-an-android-app-to-a-mysql-database/

   $con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b7b177ae59ac76","558d3bc8","heroku_8f0dc4064126e98");

// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Select all of our stocks from table 'stock_tracker'
$sql = "SELECT * FROM players";

// Confirm there are results
if ($result = mysqli_query($con, $sql))
{
// We have results, create an array to hold the results
       // and an array to hold the data
$resultArray = array();
$tempArray = array();

// Loop through each result
while($row = $result->fetch_object())
{
// Add each result into the results array
$tempArray = json_decode(json_encode($row), True);
  //error_log(array_column($tempArray, 0));
    array_push($resultArray, $tempArray);

    //error_log(mysqli_error($con));
}

// Encode the array to JSON and output the results
//echo "Hey, testing to see if echo works at all with this awful thing";
//var_dump(json_encode($resultArray));
//print_r(json_encode($resultArray));
//print_r( $resultArray );
//var_dump( $resultArray );
echo json_encode($resultArray);
}

// Close connections
mysqli_close($con);
?>
