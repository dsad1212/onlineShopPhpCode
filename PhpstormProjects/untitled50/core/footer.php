<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="footer-about-us" style="direction: rtl;text-align: right">
                    <h2>מוצרים<span>מגניבים לחיים</span></h2>
                    <p>אנחנו אתר מוצרים מגניבים מבטחים לכם את השרות הטוב והמהיר בארץ כול מוצרנו נמצאים בארץ ואנחנו מספקים אותם תוך 12 ימי עסקים בנוסף אפשר לפנות אלינו בכתובת מייל בכול זמן הכתובת שלנו היא
                        cool@products.com
                        <br> אפשר לפנות אלינו גם בטלפון למספר 0544932077
                        מאחלים לכם חווית קנייה מהנה ונעימה מצוות מוצרים מגניבים לחיים</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/coolproductsforlife/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>

                    </div>
                </div>
            </div>



            <div class="col-md-4 col-sm-6" style="direction: rtl;text-align: right">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">קטגוריות</h2>
                    <ul>
                       <?php echo categorys1($conn);?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="footer-newsletter" dir="rtl" style="text-align: right">
                    <h2 class="footer-wid-title">פרסומים למייל</h2>
                    <p>הרשמו במייל כדי לקבל פרסומים על מוצרים חדשים במיל</p>
                    <div class="newsletter-form">
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="רשום מייל">
                            <input type="submit" name="subscribe" value="קבל פרסומים">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; Cool products for life. All Rights Reserved.
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="js/bxslider.min.js"></script>
<script type="text/javascript" src="js/script.slider.js"></script>
</body>
</html>