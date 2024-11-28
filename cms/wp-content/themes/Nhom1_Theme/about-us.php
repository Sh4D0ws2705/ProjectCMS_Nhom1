<?php get_header(); ?>

<?php
// Template name: Template giới thiệu
?>

<?php get_template_part('content/top-header'); ?>

<section class="bsb-about-6 py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="text-primary mb-4 display-5 text-center">SỨ MỆNH CỦA FRUITABLES</h2>
                <p class="mb-5 text-center lead fs-4">Mục tiêu của chúng tôi là phát triển và mở rộng đến những thị trường mới, đồng thời mang lại trải nghiệm tuyệt vời cho người tiêu dùng tại Việt Nam qua các sản phẩm trái cây với chất lượng tốt nhất</p>
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gy-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6">
                <div class="row justify-content-xl-end">
                    <div class="col-12 col-xl-11">
                        <div class="accordion accordion-flush" id="accordionAbout6">
                            <div class="accordion-item mb-4 border border-dark">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-transparent fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        GIÁ TRỊ CỐT LÕI
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionAbout6">
                                    <div class="accordion-body">
                                        Fruitables với hơn 15 năm kinh nghiệm trong ngành nhập khẩu chuyên nghiệp các loại trái cây, chúng tôi luôn muốn mang đến cho khách hàng sự đa dạng về sản phẩm, đáp ứng nhu cầu mua sắm tiện lợi, an toàn. Đem đến những trải nghiệm hàng đầu về chất lượng. Tất cả sự chăm chỉ và nỗ lực của chúng tôi vì sức khỏe của bạn.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-4 border border-dark">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed bg-transparent fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        LĨNH VỰC HOẠT ĐỘNG
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionAbout6">
                                    <div class="accordion-body">
                                        Là một trong những công ty dẫn đầu về trái cây nhập khẩu tại thị trường Việt Nam với bề dày hơn 15 năm kinh nghiệm trong lĩnh vực nhập khẩu và phân phối trái cây Fruitables tự tin có mạng lưới khách hàng và hệ thống phân phối trái cây rộng khắp các tỉnh thành Việt Nam với các đối tác đáng tin cậy cả trong và ngoài nước.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-4 border border-dark">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed bg-transparent fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        ĐỘI NGŨ NHÂN SỰ
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionAbout6">
                                    <div class="accordion-body">
                                        Mỗi cá nhân trong tập thể là một mảnh ghép không thể thiếu cho sự thành công ngày hôm nay của Fruitables
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img class="img-fluid rounded" loading="lazy" src="<?php echo get_theme_file_uri('img/regulation-img_0877e5fadee04ad1bf6b38eaec1f287c.png') ?>" alt="About 6">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>