<?php
/**
 * Created by PhpStorm.
 * User: BoiloAlex
 * Date: 23.06.2017
 * Time: 21:54
 */
function bdConnect(){
    //Connect To Database
    include 'config.php';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        echo 'Error!!';
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT ID FROM MESSAGE";
    $result = mysqli_query($conn, $query);
    if(empty($result)) {
        echo 'CREATE TABLE <br>';
        $query = "CREATE TABLE MESSAGE (
                                  ID int(11) AUTO_INCREMENT,
                                  EMAIL varchar(255) NOT NULL,
                                  NAME varchar(255) NOT NULL,
                                  SURNAME varchar(255),
                                  PHONE int,
                                  MESSAGE varchar(255),
                                  PRIMARY KEY  (ID)
                                  )";
        $result = mysqli_query($conn, $query);
    }

    if (!mysqli_query($conn, $query)) {
        echo "Error creating table: " . mysqli_error($conn);
    }
    return $conn;
}
