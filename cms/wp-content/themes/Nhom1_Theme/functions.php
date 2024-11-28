<?php
require_once get_template_directory() . '/inc/class-custom-walker-nav-menu.php';

add_action(hook_name: "wp_enqueue_scripts", callback: "loadCSSandJS");

function loadCSSandJS(): void
{
    // -----------------------LOAD CSS-----------------------
    wp_enqueue_style('bootstrap_css', get_theme_file_uri("/css/bootstrap.min.css"));
    wp_enqueue_style('main_css', get_theme_file_uri("/css/style.css"));
    wp_enqueue_style('child_css', get_theme_file_uri("/css/child.css"));
    wp_enqueue_style('fa_font1', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
    wp_enqueue_style('bootstrap_icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css');
    wp_enqueue_style('fa_font2', 'https://fonts.googleapis.com');
    wp_enqueue_style('fa_font3', 'https://fonts.gstatic.com');
    wp_enqueue_style('fa_font4', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Raleway:wght@600;800&display=swap');
    wp_enqueue_style('lightbox_css', get_theme_file_uri("/lib/lightbox/css/lightbox.min.css"));
    wp_enqueue_style('carousel_css', get_theme_file_uri("/lib/owlcarousel/assets/owl.carousel.min.css"));

    // -----------------------LOAD JS-----------------------
    wp_enqueue_script('js1', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', [], '1.0', true);
    wp_enqueue_script('js2', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', [], '1.0', true);
    wp_enqueue_script('js3', get_theme_file_uri('/lib/easing/easing.min.js'), [], '1.0', true);
    wp_enqueue_script('js4', get_theme_file_uri('/lib/waypoints/waypoints.min.js'), [], '1.0', true);
    wp_enqueue_script('js5', get_theme_file_uri('/lib/lightbox/js/lightbox.min.js'), [], '1.0', true);
    wp_enqueue_script('js6', get_theme_file_uri('/lib/owlcarousel/owl.carousel.min.js'), [], '1.0', true);

    // Template Javascript
    wp_enqueue_script('js7', get_theme_file_uri('/js/main.js'), [], '1.0', true);

    // Đảm bảo rằng đối tượng ajax_url đã được truyền vào JS
    wp_localize_script('js7', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}

// -----------------ĐĂng kí menu
function register_menus()
{
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'Fruitables'),
            'top-menu' => esc_html__('Top Menu', 'Fruitables')

        )
    );
}
add_action('init', 'register_menus');

// -------------------Tính lượt view cho bài viết
function setpostview($postID)
{
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function getpostviews($postID)
{
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

//-------------ĐĂng ký template woocommerce
function my_custom_wc_theme_support()
{

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'my_custom_wc_theme_support');

// --------------------- tạo custom post type trên dashboard để thay đổi ảnh slider banner
function tao_custom_post_type()
{
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Ảnh banner slider', //Tên post type dạng số nhiều
        'singular_name' => 'Ảnh banner slider' //Tên post type dạng số ít
    );

    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Ảnh banner slider', //Mô tả của post type
        'supports' => array(
            'title',
            'thumbnail',
        ), //Các tính năng được hỗ trợ trong post type 
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-format-image', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );

    register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

}
add_action('init', 'tao_custom_post_type');


// -------------------- tính ra phần trăm giảm giá của sản phẩm
function get_sale_percent($price, $salePrice)
{
    $sale = ($salePrice * 100) / $price;
    $percentSale = 100 % -$sale;
    return number_format($percentSale);
}

// ------------------------ dky sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'description'    => 'tùy chỉnh banner sidebar',
        'before_widget'  => '<div class="col-lg-12 py-4">',
        'after_widget'   => "</div>",
        'before_title'   => '<h4>',
        'after_title'    => "</h4>",
    ));
    // Đăng ký Sidebar Top chỉ khi đang ở trang archive sản phẩm

    register_sidebar(array(
        'name' => 'Sidebar Top',
        'id' => 'sidebar_top',
        'description'    => 'Tùy chỉnh banner sidebar chỉ hiển thị trên trang archive sản phẩm',
        'before_widget'  => '<div class="col-lg-12 py-4">',
        'after_widget'   => "</div>",
        'before_title'   => '<h4>',
        'after_title'    => "</h4>",
    ));
}



// add_filter( 'woocommerce_checkout_fields', 'misha_print_all_fields' );
// function misha_print_all_fields( $fields ) {
//     echo '<pre>';
//     print_r( $fields );
//     echo '</pre>';
//     return $fields;
// }




// ------------------------------------Custom Woocommerce

add_filter('woocommerce_output_related_products_args', 'change_related_products_count');
function change_related_products_count($args) {
    $args['posts_per_page'] = 3; // Số lượng sản phẩm liên quan
    $args['columns'] = 3; // Số cột hiển thị sản phẩm
    return $args;
}

// Xóa phần Shipping Fields trên trang Checkout
add_filter('woocommerce_cart_needs_shipping_address', '__return_false');

add_filter('woocommerce_checkout_fields', 'remove_fields');
function remove_fields($data) {
    unset($data["billing"]["billing_company"]);
    unset($data["billing"]["billing_country"]);
    unset($data["billing"]["billing_address_2"]);
    unset($data["billing"]["billing_postcode"]);
    return $data;
}


// Loại bỏ sidebar trên trang sản phẩm chi tiết của WooCommerce
function remove_woocommerce_sidebar_on_single_product()
{
    if (is_product()) { // Kiểm tra nếu là trang chi tiết sản phẩm
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
}
add_action('wp', 'remove_woocommerce_sidebar_on_single_product');
// Bỏ breadcrumb mặc định của WooCommerce
function custom_remove_breadcrumb_woo()
{
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}
add_action('template_redirect', 'custom_remove_breadcrumb_woo');

// Thay đổi thông báo khi không có sản phẩm
function custom_no_products_found_message()
{
    // Thêm nội dung vào trong div woocommerce-info
    return '<div class="woocommerce-info">Không có sản phẩm nào phù hợp với tìm kiếm của bạn. Hãy thử lại với các tiêu chí khác!</div>';
}
add_filter('woocommerce_no_products_found', 'custom_no_products_found_message');
// Thêm dropdown để thay đổi số lượng sản phẩm mỗi trang
function custom_per_page_dropdown()
{
    if (is_shop() || is_product_category()) {
?>
        <form method="GET" class="products-per-page">
            <select name="per_page" onchange="this.form.submit()">
                <option value="5" <?php selected(get_query_var('posts_per_page'), 5); ?>>5 Sản phẩm mỗi trang</option>
                <option value="10" <?php selected(get_query_var('posts_per_page'), 10); ?>>10 Sản phẩm mỗi trang</option>
                <option value="20" <?php selected(get_query_var('posts_per_page'), 20); ?>>20 Sản phẩm mỗi trang</option>
            </select>
        </form>
<?php
    }
}
add_action('woocommerce_before_shop_loop', 'custom_per_page_dropdown', 15);

// Lọc theo lựa chọn người dùng cho số lượng sản phẩm mỗi trang
function custom_per_page_filter($query)
{
    if (isset($_GET['per_page'])) {
        $query->set('posts_per_page', $_GET['per_page']);
    }
}
add_action('pre_get_posts', 'custom_per_page_filter');





// ------------------- Ajax action cho thêm sản phẩm vào giỏ hàng
function add_to_cart_ajax_handler()
{
    // Kiểm tra ID sản phẩm từ request
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Kiểm tra nếu product_id hợp lệ
    if ($product_id <= 0) {
        wp_send_json_error(['message' => 'Sản phẩm không hợp lệ']);
        wp_die();
    }

    // Lấy thông tin sản phẩm
    $product = wc_get_product($product_id);
    if (!$product) {
        wp_send_json_error(['message' => 'Không tìm thấy sản phẩm']);
        wp_die();
    }

    // Thêm sản phẩm vào giỏ hàng
    $added = WC()->cart->add_to_cart($product_id, $quantity);

    // Kiểm tra nếu sản phẩm được thêm thành công
    ob_start(); // Bắt đầu bộ đệm đầu ra
    if ($added) {
        $product_name = $product->get_name(); // Lấy tên sản phẩm
        wc_print_notice(sprintf('Sản phẩm %s đã được thêm vào giỏ hàng.', $product_name), 'success');
    } else {
        wc_print_notice('Không thể thêm sản phẩm vào giỏ hàng.', 'error');
    }
    $notice_html = ob_get_clean(); // Lưu thông báo vào biến

    wp_send_json_success([
        'notice_html' => $notice_html, // Trả về HTML của thông báo để hiển thị
    ]);

    wp_die(); // Kết thúc AJAX
}

// Đăng ký action cho AJAX
add_action('wp_ajax_add_to_cart', 'add_to_cart_ajax_handler');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_ajax_handler');




function redirect_to_cart_after_add_to_cart()
{
    // Kiểm tra xem có tham số redirect_to_cart trong URL không
    if (isset($_GET['redirect_to_cart']) && 'true' === $_GET['redirect_to_cart']) {
        return wc_get_cart_url(); // Chuyển hướng tới giỏ hàng
    }
}
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_cart_after_add_to_cart');


function theme_customize_register($wp_customize) {
    // Thêm section cho Top Header
    $wp_customize->add_section('top_header_section', array(
        'title'       => __('Top Header', 'Nhom1_Theme'),
        'priority'    => 30,
    ));

    // Thêm cài đặt cho Địa chỉ
    $wp_customize->add_setting('top_header_address', array(
        'default'           => '123 Street, New York',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('top_header_address_control', array(
        'label'    => __('Address', 'Nhom1_Theme'),
        'section'  => 'top_header_section',
        'settings' => 'top_header_address',
        'type'     => 'text',
    ));

    // Thêm cài đặt cho Email
    $wp_customize->add_setting('top_header_email', array(
        'default'           => 'Email@Example.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('top_header_email_control', array(
        'label'    => __('Email', 'your-text-domain'),
        'section'  => 'top_header_section',
        'settings' => 'top_header_email',
        'type'     => 'email',
    ));
}
add_action('customize_register', 'theme_customize_register');

function theme_customize_register_banner($wp_customize) {
    // Thêm section cho Banner
    $wp_customize->add_section('banner_section', array(
        'title'       => __('Banner', 'Nhom1_Theme'), // Thay 'Nhom1_Theme' bằng text domain của bạn
        'priority'    => 35,
    ));

    // Cài đặt cho ảnh Banner
    $wp_customize->add_setting('banner_image', array(
        'default'           => get_theme_file_uri('img/section_hot_banner.png'), // Giá trị mặc định
        'sanitize_callback' => 'esc_url_raw', // Kiểm tra URL hợp lệ
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'banner_image_control',
        array(
            'label'    => __('Banner Image', 'Nhom1_Theme'),
            'section'  => 'banner_section',
            'settings' => 'banner_image',
            'description' => __('Upload or select a banner image.', 'Nhom1_Theme'),
        )
    ));

    // Cài đặt cho URL liên kết
    $wp_customize->add_setting('banner_link', array(
        'default'           => '#', // Giá trị mặc định
        'sanitize_callback' => 'esc_url_raw', // Kiểm tra URL hợp lệ
    ));

    $wp_customize->add_control('banner_link_control', array(
        'label'    => __('Banner Link', 'Nhom1_Theme'),
        'section'  => 'banner_section',
        'settings' => 'banner_link',
        'type'     => 'url', // Loại input là URL
        'description' => __('Enter the URL for the banner link.', 'Nhom1_Theme'),
    ));
}
add_action('customize_register', 'theme_customize_register_banner');

function theme_customize_register_site_name($wp_customize) {
    // Thêm cài đặt cho tên trang web
    $wp_customize->add_setting('site_custom_name', array(
        'default'           => get_bloginfo('name'), // Giá trị mặc định là tên hiện tại của trang web
        'sanitize_callback' => 'sanitize_text_field', // Xử lý dữ liệu an toàn
    ));

    // Thêm control cho tên trang web
    $wp_customize->add_control('site_custom_name_control', array(
        'label'    => __('Tên trang web', 'Nhom1_Theme'), // Thay 'Nhom1_Theme' bằng text domain của bạn
        'section'  => 'title_tagline', // Đưa vào phần quản lý tiêu đề và tagline
        'settings' => 'site_custom_name',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'theme_customize_register_site_name');



function theme_customize_register_marquee($wp_customize) {
    // Thêm section mới cho Marquee Text
    $wp_customize->add_section('marquee_section', array(
        'title'       => __('Marquee Text', 'Nhom1_Theme'), // Thay 'Nhom1_Theme' bằng text domain của bạn
        'priority'    => 40,
    ));

    // Thêm cài đặt cho Marquee Text
    $wp_customize->add_setting('marquee_text', array(
        'default'           => '- Tươi khỏe - An toàn - Nhập khẩu - Bổ dưỡng', // Giá trị mặc định
        'sanitize_callback' => 'sanitize_text_field', // Xử lý dữ liệu đầu vào an toàn
    ));

    $wp_customize->add_control('marquee_text_control', array(
        'label'    => __('Marquee Text', 'Nhom1_Theme'),
        'section'  => 'marquee_section',
        'settings' => 'marquee_text',
        'type'     => 'text', // Dạng input là text
        'description' => __('Enter the text to be displayed in the marquee.', 'Nhom1_Theme'),
    ));
}
add_action('customize_register', 'theme_customize_register_marquee');


function theme_customize_register_map($wp_customize) {
    // Thêm section mới cho Google Maps
    $wp_customize->add_section('map_section', array(
        'title'       => __('Google Maps', 'Nhom1_Theme'), // Thay 'Nhom1_Theme' bằng text domain của bạn
        'priority'    => 45,
    ));

    // Thêm cài đặt cho URL Google Maps
    $wp_customize->add_setting('google_map_url', array(
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.474978921182!2d106.7554838115163!3d10.851432489257311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2sThu%20Duc%20College%20of%20Technology!5e0!3m2!1sen!2s!4v1731056180686!5m2!1sen!2s',
        'sanitize_callback' => 'esc_url_raw', // Đảm bảo URL hợp lệ
    ));

    // Thêm control cho Google Maps
    $wp_customize->add_control('google_map_url_control', array(
        'label'       => __('Google Map Embed URL', 'Nhom1_Theme'),
        'section'     => 'map_section',
        'settings'    => 'google_map_url',
        'type'        => 'url', // Input dạng URL
        'description' => __('Paste the embed URL of your Google Map.', 'Nhom1_Theme'),
    ));
}
add_action('customize_register', 'theme_customize_register_map');
