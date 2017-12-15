<?php
require_once "core/load.php";
$code = '';
if(isset($_POST['confirm'])){
    $_POST['code']=mysqli_real_escape_string($conn,$_POST['code']);
    if(confirm($conn,$_POST['code'])!=0)
    {
        $_SESSION['id'] = confirm($conn,$_POST['code']);
        updateConfrim($conn,$_SESSION['id']);
        header("Location: index.php");

    }
    else{
        $code = 'קוד לא תקין';
    }
}
?>


<?php require_once "core/header.php";?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>אישור קוד</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <form action="" method="post" class="form-signin">
            <h2 class="form-signin-heading">Confirm Code</h2>
            <input type="text" class="form-control" name="code" placeholder="רשום קוד" required="" autofocus="" />
            <span style="color: red"><?php echo $code;?></span>
             <br>
            <button name='confirm' class="btn btn-lg btn-primary btn-block" type="submit">אישור קוד</button>
        </form>
    </div>
<?php require_once "core/footer.php";?>