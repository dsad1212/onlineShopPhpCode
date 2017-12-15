<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once "core/load.php";
$item_number = $_GET['item_number'];
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];
echo $_GET['cm'];
//Get product price



if(!empty($txn_id)){
//Check if payment data exists with the same TXN ID.
    $prevPaymentResult = $conn->query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'");

    if($prevPaymentResult->num_rows > 0){
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $last_insert_id = $paymentRow['payment_id'];
    }else{
        //Insert tansaction data into the database
        $insert = $conn->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
        $last_insert_id = $conn->insert_id;
    }
}
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once "core/load.php";
$item_number = $_GET['item_number'];
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];
echo $_GET['cm'];
//Get product price



if(!empty($txn_id)){
//Check if payment data exists with the same TXN ID.
    $prevPaymentResult = $conn->query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'");

    if($prevPaymentResult->num_rows > 0){
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $last_insert_id = $paymentRow['payment_id'];
    }else{
        //Insert tansaction data into the database
        $insert = $conn->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
        $last_insert_id = $conn->insert_id;
    }

}
?>
<?php require_once "core/header.php";?>
<h1>Thank you for buying from us your paymanet id is <?php echo $last_insert_id; ?></h1>
<?php require_once "core/footer.php";?>



