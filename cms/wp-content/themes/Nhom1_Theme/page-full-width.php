<?php get_header(); ?>
<!-- khai báo tên template -->
<?php 
    // Template name: Page full width
?>

<?php get_template_part('content/top-header'); ?>
<section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 col-lg-12 mb-4">
                <div class="p-md-4">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="pb-5">
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>