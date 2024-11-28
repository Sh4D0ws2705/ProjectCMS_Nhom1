<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">Fruitables</h1>
                        <p class="text-secondary mb-0">Fresh products</p>
                    </a>
                </div>
                <div class="col-lg-6">
                    <h4 id="footer-subcribe" class="text-primary">Đăng ký nhận thông tin khuyến mãi ngay!</h4>
                    <div class="position-relative mx-auto">
                        <!-- <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                            placeholder="Your Email">
                        <button type="submit"
                            class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                            style="top: 0; right: 0;">Đăng ký</button>
                             -->
                        <?php echo do_shortcode('[wpforms id="197"]'); ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Về Fruitables</h4>
                    <p class="mb-4">Chúng tôi cung cấp trái cây tươi ngon, chất lượng cao, giao hàng nhanh chóng,
                        và dịch vụ tận tâm, mang đến sự hài lòng cho khách hàng.</p>
                    <a href="<?php bloginfo('url') ?>/gioi-thieu"
                        class="btn border-secondary py-2 px-4 rounded-pill text-primary">Xem thêm</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Liên hệ</h4>
                    <p>Địa chỉ: 420a Nơ Trang Long, F13, Quận Bình Thạnh</p>
                    <p>Email: nguyenhieunghia2004@gmail.com</p>
                    <p>Phone:093 793 0655</p>
                    <p>Chấp nhận thanh toán</p>
                    <img src=" <?php echo get_theme_file_uri('img/payment.png') ?>" class="img-fluid" alt="">

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <iframe
                        src="<?php echo esc_url(get_theme_mod('google_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.474978921182!2d106.7554838115163!3d10.851432489257311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2sThu%20Duc%20College%20of%20Technology!5e0!3m2!1sen!2s!4v1731056180686!5m2!1sen!2s')); ?>"
                        width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="<?php echo home_url('/'); ?>"><i
                            class="fas fa-copyright text-light me-2"></i><?php bloginfo('name'); ?> - Nhóm 1</a>,
                    All right reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                <img src=" <?php echo get_theme_file_uri('img/logoSaleNoti.png') ?>" class="img-fluid" alt=""
                    width="150px">
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->



<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->

<!-- Template Javascript -->
<script src="js/main.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6745bbf02480f5b4f5a446ab/1idk6c9fe';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<?php wp_footer() ?>
</body>

</html>