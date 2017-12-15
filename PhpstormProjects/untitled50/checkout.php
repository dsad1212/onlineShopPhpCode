<?php
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
require 'app/start.php';
require_once "core/load.php";
$Item = selectItems($conn,$_SESSION['cart']);
if($Item==''){
    header("Location: cart.php");
}
$sum = 0;
$payer = new Payer();

$payer->setPaymentMethod('paypal');
for($x=0;$x<count($Item);$x++) {

    $item[$x] = new Item();
    $item[$x]->setName($Item[$x]['product_name'])
        ->setCurrency('ILS')
        ->setQuantity($Item[$x]['quantity'])
        ->setPrice($Item[$x]['price']);
    $sum=$sum+$Item[$x]['price']*$Item[$x]['quantity'];

}
    $itemlist = new ItemList();
    $itemlist->setItems($item);

$details = new Details();
$details->setShipping(0)
    ->setSubtotal($sum);

$amount = new Amount();
$amount->setCurrency('ILS')
    ->setTotal($sum)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemlist)
    ->setDescription(uniqid())
    ->setInvoiceNumber(uniqid());

$RedirectUrls = new RedirectUrls();
if(isset($_SESSION['id'])) {
    $cart =  $_SESSION['cart'];
 unset($_SESSION['cart']);
    $RedirectUrls->setReturnUrl('http://php4ever.com/pay.php?success=true&cart='.$cart.'&user_id='.$_SESSION['id'])

        ->setCancelUrl('http://php4ever.com/pay.php?success=false');

}
else{

    $cart =  $_SESSION['cart'];
    unset($_SESSION['cart']);
    $RedirectUrls->setReturnUrl('http://php4ever.com/pay.php?success=true&cart='.$cart)
        ->setCancelUrl('http://php4ever/pay.php?success=false');


}

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($RedirectUrls)
    ->setTransactions([$transaction]);


try{
    $payment->create($paypal);
} catch(Exception $e){
    die($e);
}
$approv = $payment->getApprovalLink();
header("Location:{$approv}");
?>
