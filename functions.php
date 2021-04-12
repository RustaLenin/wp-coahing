<?php

add_theme_support( 'post-thumbnails', ['post'] );
add_theme_support( 'menus' );
add_theme_support( 'html5' );
add_theme_support( 'html5' );

include 'functions/navigation.php';
include 'backend/user/registration.php';
include 'backend/posts/similar.php';
include 'backend/posts/comments.php';
include 'backend/translate/translate.php';
Theme_Translate::default_locale();
Theme_Translate::set_translate();

function _t( $key ) {
    if ( wp_translate[$key] ) {
        return wp_translate[$key];
    } else {
        return $key;
    }
}