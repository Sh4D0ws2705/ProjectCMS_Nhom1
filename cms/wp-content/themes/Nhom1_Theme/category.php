<?php get_header() ?>

<?php get_template_part('content/top-header'); ?>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-9">
                        <div class="row g-4">
                            <!-- lấy bài post -->
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <!-- Các thành phần của bài viết -->
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative post-wrap">
                                            <div class="fruite-img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="img-fluid rounded-top" alt="<?php the_title(); ?>">
                                                </a>
                                            </div>
                                            <div class="p-2 border border-secondary border-top-0 rounded-bottom content-wrap">
                                                <a href="<?php the_permalink(); ?>">
                                                    <h4 class="post_title"><?php the_title(); ?></h4>
                                                </a>
                                                <div class="post_excerpt my-3">
                                                    <?php the_excerpt(); // Lấy mô tả ngắn của bài post 
                                                    ?>
                                                </div>
                                                <div class="d-flex justify-content-start flex-lg-wrap">
                                                    <a href="<?php the_permalink(); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i>Đọc tiếp</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; else: ?>
                                    <h3>Tin tức chưa có bài viết nào</h3>
                            <?php endif; ?>
                            <?php if (paginate_links() != '') { ?>
                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <?php
                                        global $wp_query;
                                        $big = 999999999;
                                        echo paginate_links(array(
                                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                            'format' => '?paged=%#%',
                                            'prev_text'    => __('&laquo;'),
                                            'next_text'    => __('&raquo;'),
                                            'current' => max(1, get_query_var('paged')),
                                            'total' => $wp_query->max_num_pages
                                        ));
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <?php get_template_part(slug: 'sidebar'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>