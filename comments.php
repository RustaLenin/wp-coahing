<?php

if ( post_password_required() ) {
    return;
}
$comments = get_comments( ['post_id' => $post->ID ] );
$comments_count = count($comments);
?>

<div class="comments">

    <div class="comments_head">
        <div class="comments_head__title">
            <h2>Комментарии</h2>
            <span class="comments_count">Всего <?php echo $comments_count; ?></span>
        </div>

        <?php if ( $comments_count > 5 ) { ?>

        <span class="button in_content comments_form_link">
            <a href="#comments_form_cont">Оставить комментарий</a>
        </span>

        <?php } ?>

    </div>

    <?php if ( $comments_count !== 0 ) { ?>

        <div class="comments_list">

            <?php foreach ($comments as $comment ) {

                include 'templates/comments/comment.php';

            } ?>

        </div>


    <?php } ?>

    <div id="comments_form_cont" class="comments_form_container">

        <?php if ( is_user_logged_in() ) { ?>

            <?php if ( $comments_count === 0 ) { ?>
                <div class="info_block"><em>Будьте первым кто оставит комментарий к этой записи</em></div>
            <?php } ?>

            <div class="form">

                <input name="post_id" value="<?php echo $post->ID; ?>" style="display: none;">

                <label class="input_container">
                    <span class="input_title">Комментарий</span>
                    <textarea class="full_width" type="text" rows="5" cols="60" name="comment_content" placeholder="Очень интересная запись, но..." ></textarea>
                </label>

                <span class="button action_button" onclick="sendComment(this);"> Отправить комментарий</span>

            </div>

        <?php } else { ?>

            <div class="info_block"></div>

        <?php } ?>

    </div>

</div>
