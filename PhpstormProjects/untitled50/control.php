<?php
require_once "core/load.php";

if(!isset($_GET['id']))
{
    $_GET['id']=1;
}
if(isset($_SESSION['admin'])) {
    if (isset($_POST['submit'])&&isset($_SESSION['admin'])) {
        $name = $_POST['category'];
        icategorys($conn, $name);

    }
    if (isset($_POST['submit1'])&&isset($_SESSION['admin'])) {
        $id = $_POST['id'];
        $price = $_POST['price'];
        $name = $_POST['pname'];
        $name1=$_POST['pname1'];
        $name2=$_POST['cars'];
        upadteProduct($conn, $id, $price);
        upadteProduct1($conn, $id, $name);
        upadteProduct2($conn, $id, $name1);
        upadteProduct3($conn, $id, $name2);
        echo "<script>alert('מוצר עודכן בהצלחה');</script>";

    }
    if (isset($_POST['submit12'])&&isset($_SESSION['admin'])) {
        $id = $_GET['id'];
        $adults = new products();
        if ($adults->upload($_FILES['fileToUpload']) == 1) {
            $adults->setProductName($_POST['txt']);
            $adults->setQuantity($_POST['quantity']);
            $adults->setDesc($_POST['desc']);
            $adults->setPrice($_POST['price']);
            $adults->setmkdir($_POST['txt']);
            $adults->upload1($_FILES['fileToUpload1'], $_POST['txt']);
            $adults->upload2($_FILES['fileToUpload2'], $_POST['txt']);
            echo $adults->getUpload() . '<br>';
            echo $adults->getPhoto1() . '<br>';
            echo $adults->getPhoto2() . '<br>';
            $adults->insertProduct($adults->getName(), $adults->getQuantity(), $adults->getUpload(), $adults->getDesc(), $adults->getPrice(), $adults->getPhoto1(), $adults->getPhoto2(), $id, $conn);
        }

    }
    if (isset($_POST['delete'])&&isset($_SESSION['admin'])) {
        $id = $_POST['id'];
        deleteProducts($conn, $id);
        echo "<script>alert('מוצר נמחק בהצלחה');</script>";
    }
    if (isset($_POST['delete1'])&&isset($_SESSION['admin'])) {
        $id = $_GET['id'];
        deleteCat($conn, $id);
    }
    if (isset($_POST['cat1'])&&isset($_SESSION['admin'])) {
        $id = $_GET['id'];
        updateName($conn, $id, $_POST['cat']);


    }

    if (isset($_GET['id'])&&isset($_SESSION['admin'])) {
        $id = $_GET['id'];
        $zeig = top12($conn, $id);
        $zeig1 = categorys12($conn, $id);
    }
}
else{
    header("location:index.php");
}
?>
<?php require_once "core/header.php";?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>אדמין</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<center>
<h4>הוספת קטגוריה</h4>
<div class="input-group">
    <form action="" method="post">
        <input type="text" name="category" class="form-control">
        <br>
        <center>
                        <span class="input-group-btn">
                            <button class="btn btn-default"  type="submit" name="submit"><i class="fa fa-button"></i>הוסף</button>
                        </span>
        </center>
    </form>
</div>

<!-- /.input-group -->
</div>
</center>
<br><br><br>
</center>
<center>
    <form action="" method="post">
<?php echo categorys12($conn,$id);?>
    <input type="submit" name="delete1" value="מחק קטגוריה">
        </form>
</center>
<br><br>
<ul style="background: lightgrey;text-align: center">
    <h2>תבחר קטגוריה לערוך</h2>

<?php echo categorys($conn);?>
    </ul>
<div class="product-inner-category">

</div>

<div role="tabpanel">
    <ul class="product-tab" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Upload</a></li>

    </ul>

    <div role="tabpanel" class="tab-pane fade in active" id="home">

        <div class="well" style="text-align: right;direction: rtl">
            <h4>הוסף מוצר</h4>
            <form action='' method='post' enctype='multipart/form-data'">
            בחר תמונה ראשית
            <br>
            <input type='file' name='fileToUpload' id='fileToUpload'>
            <br>
            <br>
            בחר שם למוצר
            <br>
            <input type='text' name ='txt'>
            <br>
            <br>
            תתבחר תיאור למוצר
            <br>
            <textarea name="desc" cols="30" rows="10"></textarea>
            <br>
            כמות מוצר במלאי
            <br>
            <input type='text' name='quantity'>
            <br>
            בחר מחיר
            <br>
            <input type='text' name='price'>
            <br>
            תמונה 2
            <br>
            <input type='file' name='fileToUpload1' id='fileToUpload'>
            <br>
            תמונה 3
            <br>
            <input type='file' name='fileToUpload2' id='fileToUpload'>
            <br>

            <input type='submit' value='עלה מוצר' name='submit12'>
            </form>
        </div>
<?php echo top12($conn, $id);?>

</div></div></div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>











        </div>
    </div>
</div>



