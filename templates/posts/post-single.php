<?php global $post;
$author = get_user_by('ID', $post->post_author);
$thumbnail_id =  get_post_thumbnail_id($post->ID);
?>

<div class="content_area">

    <article class="single_post">

        <div class="single_post__header">

            <div class="single_post__image">
                <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="<?php echo wp_get_attachment_caption($thumbnail_id); ?>">
            </div>

            <div class="single_post__meta">

                <div class="single_post__navigation"></div>

                <h1 class="single_post__title">
                    <?php echo $post->post_title; ?>
                </h1>

                <div class="single_post__date">
                    <?php echo get_the_date( 'Y.m.d', $post->id ) ?>
                </div>

                <div class="single_post__author">
                    Автор:
                    <a href="<?php echo get_author_posts_url($author->ID); ?>">
                        <?php echo $author->first_name . ' ' . $author->last_name; ?>
                    </a>
                </div>

            </div>

        </div>

        <div class="single_post__body">
            <?php echo wpautop( $post->post_content ); ?>
        </div>

        <div class="single_post__footer">

            <div class="share_container">
                Поделиться в соц сетях: <div class="ya-share2" data-curtain data-color-scheme="blackwhite" data-limit="3" data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
            </div>

        </div>

    </article>

    <div class="similar_posts">
        <?php similar($post); ?>
    </div>

</div>
