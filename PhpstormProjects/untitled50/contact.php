<?php
require_once "core/load.php";



if(isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $to = "fogeler1212@gmail.com";
    $subject = " הודעה מאתר מוצרים מגניבים לחיים ";
    $subject1 = "הודעה מאתר מוצרים מגניבים לחיים";
    if (!isset($name) || !isset($email) || !isset($msg)) {
        echo "<script>alert('הנא מלא את כול הפרטים')</script>";
    } else {


        $message = <<<"HTML"
<html>
<head>
	<title>     מוצרים מגניבים לחיים</title>
</head>

<p>       הודעה מאתר מוצרים מגניבים לחיים</p>
<table>
	<tr>
		<th>שם</th>
		<th>איימל</th>
		<th>טלפון</th>
	</tr>
	<tr>
		<td> $name</td>
		<td> $email</td>

	</tr>
</table>
<h1>סיבת הודעה </h1>
<p>$msg</p>
</body>
</html>
HTML;
        $message1 = <<<"HTML"
<br>
&nbsp;&nbsp;&nbsp; תודה שפנית לאתר מוצרים מגניבים לחיים נחזור אלייך בהקדם אפשרי
<br><br><br>


HTML;
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <daniel538762@gmail.com>' . "\r\n";


        mail($to, $subject, $message, $headers);
        mail($email, $subject1, $message1, $headers);
        echo "<script>alert('תודה שפנית למוצרים מגניבים לחיים נחזור אלייך בהקדם האפשרי');</script>";
    }
}

?>




<?php require_once "core/header.php";?>

<div class="product-big-title-area" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center" style="text-align: right;direction: rtl">
                    <h2>יצירת קשר</h2>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="wrapper" style="text-align: right;direction: rtl" >
        <form action="" method="post" class="form-signin">
            <h2 class="form-signin-heading">צור איתנו קשר</h2>
            <br>
            <input type="text" class="form-control" name="name" placeholder="שם" required="" autofocus="" />
            <br>
            <input type="text" class="form-control" name='email' placeholder="מייל" required=""/>

            <br>
            <textarea rows="4" cols="50" name="msg" class="form-control" placeholder="השאר הודעה"></textarea>





            <br>
            <br>
            <span style="color: red"></span>

            <button name='submit'  class="btn btn-lg btn-primary btn-block" type="submit">שלח</button>
        </form>
    </div>
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Or%20yehuda%20odem%2010&key=AIzaSyDe659phKXQoRyVcdDSf6q4Yy_J2NyS-ug" allowfullscreen></iframe>
<?php require_once "core/footer.php";?>