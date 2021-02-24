<?php

function similar( $post ) {
    if ( !$post ) {
        echo 'Похожих материалов не найдено';
    } else {
        $this_post_id = $post->ID;
        $post_tags = get_the_tags( $post->id );
        if ( $post_tags ) {
            $post_tags_array = [];
            foreach ( $post_tags as $tags ) {
                array_push($post_tags_array, $tags->term_id );
            }
            $query = new WP_Query([
                'posts_per_page' => 6,
                'tag__in' => $post_tags_array,
                'post__not_in' => [$this_post_id],
            ]);

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    include get_template_directory() . '/templates/posts/post.php';
                }
                wp_reset_postdata();
            }
        }
    }
}