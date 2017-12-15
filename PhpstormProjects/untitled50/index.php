<?php
require_once "core/load.php";

?>


<?php require_once "core/header.php";?>

    <div class="slider-area" xmlns="http://www.w3.org/1999/html">
        	<!-- Slider -->
<center>
			<img src="img/PayPal.png" class="cover" alt="" style="margin-top: 17px;width:50%;height:25%;"/>
</center>


			<!-- ./Slider -->
    </div> <!-- End slider area -->

    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p dir="rtl">11 ימי החזרה</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>משלוחים חינם</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>קנייה מאובטחת</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>מוצרים חדשים ומגניבים</p>
                    </div>
                </div>
            </div>
        </div>
 <!-- End promo area -->
    <br>
    <center>
                        <h2 class="section-title" style="color:black">מוצרים הטובים ביותר</h2>
                         <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            <?php echo top($conn);?>

            </div>
               
                </div>
            </div></div>
            </center>
                    
    <center>
    <div class="brands-area" style="margin-bottom: 70px;">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/PayPal.png" style="height:150px;width:150px;" alt="">
                            <img src="img/amazon.jpg" style="height:150px;width:150px;"alt="">
                            <img src="img/ebay.jpg" style="height:150px;widhth:150px;" alt="">
                             <img src="img/ali.png" style="height:150px;widhth:150px;" alt="">
                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     </center>

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">


                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">מוצרים הנמכרים ביותר</h2>

                        <?php echo topSellers($conn);?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">מוצרים החדשים ביותר</h2>


<?php echo toper($conn);?>

                    </div>
                </div>
            </div>
        </div>
    </div>



<?php require_once "core/footer.php";?>