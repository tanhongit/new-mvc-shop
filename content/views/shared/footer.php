</div>
<footer class="short" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h4>Thông tin</h4>
                <p><?= $about_footer ?><a href="<?= $link_about ?>" class="btn-flat btn-xs">Xem thêm <i class="fa fa-arrow-right"></i></a></p>
                <hr class="light">
                <div class="row">
                    <div class="col-md-3">
                        <h5><?= $menu_footers[12]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[0]['menu_url'] ?>"><?= $menu_footers[0]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[1]['menu_url'] ?>"><?= $menu_footers[1]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[2]['menu_url'] ?>"><?= $menu_footers[2]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $menu_footers[13]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[3]['menu_url'] ?>"><?= $menu_footers[3]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[4]['menu_url'] ?>"><?= $menu_footers[4]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[5]['menu_url'] ?>"><?= $menu_footers[5]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $menu_footers[14]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[6]['menu_url'] ?>"><?= $menu_footers[6]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[7]['menu_url'] ?>"><?= $menu_footers[7]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[8]['menu_url'] ?>"><?= $menu_footers[8]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $menu_footers[15]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[9]['menu_url'] ?>"><?= $menu_footers[9]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[10]['menu_url'] ?>"><?= $menu_footers[10]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $menu_footers[11]['menu_url'] ?>"><?= $menu_footers[11]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="short">LIÊN HỆ CHÚNG TÔI</h5>
                <span class="phone"><?= $phone ?></span>
                <p class="short">SĐT Phụ: <?= $phone2 ?></p>
                <ul class="list icons list-unstyled push-top">
                    <li><i class="fa fa-map-marker"></i> <strong>Địa chỉ:</strong> <?= $address_contact ?></li>
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?= $email_contact ?>"><?= $email_contact ?></a></li>
                </ul>
                <div class="social-icons push-top">
                    <ul class="social-icons">
                        <li class="facebook"><a href="<?= $link_Facebook ?>" target="_blank" data-placement="bottom" data-tooltip title="Facebook">Facebook</a></li>
                        <li class="twitter"><a href="<?= $link_Twitter ?>" target="_blank" data-placement="bottom" data-tooltip title="Twitter">Twitter</a></li>
                        <li class="linkedin"><a href="<?= $linkedin_contact ?>" target="_blank" data-placement="bottom" data-tooltip title="Linkedin">Linkedin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <p>© Copyright <script>
                        document.write(new Date().getFullYear())
                    </script> - Phát triển bởi <span><a href="https://tanhongit.com">TanHongIT</a></span>.</p>
            </div>
        </div>
    </div>
</footer>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '517386205818335',
            xfbml: true,
            version: 'v6.0'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/vi_VN/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="public/vendor/jquery/jquery.js"></script>
<script src="public/vendor/jquery.appear/jquery.appear.js"></script>
<script src="public/vendor/jquery.easing/jquery.easing.js"></script>
<script src="public/vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="public/vendor/bootstrap/bootstrap.min.js"></script>
<script src="public/vendor/common/common.js"></script>
<script src="public/vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="public/vendor/jquery.stellar/jquery.stellar.js"></script>
<script src="public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="public/vendor/jquery.gmap/jquery.gmap.js"></script>
<script src="public/vendor/isotope/jquery.isotope.js"></script>
<script src="public/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="public/vendor/jflickrfeed/jflickrfeed.js"></script>
<script src="public/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="public/vendor/vide/vide.js"></script>
<script src="public/js/theme.min.js"></script>
<script src="public/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="public/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="public/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="public/js/views/view.home.js"></script>
<script src="public/js/custom.js"></script>
<script src="public/js/theme.init.js"></script>
<script src="public/js/comment/ajax.js"></script>
</body>

</html>