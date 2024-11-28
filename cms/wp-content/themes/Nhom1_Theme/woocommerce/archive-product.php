<?php



defined('ABSPATH') || exit;

get_header('shop'); ?>
<!-- bắt đầu custom giao diện -->
<div class="container-fluid fruite pb-5">
	<div class="container py-5 product-cate">
		<div class="row">
			<div class="col-lg-12">
				<div class="row g-4">
					<!-- sidebar -->
					<div class="col-lg-3">
						<?php
						/**
						 * Hook: woocommerce_sidebar.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action('woocommerce_sidebar');
						?>
					</div>
					<!-- sản phẩm -->
					<div class="col-lg-9">

							<?php
							/**
							 * Hook: woocommerce_before_main_content.
							 *
							 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
							 * @hooked woocommerce_breadcrumb - 20
							 * @hooked WC_Structured_Data::generate_website_data() - 30
							 */
							do_action('woocommerce_before_main_content');




							/**
							 * Hook: woocommerce_shop_loop_header.
							 *
							 * @since 8.6.0
							 *
							 * @hooked woocommerce_product_taxonomy_archive_header - 10
							 */
							do_action('woocommerce_shop_loop_header');

							if (woocommerce_product_loop()) {

								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action('woocommerce_before_shop_loop');

								woocommerce_product_loop_start();?>

								<?php if (wc_get_loop_prop('total')) {
									while (have_posts()) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action('woocommerce_shop_loop');

										wc_get_template_part('content', 'product');
									}
								}

								woocommerce_product_loop_end();

								/**
								 * Hook: woocommerce_after_shop_loop.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action('woocommerce_after_shop_loop');
							} else {
								/**
								 * Hook: woocommerce_no_products_found.
								 *
								 * @hooked wc_no_products_found - 10
								 */
								do_action('woocommerce_no_products_found');
							}

							/**
							 * Hook: woocommerce_after_main_content.
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							do_action('woocommerce_after_main_content');
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Kết thúc custom giao diện -->
<?php get_footer('shop'); ?>