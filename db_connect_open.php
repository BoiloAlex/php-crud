<?php
/**
 * Created by PhpStorm.
 * User: BoiloAlex
 * Date: 21.06.2017
 * Time: 22:17
 */
//Sample Database Connection Syntax for PHP and MySQL.

//Connect To Database
include 'config.php';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT ID FROM MESSAGE";
$result = mysqli_query($conn, $query);

echo '$result'.'<br>';

if(empty($result)) {
    // sql to create table
    echo 'CREATE TABLE <br>';
    $query = "CREATE TABLE MESSAGE (
                                  ID int(11) AUTO_INCREMENT,
                                  EMAIL int NOT NULL,
                                  NAME varchar(255) NOT NULL,
                                  SURNAME varchar(255),
                                  PHONE int,
                                  MESSAGE varchar(255),
                                  PRIMARY KEY  (ID)
                                  )";
    $result = mysqli_query($conn, $query);
}

if (mysqli_query($conn, $query)) {
    echo "Table MESSAGE created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

