<?php

if ( post_password_required() ) {
    return;
} ?>

<div class="comments">

    <div class="comments_head">
        <div class="comments_head__title">
            <h2>Комментарии</h2>
            <span class="comments_count">Всего 1239</span>
        </div>

        <span class="button in_content comments_form_link">
            <a href="#comments_form_cont">Оставить комментарий</a>
        </span>
    </div>
    <div class="comments_list">

        <div class="comment_container">

            <div class="comment_meta">
                <div class="comment_rating">
                    <span class="rating_count">1234</span>
                    <span class="rating_buttons"> ⯅ ⯆ </span>
                </div>
                <div class="comment_user">
                    <img class="avatar small" src="http://wp-coaching/wp-content/uploads/2021/01/success.jpg" width="24px" height="24px">
                    <span><a href="">Юзернейм</a></span>
                </div>
                <div class="comment_date"><?php  echo the_date();?></div>
                <div class="comment_controls">кнопки</div>
            </div>
            <div class="comment_content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam aperiam consectetur corporis cum cumque deleniti dolor doloribus esse et eum explicabo hic id impedit, itaque laudantium magni modi nostrum, numquam odio officia pariatur possimus praesentium quidem, quis recusandae reiciendis repellat rerum saepe similique tempore tenetur ullam unde velit voluptatibus?
            </div>

        </div>

    </div>
    <div id="comments_form_cont" class="comments_form_container">

        <?php if ( is_user_logged_in() ) { ?>

            <div class="form">

                <label class="input_container">
                    <span class="input_title">Комментарий</span>
                    <textarea class="full_width" type="text" rows="5" cols="60" name="comment_content" placeholder="Очень интересная запись, но..." ></textarea>
                </label>

                <span class="button action_button"> Отправить комментарий</span>

            </div>

        <?php } else { ?>

            <div class="info_block"></div>

        <?php } ?>

    </div>

</div>
