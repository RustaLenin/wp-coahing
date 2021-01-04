<?php
get_header(); ?>

<div class="posts_mosaic">

<?php

if ( have_posts() ) {

    // Load posts loop.
    while ( have_posts() ) {
        the_post();
        include 'templates/posts/post.php';
    }

}

?>

</div>

<?php

include 'templates/modal/modal.php';
get_footer();