<head>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3">
                        <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                        <a href="#" class="text-white">
                            <?php echo esc_html(get_theme_mod('top_header_address', '123 Street, New York')); ?>
                        </a>
                    </small>
                    <small class="me-3">
                        <i class="fas fa-envelope me-2 text-secondary"></i>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('top_header_email', 'Email@Example.com')); ?>" class="text-white">
                            <?php echo esc_html(get_theme_mod('top_header_email', 'Email@Example.com')); ?>
                        </a>
                    </small>
                </div>
                <div class="top-link pe-2">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'walker'         => new Custom_Walker_Nav_Menu(),
                        'menu_class'     => 'navbar-nav',
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="<?php echo home_url('/'); ?>" class="navbar-brand" alt="<?php bloginfo('name'); ?>">
                    <h1 class="text-primary display-6">
                        <?php echo esc_html(get_theme_mod('site_custom_name', get_bloginfo('name'))); ?>
                    </h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1', // Đảm bảo bạn đã khai báo location 'primary_menu' trong theme
                        'container' => false,
                        'menu_class' => 'navbar-nav mx-auto', // Class cho <ul>
                        'walker' => new Custom_Walker_Nav_Menu() // Định nghĩa thêm walker nếu cần để thêm các class cho <li> và <a>
                    ));
                    ?>
                    <div class="d-flex m-3 me-0">

                        <?php aws_get_search_form(true); ?>


                        <a href="<?php bloginfo('url'); ?>/gio-hang " class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                        <a href="<?php bloginfo('url'); ?>/tai-khoan" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->