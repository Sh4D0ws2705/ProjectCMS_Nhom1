<?php get_header() ?>

<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-6">
                <h4 class="mb-3 text-secondary">100% Thực phẩm hữu cơ</h4>
                <h1 class="mb-5 display-3 text-primary">Rau hữu cơ & Trái cây, Thực phẩm</h1>
            </div>
            <div class="col-md-12 col-lg-6">
                <?php get_template_part('slider'); ?>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- begin marquee -->
<div class="container-fluid py-5 con-1">
    <div class="marquee-text">
        <?php
        $marquee_text = get_theme_mod('marquee_text', '- Tươi khỏe - An toàn - Nhập khẩu - Bổ dưỡng');
        for ($i = 0; $i < 5; $i++): // Hiển thị 5 lần văn bản marquee
        ?>
            <h2><?php echo esc_html($marquee_text); ?></h2>
        <?php endfor; ?>
    </div>
</div>
<!-- end marquee -->


<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Giao hàng miễn phí</h5>
                        <p class="mb-0">Khi mua hóa đơn trên 500ks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Bảo mật thanh toán</h5>
                        <p class="mb-0">100% bảo mật thanh toán</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Trả hàng trong 5 ngày</h5>
                        <p class="mb-0">Đảm bảo hoàn tiền trong 5 ngày</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Hỗ trợ 24/7</h5>
                        <p class="mb-0">Hỗ trợ mọi lúc và nhanh chóng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->

<!-- strat banner quảng cáo -->
<div class="container-fluid py-2">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <a href="<?php echo esc_url(get_theme_mod('banner_link', '#')); ?>">
                <img class="img-fluid w-100 h-120 d-block mx-auto"
                    src="<?php echo esc_url(get_theme_mod('banner_image', get_theme_file_uri('img/section_hot_banner.png'))); ?>"
                    alt="Banner">
            </a>
        </div>
    </div>
</div>
<!-- end banner quảng cáo -->

<!-- Bestsaler Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Sản phẩm bán chạy</h1>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN',
            );
            ?>
            <?php $args = array('post_type' => 'product', 'posts_per_page' => 8, 'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
            <?php $getposts = new WP_query($args); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()):
                $getposts->the_post(); ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <?php get_template_part('content/product_item'); ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<!-- Bestsaler Product End -->

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <!-- lấy ra tên danh mục cha dựa theo id -->
                <?php $cate = get_term_by('id', 23, 'product_cat'); ?>
                <div class="col-lg-4 text-start">
                    <a class="title-sp" href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                        <h1><?php echo $cate->name ?></h1>
                    </a>
                </div>
                <div class="col-lg-8 text-end">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle text-light" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Xem thêm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <!-- lấy ra các danh mục con của danh mục cha -->
                            <?php
                            $args = array(
                                'taxonomy' => 'product_cat',
                                'hide_empty' => false,
                                'parent' => $cate->term_id,
                                'number' => 10,
                                'order' => 'DESC'
                            );

                            $categories = get_categories($args);
                            foreach ($categories as $category) { ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo get_term_link($category->slug, 'product_cat'); ?>"><?php echo $category->name; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- lấy sản phẩm theo danh mục -->
            <div class="row g-4">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'ignore_sticky_posts' => 1,
                    'product_cat' => $cate->slug,
                    'order' => 'DESC'
                );
                $getposts = new WP_query($args);

                // Kiểm tra nếu có sản phẩm
                if ($getposts->have_posts()):
                    global $wp_query;
                    $wp_query->in_the_loop = true;
                    while ($getposts->have_posts()):
                        $getposts->the_post(); ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <?php get_template_part('content/product_item'); ?>
                        </div>
                    <?php endwhile;
                else: ?>
                    <div class="col-12">
                        <h5 class="text-center">Không có sản phẩm</h5>
                    </div>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <!-- lấy ra tên danh mục cha dựa theo id -->
                <?php $cate = get_term_by('id', 21, 'product_cat'); ?>
                <div class="col-lg-4 text-start">
                    <a class="title-sp" href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                        <h1><?php echo $cate->name ?></h1>
                    </a>
                </div>
                <div class="col-lg-8 text-end">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle text-light" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Xem thêm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <!-- lấy ra các danh mục con của danh mục cha -->
                            <?php
                            $args = array(
                                'taxonomy' => 'product_cat',
                                'hide_empty' => false,
                                'parent' => $cate->term_id,
                                'number' => 10,
                                'order' => 'DESC'
                            );

                            $categories = get_categories($args);
                            foreach ($categories as $category) { ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo get_term_link($category->slug, 'product_cat'); ?>"><?php echo $category->name; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- lấy sản phẩm theo danh mục -->
            <div class="row g-4">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'ignore_sticky_posts' => 1,
                    'product_cat' => $cate->slug,
                    'order' => 'DESC'
                );
                $getposts = new WP_query($args);

                // Kiểm tra nếu có sản phẩm
                if ($getposts->have_posts()):
                    global $wp_query;
                    $wp_query->in_the_loop = true;
                    while ($getposts->have_posts()):
                        $getposts->the_post(); ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <?php get_template_part('content/product_item'); ?>
                        </div>
                    <?php endwhile;
                else: ?>
                    <div class="col-12">
                        <h5 class="text-start">Không có sản phẩm</h5>
                    </div>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Fruits Shop End-->




<!-- Banner Section Start-->
<div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Chuyên cung cấp</h1>
                    <p class="fw-normal display-3 text-dark mb-4">Trái cây nhập khẩu</p>
                    <p class="mb-4 text-dark">Fruitables
                        với hơn 15 năm kinh nghiệm trong ngành nhập khẩu chuyên nghiệp
                        các loại trái cây, chúng tôi luôn muốn mang đến cho khách hàng sự đa dạng về sản phẩm, đáp ứng
                        nhu cầu mua sắm tiện lợi, an toàn. Đem đến những trải nghiệm hàng đầu về chất lượng. Tất cả sự
                        chăm chỉ và nỗ lực của chúng tôi vì sức khỏe của bạn.</p>
                    <a href="<?php bloginfo('url'); ?>/shop" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">Xem
                        thêm</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="<?php echo get_theme_file_uri('img/baner-1.png') ?>" class="img-fluid w-100 rounded"
                        alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->



<!-- Fact Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="bg-light p-5 rounded">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>Khách hàng hài lòng</h4>
                        <h1>1963</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>Chất lượng dịch vụ</h4>
                        <h1>99%</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>Chứng nhận chất lượng</h4>
                        <h1>33</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>Sản phẩm có sẵn</h4>
                        <h1>789</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact Start -->


<!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h1 class="display-5 mb-5 text-dark">Cảm nhận của khách hàng</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="<?php echo get_theme_file_uri('img/testimonial-1.jpg') ?>"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="<?php echo get_theme_file_uri('img/testimonial-1.jpg') ?>"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="<?php echo get_theme_file_uri('img/testimonial-1.jpg') ?>"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tastimonial End -->
<?php get_footer() ?>