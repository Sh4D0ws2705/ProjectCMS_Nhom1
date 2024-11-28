<?php get_header(); ?>

<div class="container-fluid py-5 mt-5">
	<div class="container py-5">
		<div class="row g-4 mb-5 mt-5">
			<?php if (!is_product()) : ?>
				<div class="col-lg-3 col-xl-3">
					<div class="row">
						<?php get_template_part('sidebar'); ?>
					</div>
				</div>
				<div class="col-lg-9 col-xl-9">
			<?php else : ?>
				<div class="col-12">
			<?php endif; ?>
				<?php woocommerce_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
