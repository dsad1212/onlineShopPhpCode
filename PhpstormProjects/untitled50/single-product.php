<?php

require_once "core/load.php";
$x=0;
$id=$_GET['id'];
$id =mysqli_real_escape_string($conn,$id);


        $exist = exist1($conn,$id);
        if($exist==0)
        {

            header("location:404.php");
        }

$f = image1($conn,$id);
$f2=image2($conn, $id);
$f3=image3($conn, $id);
$f1 = desc1($conn,$id);
$desc = descer1($conn,$id);
$price = price1($conn,$id);
$quantity=q1($conn,$id);
$img='img';
$regular = selectRegular2($conn,$id);
?>


<?php require_once "core/header.php";?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>חנות</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area" style="text-align: right;direction: rtl">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">

                            <h2 class="sidebar-title">חיפוש מוצרים</h2>
                            <form action="search.php" method="get">
                                <input type="text" name="q" placeholder="חיפוש מוצר...">
                                <input type="submit" value="חיפוש">
                            </form>
                        
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">מוצרים נוספים</h2>

                        <?php echo recent($conn);?>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title"></h2>
                        <ul>

                        </ul>
                    </div>
                </div>
                <center>
                <h1 style="color:#fead53">תמונות מוצר</h1>
                </center>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">

                        </div>

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="brands-area" style="margin-bottom: 70px;">
                                    <div class="zigzag-bottom"></div>
                                    <div class="container">

                                        <div class="row" style="margin-right: 30px">


                                                        <img src="<?php echo $f;?>" style="height:250px;width:250px;" alt="">
                                            <br><br><br>
                                                        <img src="<?php echo $f2;?>" style="height:250px;width:250px;"alt="">
                                            <br><br><br>
                                                        <img src="<?php echo $f3;?>" style="height:250px;width:250px;" alt="">


                                            </div>
                         </div>
                                    </div>
                                </div>



                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name" style="color: #fead53"><?php echo $f1;?></h2>
                                    <div class="product-inner-price">
                                        <ins>₪<?php echo $price;?></ins> <del>₪<?php echo $price+5?></del>
                                    </div>

                                    <form action="cart.php" class="cart" method="get">
                                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                                        <button class="add_to_cart_button" type="submit">הוסף לסל</button>
                                    </form>

                                    <div class="product-inner-category">

                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">תיאור</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>תיאור מוצר</h2>
         <?php echo $desc;?>
                                            </div></div></div>
                                    </div>

                                </div>
                           </div></div></div></div></div>

</div>
    <script src="https://code.jquery.com/jquery.min.js"></script>

<?php require_once "core/footer.php";?>