<?php get_header() ?>

<h1>Trang INDEX</h1>
<?php 
    while(have_posts()){
        the_post();
        ?>
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <p><?php the_content() ?></p>
        <?php
    }
?>

<?php get_footer() ?>