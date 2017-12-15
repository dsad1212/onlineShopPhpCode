<?php

$cart = new cart($conn,$_SESSION['cart']);


    $cart->view();


?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>מוצרים מגניבים לחיים</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="js/slippry.min.js"></script>
    <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/slippry.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>

        var count = 1;

        function plus(p){

            var countEl = document.getElementById(p+'&f');
            count=Number(countEl.value);
            count++;

            countEl.value = count;
        }
        function minus(m){
            var countEl = document.getElementById(m+'&f');
            count=Number(countEl.value);
            if (count > 1) {

                count--;
                countEl.value = count;
            }
        }

    </script>
    <style>
        .wrapper {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);

        .form-signin-heading,
        .checkbox {
            margin-bottom: 30px;
        }

        .checkbox {
            font-weight: normal;
        }

        }

        .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
        @include box-sizing(border-box);

        &
        :focus {
            z-index: 2;
        }

        }

        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            #yes {
                margin-left: 400px;
            }
        }

        /* Landscape phone to portrait tablet */
        @media (max-width: 767px) {
            #yes {
                margin-left: 400px;
            }
        }

        /* Landscape phones and down */
        @media (max-width: 480px) {
            #yes {
                margin-left: 1px;
            }
        }






    </style>
</head>
<body>
<?php
$cat = categorys1($conn);
if(isset($_SESSION['id'])) {



    $usern = username($conn, $_SESSION['id']);
    echo "<div class=\"header-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-8\">
                <div class=\"user-menu\">
                    <ul>
                        <li><a href=\"\"><i class=\"fa fa-user\"></i> ברוך הבא<span style='color:green'> $usern</span></a></li>
                        <li><a href=\"logout.php\"><i class=\"fa fa-sign-out\"></i> יציאה</a></li>
                        <li><a href=\"order.php\"><i class=\"fa fa-sign-in\"></i>היסטורית רכישה</a></li>
                        <li><a href=\"cart.php\"><i class=\"fa fa-shopping-cart\"></i> סל קניות</a></li>
                        <li><a href=\"checkout.php\"><i class=\"fa fa-credit-card\"></i> ביצוע קנייה</a></li>

                    </ul>
                </div>
            </div>

            <div class=\"col-md-4\">
                <div class=\"header-right\">
                    <ul class=\"list-unstyled list-inline\">
                        <li class=\"dropdown dropdown-small\">

                            <a  href=\"index.php\">בית</a></a>
                        </li>

                        <li class=\"dropdown dropdown-small\">
                            <a data-toggle=\"dropdown\" data-hover=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><span class=\"key\">קטגוריות</span><span class=\"value\"> </span><b class=\"caret\"></b></a>
                            <ul class=\"dropdown-menu\">
                               $cat
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class=\"site-branding-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-6\">
                <div class=\"logo\">
                    <h1 style=\"color: lightblue\">מוצרים מגניבים לחיים</h1>
                </div>
            </div>

            <div class=\"col-sm-6\">
                 ".$cart->view()."
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class=\"mainmenu-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
            </div>
            <div class=\"navbar-collapse collapse\">
                <ul class=\"nav navbar-nav\">
                       <li><a href=\"contact.php\">יצירת קשר</a></li>
                    <li><a href=\"checkout.php\">ביצוע רכישה</a></li>
                    <li><a href=\"cart.php\">סל קניות</a></li>
                    <li><a href=\"shop.php\">עמוד קניות</a></li>

                    <li><a href=\"index.php\">בית</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
";
}
else{
    echo "<div class=\"header-area\">
    <div class=\"container\">
        <div class=\"row\">

            <div class=\"col-md-8\" >
                <div class=\"user-menu\">
                    <ul>
                        <li><a href=\"register.php\"><i class=\"fa fa-user\"></i> הרשמה</a></li>
                        <li><a href=\"cart.php\"><i class=\"fa fa-shopping-cart\"></i> סל קניות</a></li>
                        <li><a href=\"checkout.php\"><i class=\"fa fa-credit-card\"></i> ביצוע רכישה</a></li>
                        <li><a href=\"login.php\"><i class=\"fa fa-sign-in\"></i> התחברות</a></li>
                    </ul>
                </div>
            </div>

            <div class=\"col-md-4\">
                <div class=\"header-right\">
                    <ul class=\"list-unstyled list-inline\">

                            <a  href=\"index.php\">בית</a></a>




                        <li class=\"dropdown dropdown-small\">
                            <a data-toggle=\"dropdown\" data-hover=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><span class=\"key\">קטגוריות</span><span class=\"value\"> </span><b class=\"caret\"></b></a>
                            <ul class=\"dropdown-menu\">
                             $cat
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class=\"site-branding-area\">
    <div class=\"container\">
        <div class=\"row\">
        <center>
            <div class=\"col-sm-6\">
                <div class=\"logo\">

                    <h1 style=\"color: black;border: 1px solid lightcyan;border-radius:28px;\">אתר מוצרים מגניבים</h1>

                </div>
            </div>
            </center>

            <div class=\"col-sm-6\">
                 ".$cart->view()."
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class=\"mainmenu-area\">
    <div class=\"container\">
        <div class=\"row\">

            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
            </div>

            <div class=\"navbar-collapse collapse\">

                <ul class=\"nav navbar-nav\">
                    <li><a href=\"contact.php\">יצירת קשר</a></li>
                    <li><a href=\"checkout.php\">ביצוע רכישה</a></li>
                    <li><a href=\"cart.php\">סל קניות</a></li>
                    <li><a href=\"shop.php\">עמוד קניות</a></li>

                    <li><a href=\"index.php\">בית</a></li>
                </ul>
            </div>

        </div>

    </div>
</div>";
}
?>

