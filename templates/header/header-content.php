<?php ?>

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
            <button class="button">Войти</button>
            <button class="button action_button HeaderSignUp" onclick="show_modal()">Регистрация</button>
        </div>
    </div>

</header>
