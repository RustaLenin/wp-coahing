<?php

$avatar = get_user_meta($comment->post_author, 'user_avatar', true);

?>

<div class="comment_container">

    <div class="comment_meta">
        <div class="comment_rating">
            <span class="rating_count"><?php echo $comment->comment_karma; ?></span>
            <span class="rating_buttons"> ⯅ ⯆ </span>
        </div>
        <div class="comment_user">
            <img class="avatar small" alt="user_pick" src="<?php echo $avatar['guid']; ?>" width="24px" height="24px">
            <span>
                <a href="<?php echo get_author_posts_url($comment->post_author); ?>">
                    <?php echo $comment->comment_author;?>
                </a>
            </span>
        </div>
        <div class="comment_date"><?php echo $comment->comment_date;?></div>
        <div class="comment_controls">кнопки</div>
    </div>
    <div class="comment_content">
        <?php echo $comment->comment_content; ?>
    </div>

</div>
