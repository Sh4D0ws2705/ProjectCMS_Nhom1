<!-- k hiển thị breadcrumb ở trang chủ -->
<?php if (!is_home()) { ?>
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">
            <?php
            if (is_category()) {
                single_cat_title();
            } else {
                the_title();
            }
            ?>
        </h1>

        <ol class="breadcrumb justify-content-center mb-0">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<li class="breadcrumb-item">', '</li>');
            }
            ?>
        </ol>
    </div>
<?php } ?>