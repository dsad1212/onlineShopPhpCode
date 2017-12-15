<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'app/start.php';
require_once "core/load.php";

 if(isset($_GET['user_id'])){
     $user_id =$_GET['user_id'];
     $_SESSION['id'] = $user_id;

}
else{
    $user_id=0;
}
if(!isset($_GET['success'],$_GET['paymentId'],$_GET['PayerID']))
{
    die();
}
$cart = new cart($conn,$_GET['cart']);
$order = $cart->Order();
$order1='';
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$payment = Payment::get($paymentId,$paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);


for($x=0;$x<count($order);$x++) {
    $id=$_GET['cart'];
    $product_id=$order[$x]['product_id'];
    $quantity=$order[$x]['quantity'];
    $item_name=$order[$x]['product_name'];
    $price = $order[$x]['price'];
    $date = date("d-m-y");




    $sql = "INSERT INTO payments(payment_id,user_id,item_number,payment_gross,quantity,item_name,date,payment_status)VALUES('$id','$user_id','$product_id','$price','$quantity','$item_name','$date','success')";
    $conn->query($sql);

}


?>


<?php require_once "core/header.php";?>
<div class="product-big-title-area" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>תשלום</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
<br><br><br>
    <center><h1>תודה רבה הקנייה שלך בוצע בהצלחה</h1></center>
<br><br><br>
<?php require_once "core/footer.php";?>
