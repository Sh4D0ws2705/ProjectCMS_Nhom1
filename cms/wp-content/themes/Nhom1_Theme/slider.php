<!-- begin slider -->
<div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <?php
        $args = array(
            'posts_per_page' => 5,
            'post_type' => 'slider'
        );
        $the_query = new WP_query($args);
        $i = 1;
        ?>
        <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()):
                $the_query->the_post(); ?>
                <?php if ($i == 1) { ?>
                    <div class="carousel-item active rounded">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid w-100 h-100 bg-secondary rounded')); ?>
                    </div>
                <?php } else { ?>
                    <div class="carousel-item rounded">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid w-100 h-100 bg-secondary rounded')); ?>
                    </div>
                <?php } ?>
                <?php $i++; ?>
            <?php endwhile ?>
        <?php endif ?>
        <?php wp_reset_query(); ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- End slider -->