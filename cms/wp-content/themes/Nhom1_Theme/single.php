<?php get_header() ?>
<?php get_template_part('content/top-header'); ?>
<!-- Content -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-10 col-lg-9 mb-4 posts">
                <div class="p-md-4">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <!-- set lượt xem post -->
                            <?php setpostview(get_the_ID()); ?>
                            <!-- Blog Detail -->
                            <div class="pb-5">
                                <div class="d-flex flex-wrap pb-4">
                                    <span class="me-3 small text-muted">
                                        <a href="#" class="text-muted">by <strong><?php the_author(); ?></a></strong> - <?php the_date(); ?>
                                    </span>
                                    <!-- lấy ra số lượt xem -->
                                    <span class="me-3 small text-muted"><?php echo getpostviews(get_the_ID()); ?> Views</span>
                                    <a href="#" class="me-3 small text-muted">0 Comment</a>
                                    <span class="me-3 small text-muted"><?php the_category(', '); ?></span>
                                </div>

                                <div class="mb-3">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="IMG" class="img-fluid w-100">
                                </div>

                                <p class="text-muted mb-3">
                                    <?php the_content(); ?>
                                </p>

                                <!-- Tags -->
                                <?php if (has_tag()) : ?>
                                    <!-- Tags -->
                                    <div class="d-flex align-items-center mb-3" disabled>
                                        <span class="small text-muted me-2">Tags:</span>
                                        <div>
                                            <?php the_tags('', ' - ', ''); ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <!-- No Tags -->
                                    <div class="d-flex align-items-center mb-3" disabled>
                                        <span class="small text-muted me-2">Tags:</span>
                                        <span class="small text-muted">Không có tag</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <!-- Leave a comment -->
                    <div>
                        <h4 class="h5 text-dark mb-3">
                            Leave a Comment
                        </h4>

                        <p class="small text-muted mb-4">
                            Your email address will not be published. Required fields are marked *
                        </p>

                        <form>
                            <textarea class="form-control mb-3" name="msg" rows="4" placeholder="Comment..."></textarea>
                            <input class="form-control mb-3" type="text" name="name" placeholder="Name*">
                            <input class="form-control mb-3" type="text" name="email" placeholder="Email*">
                            <input class="form-control mb-3" type="text" name="website" placeholder="Website">
                            <button class="btn btn-primary mt-3 text-light" type="submit">
                                Post Comment
                            </button>
                        </form>
                    </div>
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

    <!-- hiển thị bài viết liên quan theo danh mục -->
    <div class="container related-post">
        <div class="row justify-content-center mt-5">
            <?php
            $categories = get_the_category(get_the_ID());
            if ($categories) {
                $category_ids = array();
                foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                $args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array(get_the_ID()),
                    'showposts' => 4
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    echo '<h3>Bài viết liên quan</h3>';
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
            ?>
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
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>



<?php get_footer() ?>