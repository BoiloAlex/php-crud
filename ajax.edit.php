<?php
/**
 * Created by PhpStorm.
 * User: BoiloAlex
 * Date: 02.07.2017
 * Time: 22:11
 */

$id = $_POST['id'];
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$message = trim($_POST['text']);

class Request{
    var $console;
    var $result;
}
$request = new Request;
include 'db.php';
$conn = bdConnect();
$query = "UPDATE `MESSAGE` SET `EMAIL`='".$email."',`NAME`='".$name."',`SURNAME`='".$surname."',`PHONE`='".$phone."',`MESSAGE`='".$message."' WHERE ID=".$id;

 //"UPDATE MESSAGE SET NAME='".$name."',SURNAME ='".$surname."',PHONE ='',EMAIL ='".$email."',MESSAGE ='".$message."' WHERE ID = ".$id;
//DELETE FROM MESSAGE WHERE ID=1

if (mysqli_query($conn, $query)) {
    $request->console = "Record updated successfully";
} else {
    $request->console = "Error: " . $query . "<br>" . mysqli_error($conn);
}
$query = "SELECT * FROM MESSAGE WHERE ID=".$id ;
if (mysqli_query($conn, $query)) {
    $request->result = "Record updated successfully";
} else {
    $request->result = "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

echo json_encode($request);
