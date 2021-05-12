<?php

$avatar = get_user_meta($comment->post_author, 'user_avatar', true);

?>

<div class="comment_container" data-comment_id="<?php echo $comment->comment_ID; ?>">

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
        <div class="comment_controls">
            <?php
            if ( get_current_user_id() == $comment->user_id ) { ?>
            <svg
                    class="svg_icon"
                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    viewBox="0 0 512 512"
                    style="cursor: pointer; margin-bottom: -3px; enable-background:new 0 0 512 512;"
                    xml:space="preserve"
                    onclick="comment.erase(this, <?php echo $comment->comment_ID; ?>)"
            >
                <path d="M432,96h-48V32c0-17.672-14.328-32-32-32H160c-17.672,0-32,14.328-32,32v64H80c-17.672,0-32,14.328-32,32v32h416v-32
                    C464,110.328,449.672,96,432,96z M192,96V64h128v32H192z"/>
                <path d="M80,480.004C80,497.676,94.324,512,111.996,512h288.012C417.676,512,432,497.676,432,480.008v-0.004V192H80V480.004z
                     M320,272c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M240,272
                    c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M160,272c0-8.836,7.164-16,16-16
                    s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z"/>
            </svg>
            <?php } ?>


        </div>
    </div>
    <div class="comment_content">
        <?php echo $comment->comment_content; ?>
    </div>

</div>
