<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 
<title>task</title>
</head>
<body>
<?php
 
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);
// Connect and select take servername, username, password
if ($sql = @mysqli_connect('localhost', 'root', 'shaz1430')) {
    //Connect and query is Required 
mysqli_query($sql,'CREATE DATABASE companyDB');

if (!@mysqli_select_db ($sql, 'companyDB')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($sql) . '</b></p>'); }
}
else {
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($sql) . '</b></p>'); }

// Define the query.
$query = 'CREATE TABLE IF NOT EXISTS smartmethod (
NUMBER_ID INT NOT NULL)';

# Run the query.
if (@mysqli_query ($sql, $query)) {
print '<p>The table has been created.</p>';
}
else {
die ('<p>Could not create the table because: <b>' . mysqli_error($sql) . '</b>.</p> <p>The query being run was: ' . $query . '</p>');}



if(isset( $_GET['submit'])){
    $numer = $_REQUEST['num'];
    $insert = "INSERT INTO smartmethod (NUMBER_ID) 
     VALUES ($numer)";
     mysqli_query($sql, $insert);
     print"<p> the value is insert </p>";
    }
     

    if(isset( $_GET['submit1'])){
     $query1 = "SELECT NUMBER_ID FROM smartmethod ;";
     if ($result = mysqli_query($sql, $query1)) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo $row["NUMBER_ID"]."<br>";
        }
      } 
    }
mysqli_close($sql); // Close the connection.
?>
</body>
</html>