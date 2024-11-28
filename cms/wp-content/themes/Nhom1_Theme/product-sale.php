<?php
/*
Template Name: Template sản phẩm khuyến mãi
*/
get_header();
?>

<?php get_template_part('content/top-header'); ?>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
        </div>

        <div class="row g-4">
            <?php
            // Truy vấn các sản phẩm đang giảm giá
            $args = array(
                'post_type' => 'product', // Loại bài viết là sản phẩm
                'posts_per_page' => 9,    // Số sản phẩm hiển thị mỗi trang
                'meta_query' => array(
                    array(
                        'key' => '_sale_price',   // Kiểm tra giá bán giảm
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'NUMERIC'
                    )
                )
            );

            $sale_products = new WP_Query($args);

            if ($sale_products->have_posts()) :
                while ($sale_products->have_posts()) : $sale_products->the_post(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <?php get_template_part('content/product_item'); ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="col-12">
                    <h3 class="text-center">Không có sản phẩm nào đang giảm giá</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>