<?php
get_header(); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/post-single.css">

<?php

while ( have_posts() ) {
    the_post();
    include 'templates/posts/post-single.php';
}

include 'templates/modal/modal.php';
get_footer();
