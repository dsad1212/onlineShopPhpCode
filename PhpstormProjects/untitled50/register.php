<?php

require_once "core/load.php";
$user = array('name'=> '','family' =>'','username'=> '','email' => '','password' => '');
if(isset($_POST['submit'])) {
    $_POST['name'] =mysqli_real_escape_string($conn,$_POST['name']);
    $_POST['family'] =mysqli_real_escape_string($conn,$_POST['family']);
    $_POST['username'] =mysqli_real_escape_string($conn,'1');
    $_POST['email'] =mysqli_real_escape_string($conn,$_POST['email']);
    $_POST['password'] =mysqli_real_escape_string($conn,$_POST['password']);
    $_POST['password1'] =mysqli_real_escape_string($conn,$_POST['password1']);

    $users = new users($conn);
    $users->setName($_POST['name']);
    $users->setFamily($_POST['family']);
    $users->setUsername($_POST['username']);
    $users->setEmail($_POST['email']);
    $users->setCode(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
    $users->setPassword($_POST['password'],$_POST['password1']);
    $erorr = $users->getError();
    foreach ($erorr as $erorr1 => $erorr2) {
        $user[$erorr1] = $erorr2;

    }

    if ($users->getName() != '' && $users->getFamily() != '' && $users->getUsername() != '' && $users->getEmail() != '' && $users->getPassword() != '') {
        $users->setUser(3,$users->getName(),$users->getFamily(),$users->getUsername(),$users->getEmail(),$users->getPassword(),$users->getCode());


        $code =$users->getCode();
        $message = "

תודה שנרשמת לאתר מוצרים מגניבים אנא השאר קוד במייל
www.php4ever.com/confirm.php

$code

";





        $mail = new mail();
        $mail->setMessage($users->getEmail(),'הרשמה לאתרים מוצרים מגניבים לחיים',$message);
        $mail->sendEmail();
        header("location:confirm.php");


    }
}
?>


<?php require_once "core/header.php";?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>הרשמה</h2>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="wrapper" style="text-align: right;direction: rtl">
        <form action="" method="post" class="form-signin">
            <h2 class="form-signin-heading">הרשמה</h2>
            <h4>מלא בבקשה פרטים בעברית</h4>
            <input type="text" class="form-control" name="name" placeholder='שם פרטי'  autofocus="" />
            <span style="color: red"><?php echo $user['name'];?></span>
            <br>
            <input type="text" class="form-control" name="family" placeholder='שם משפחה' autofocus="" />
            <span style="color: red"> <?php echo $user['family'];?></span>
            <br>
            <input type="text" class="form-control" name="email" placeholder="כתובת מייל" autofocus="" />
            <span style="color: red"> <?php echo $user['email'];?></span>
            <br>
            <input type="password" class="form-control" name="password" placeholder="סיסמא" />
            <span style="color: red"> <?php echo $user['password'];?></span>
            <br>
            <input type="password" class="form-control" name="password1" placeholder="אימות סיסמא" />
            <label class="checkbox">

            </label>
            <button name="submit" class="btn btn-lg btn-primary btn-block" type="">סיים</button>


        </form>
    </div>


<?php require_once "core/footer.php";?>