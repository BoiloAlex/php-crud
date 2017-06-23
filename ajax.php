<?php
/**
 * Created by PhpStorm.
 * User: BoiloAlex
 * Date: 23.06.2017
 * Time: 23:16
 */

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
$query = 'INSERT INTO MESSAGE (EMAIL, NAME, SURNAME, PHONE, MESSAGE) VALUES ("'.$email.'","'.$name.'", "'.$surname.'", "'.$phone.'","'.$message.'" )';
if (mysqli_query($conn, $query)) {
    $request->console = "New record created successfully";
} else {
    $request->console = "Error: " . $query . "<br>" . mysqli_error($conn);
}
$request->result = $_POST['name'];
mysqli_close($conn);

echo json_encode($request);
?>
