<?php
require_once "core/load.php";
$cart = new cart($conn,$_SESSION['cart']);
if(isset($_GET['id'])){
    $_GET['id']=mysqli_real_escape_string($conn,$_GET['id']);
    $cart->setCart($_GET['id']);
}
if(isset($_GET['delete'])){
    $_GET['delete']=mysqli_real_escape_string($conn,$_GET['delete']);
    $cart->deleteProduct($_GET['delete']);
}
if(isset($_POST['update_cart'])){
    foreach($_POST as $key =>$value){
        if(is_numeric($key)&&$_POST[$key]>0) {
            $cart->updateQuantity($key,$_POST[$key]);
        }
    }
    $cart->setCartTotal();
    $cart->view();
}
if(isset($_POST['proceed'])){
    header("Location: checkout.php");
}
$cart1 = $cart->getCart();
?>
<?php require_once "core/header.php";?>

    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>סל קניות</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area ">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar" style="text-align: right;direction: rtl">
                        <h2 class="sidebar-title">חיפוש מוצרים</h2>
                        <form action="search.php" method="get">
                            <input type="text" name="q" placeholder="חיפוש מוצרים...">
                            <input type="submit" value="חפש">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">מוצרים נוספים</h2>

                      <?php echo recent($conn);?>
                        </div>

                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
               <?php echo $cart1;?>

                            <div class="cart-collaterals">


                            <div class="cross-sells" style="direction: rtl">
                                <h2>אולי יעניין אותך גם...</h2>
                                <ul class="products">
<?php echo may($conn);?>

                                </ul>
                            </div>


                                <?php echo $cart->setCartTotal();?>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once "core/footer.php";?>