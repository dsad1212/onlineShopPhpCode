<?php
require_once "core/load.php";
$pages = new pages();


if(!isset($_GET['id'])){

    $_GET['id']=1;
    $_GET['id']=mysqli_real_escape_string($conn,$_GET['id']);
    $pages->page($_GET['id']);
}
else{
    if($_GET['id']<=0){
        $_GET['id']=1;
    }
    $_GET['id']=mysqli_real_escape_string($conn,$_GET['id']);
    $pages->page($_GET['id']);
}
if(!isset($_GET['product'])){
    $_GET['product']=0;
    $_GET['product']=mysqli_real_escape_string($conn,$_GET['product']);
    $pageNum=$pages->pageNum($conn,$_GET['id'],$_GET['product']);
}
else{
    $_GET['product']=mysqli_real_escape_string($conn,$_GET['product']);
    $pageNum= $pages->pageNum($conn,$_GET['id'],$_GET['product']);
}

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

    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">

               <center>
                   <?php echo $pages->products($conn,$_GET['product']);?>
               </center>
        

            

           </div>


    <div class="row">
        <div class="col-md-12">
            <div class="product-pagination text-center">
                <nav>
                    <ul class="pagination">
                     <?php echo $pageNum;?>
                    </ul>
                </nav>
            </div>
       </div></div></div>

<?php require_once "core/footer.php";