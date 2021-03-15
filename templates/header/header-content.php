<?php
$user_locale = Theme_Translate::get_user_locale();

?>

<header class="site_header aaaa">

    <div class="wrapper">
        <div class="header_left">
            <div class="logo_container">
                <a href="<?php echo site_url(); ?>">WP Coaching</a>
            </div>

            <?php wp_nav_menu( [
                'theme_location' => 'header_menu',
                'container' => 'nav',
                'container_class' => 'header_navigation',
                'items_wrap' => '<ul class="header_menu_container">%3$s</ul>'
            ]); ?>

        </div>

        <div class="header_controls">
            <button class="button <?php if ( $user_locale === 'en') { echo 'action_button'; } ?>"
                    onclick="setLocale('en')">EN</button>
            <button class="button <?php if ( $user_locale === 'ru') { echo 'action_button'; } ?>"
                    onclick="setLocale('ru')">RU</button>
            <button class="button"><?php echo _t('Sign In'); ?></button>
            <button class="button action_button HeaderSignUp" onclick="show_modal()"><?php echo _t('Sign Up'); ?></button>
        </div>
    </div>

</header>
