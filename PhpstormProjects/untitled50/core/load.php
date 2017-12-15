<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

require_once "classes/db.php";
require_once "classes/uproducts.php";
require_once "classes/cart.php";
require_once "classes/pages.php";
require_once "classes/users.php";
require_once "classes/mail.php";
require_once "classes/search.php";
require_once "functions/query.php";
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=hexdec( uniqid() );

}


if(isset($_POST['subscribe'])){
    $_POST['email'] = mysqli_real_escape_string($conn,$_POST['email']);
 echo insertMail($conn,$_POST['email']);

}

?>