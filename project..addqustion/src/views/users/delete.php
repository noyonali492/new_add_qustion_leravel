<?php
include_once ("../../../vendor/autoload.php");
use App\users\users;
$obj = new users();
$id = $_GET['id'];
$obj->deleteData($id);
ob_start();

if (isset($_SESSION['userSuccess'])){
    echo $_SESSION['userSuccess'];
}else{
    header('location:loging.php');
}
?>