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
if(!isset($_POST['product'],$_POST['price'])){
    die();
}
$product = $_POST['product'];
$price = $_POST['price'];
$shipping = 2.00;
$total = $price+$shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
  ->setCurrency('USD')
  ->setQuantity(1)
   ->setPrice($price);
$item2 = new Item();
$item2->setName('lol')
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice(1);
$itemlist = new ItemList();
$itemlist->setItems(array($item,$item2));

$details = new Details();
$details->setShipping($shipping)
    ->setSubtotal($price+1);

$amount = new Amount();
$amount->setCurrency('USD')
    ->setTotal($total+1)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemlist)
    ->setDescription('first')
    ->setInvoiceNumber('123');

$RedirectUrls = new RedirectUrls();
$RedirectUrls->setReturnUrl('http://jewish-store.com/pay.php?success=true')
    ->setCancelUrl('http://jewish-store.com/pay.php?success=false');

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