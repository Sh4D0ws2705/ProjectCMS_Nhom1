<?php
global $product;
?>
<!-- modal thông báo  -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="woocommerce-notices-wrapper"></div>
            </div>
        </div>
    </div>
</div>
<!-- end modal thông báo -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="border rounded">
            <a href="#">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid')); ?>
            </a>
        </div>
    </div>
    <div class="col-lg-6">
        <h4 class="fw-bold mb-3"><?php the_title(); ?></h4>
        <p class="mb-3">Category: <?php echo wc_get_product_category_list(get_the_ID()); ?></p>
        <h5 class="fw-bold mb-3"><?php woocommerce_template_single_price(); ?></h5>
        <p class="mb-3">Tình trạng: <spans><?php echo wc_get_stock_html($product); ?></spans>
        </p>
        <p class="mb-4"><?php the_excerpt(); ?></p>
        <div class="input-group quantity mb-5" style="width: 100px;">
            <?php
            woocommerce_quantity_input(array(
                'input_value' => 1, // Giá trị mặc định
                'classes' => array('form-control', 'form-control-sm', 'text-center', 'border-0'),
            ));
            ?>
        </div>

        <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary add-to-cart-ajax" data-product-id="<?php the_ID(); ?>"><i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ hàng</a>
        <a href="?add-to-cart=<?php the_ID(); ?>&redirect_to_cart=true" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Mua Ngay</a>
    </div>
    <div class="col-lg-12">
        <nav>
            <div class="nav nav-tabs mb-3">
                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                    aria-controls="nav-about" aria-selected="true">Description</button>
                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
            </div>
        </nav>
        <div class="tab-content mb-5">
            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                <?php echo $product->get_description(); ?>
            </div>
            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                <?php comments_template(); ?>
            </div>
        </div>
    </div>
</div>