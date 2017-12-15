<?php

require_once "core/load.php";
$cart = new cart($conn,$_SESSION['cart']);
$cart1 = $cart->getOrder();

?>


<?php require_once "core/header.php";?>

<div class="product-big-title-area" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>היסטורית רכישה</h2>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar" style="direction: rtl">
                    <h2 class="sidebar-title">חיפוש מוצרים</h2>
                    <form action="search.php" method="get">
                        <input type="text" name="q" placeholder="חפש מוצר....">
                        <input type="submit" value="חפש">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">מוצרים</h2>
                    <?php echo recent($conn);?>
                </div>


            </div>

            <div class="col-md-8" style="direction: rtl">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <?php echo $cart1;?>

                        <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>אולי יעניין אותך גם...</h2>
                                <ul class="products">
                          <?php echo may($conn);?>
                                </ul>
                            </div>








                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "core/footer.php";?>