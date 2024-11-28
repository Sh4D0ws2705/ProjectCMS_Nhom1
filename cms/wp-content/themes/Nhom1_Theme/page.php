<?php get_header(); ?>
<?php get_template_part('content/top-header'); ?>
<section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 col-lg-9 mb-4">
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

            <!-- Sidebar -->
            <div class="col-md-10 col-lg-3 mb-4">
                <div class="row mt-5">
                    <?php get_template_part(slug: 'sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>