<?php
$login ='';
require_once "core/load.php";

if(isset($_POST['login'])){

    $_POST['username']= mysqli_real_escape_string($conn,$_POST['username']);
    $_POST['password']= mysqli_real_escape_string($conn,$_POST['password']);

    if(login($conn,$_POST['username'],$_POST['password'])!=0)
    {
        $_SESSION['id'] = login($conn,$_POST['username'],$_POST['password']);
        if(isAdmin($conn,$_SESSION['id'])==1) {
            $_SESSION['admin']=1;
            header("location:index.php");
        }
        else{
            header("location:index.php");

        }
    }
    else {
        $login = 'שם שמתמש לא תקין';
    }

}
?>





            <?php require_once "core/header.php";?>
            <div class="product-big-title-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-bit-title text-center">
                                <h2>התחברות</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper" style="direction: rtl;text-align: right">
                <form action="" method="post" class="form-signin">
                    <h2 class="form-signin-heading">התחברות</h2>
                    <br>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required=""/>

                    <br>


                    <label for="remember_me">זכור אותי</label>
                    <input type="checkbox" id="remember_me" name="_remember_me"  />
                    <br>
                    <br>
                    <span style="color: red"><?php echo $login;?></span>

                    <button name='login' class="btn btn-lg btn-primary btn-block" type="submit">התחבר</button>
                </form>
            </div>
            <?php require_once "core/footer.php";?>
        </div>
    </div>
</div>
<div class="wrapper" >
    <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading">Login</h2>
        <br>
        <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
        <br>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>

<br>


        <label for="remember_me">Remeber me</label>
        <input type="checkbox" id="remember_me" name="_remember_me"  />
        <br>
        <br>
        <span style="color: red"></span>

        <button name='login' class="btn btn-lg btn-primary btn-block" type="submit">Connect</button>
    </form>
</div>
<?php require_once "core/footer.php";?>