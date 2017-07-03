<?php
/**
 * Created by PhpStorm.
 * User: BoiloAlex
 * Date: 02.07.2017
 * Time: 20:35
 */

$id = $_POST['id'];

class Request{
    var $console;
    var $result;
}
$request = new Request;
include 'db.php';
$conn = bdConnect();
$query = 'DELETE FROM MESSAGE WHERE ID = '.$id;
//DELETE FROM MESSAGE WHERE ID=1

if (mysqli_query($conn, $query)) {
    $request->console = "Record deleted successfully";
} else {
    $request->console = "Error: " . $query . "<br>" . mysqli_error($conn);
}
$request->result = $_POST;
mysqli_close($conn);

echo json_encode($request);

