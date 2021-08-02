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

            <svg
                class="svg_icon"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 23.197 23.197"
                style="enable-background:new 0 0 23.197 23.197;"
                onclick="comment.edit(this)"
            >
                <g>
                    <path d="M17.604,13.732L7.471,3.6l0.724-0.723l10.131,10.132L17.604,13.732z M4.714,6.361L14.842,16.49
l1.832-1.832L6.545,4.529L4.714,6.361z M3.788,7.286l-0.91,0.909l10.127,10.132l0.909-0.909L3.788,7.286z M19.024,13.706
l-5.318,5.32l5.174,2.26l2.407-2.405L19.024,13.706z M23.164,22.646l-1.207-2.761c-0.054-0.119-0.16-0.205-0.288-0.229
c-0.129-0.023-0.258,0.018-0.352,0.108l-1.555,1.556c-0.092,0.092-0.133,0.223-0.107,0.352c0.023,0.127,0.109,0.234,0.229,0.287
l2.762,1.205c0.147,0.065,0.32,0.033,0.437-0.08C23.194,22.967,23.229,22.794,23.164,22.646z M7.332,2.013L5.433,0.116
c-0.154-0.154-0.403-0.154-0.556,0L0.115,4.877c-0.154,0.154-0.154,0.403,0,0.557L2.012,7.33c0.154,0.154,0.403,0.154,0.557,0
l4.762-4.761C7.484,2.415,7.484,2.166,7.332,2.013z"/>
                </g>
            </svg>


            <?php } ?>


        </div>
    </div>
    <div class="comment_content">
        <?php echo $comment->comment_content; ?>
    </div>

</div>
