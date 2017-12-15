<?php
require_once "core/load.php";

if(isset($_GET['q']) && $_GET['q']!=''){
    $q = $_GET['q'];
    $q = mysqli_real_escape_string($conn,$q);
    $search = new search($conn,$q);
    $search=$search->getSearch();

}
else{
    $search= 'לא נמצא עמוד זה באתר';
}
?>
<?php require_once "core/header.php";?>
<div class="product-big-title-area" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>אופס העמוד שחיפשת לא נמצא</h2>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container" style="margin-top: 35px;">
    <div class="row">
        <div class="col-md-8">

            <div class="single-sidebar" style="direction: rtl;text-align: right">
                <h2 class="sidebar-title">חיפוש מוצרים</h2>
                <form action="search.php" method="get">
                    <input type="text" name="q" placeholder="חיפוש מוצר...">
                    <input type="submit" value="חיפוש">
                </form>
            </div>

        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>


        <?php echo $search;?>
    </div>
</div>
<?php require_once "core/footer.php";?>
