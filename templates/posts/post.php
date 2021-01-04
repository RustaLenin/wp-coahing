<?php ?>

<div class="post_container">

    <div class="post_thumbnail">
        <a href="<?php echo get_post_permalink($post->id); ?>">
            <?php echo get_the_post_thumbnail( $post->id, 'thumbnail' ); ?>
        </a>
    </div>

    <div class="post_header">
        <a href="<?php echo get_post_permalink($post->id); ?>">
            <h2 class="post_title"><?php echo $post->post_title; ?></h2>
        </a>
        <div class="post_date"><?php echo get_the_date( 'Y.m.d', $post->id ) ?></div>
    </div>

    <div class="post_body">
        <div class="post_content"><?php echo wp_trim_words( strip_tags($post->post_content), 40 ); ?></div>
    </div>

    <div class="post_footer">
        <div class="post_tags">
            <?php $post_tags = get_the_tags( $post->id );
            if ( $post_tags ) {
                foreach ($post_tags as $tag ) {
                    ?>
                    <a class="post_tag_url" href="<?php echo get_term_link($tag->term_id, 'post_tag'); ?>">
                        <span class='post_tag'><?php echo $tag->name; ?></span>
                    </a>
                <?php
                }
            }
            ?>
        </div>
    </div>

</div>