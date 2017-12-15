<?php
require_once "core/load.php";
require_once "core/header.php";
?>
<body>
<section class="demo_wrapper">
    <article class="demo_block">

        <ul id="demo1">
            <li><a href="#slide1"><img src="img/image-1.jpg"</li>
            <li><a href="#slide2"><img src="img/image-2.jpg" </li>
            <li><a href="#slide3"><img src="img/image-4.jpg" </li>
        </ul>
    </article>
</section>

<script>
    $(function() {
        var demo1 = $("#demo1").slippry({
            // transition: 'fade',
            // useCSS: true,
            // speed: 1000,
            // pause: 3000,
            // auto: true,
            // preload: 'visible',
            // autoHover: false
        });

        $('.stop').click(function () {
            demo1.stopAuto();
        });

        $('.start').click(function () {
            demo1.startAuto();
        });

        $('.prev').click(function () {
            demo1.goToPrevSlide();
            return false;
        });
        $('.next').click(function () {
            demo1.goToNextSlide();
            return false;
        });
        $('.reset').click(function () {
            demo1.destroySlider();
            return false;
        });
        $('.reload').click(function () {
            demo1.reloadSlider();
            return false;
        });
        $('.init').click(function () {
            demo1 = $("#demo1").slippry();
            return false;
        });
    });
</script>
</body>
</html>
