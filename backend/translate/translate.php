<?php

Class Theme_Translate {

    public static $supported_locales = [
        'en' => true,
        'ru' => true
    ];

    public static function default_locale() {

        $raw_browser_locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        if ( is_user_logged_in() ) {
            $user = wp_get_current_user();
            $user_locale = get_user_meta( $user->ID, 'locale', true );
            if ( empty($user_locale) ) {
                update_user_meta($user->ID, 'locale', $raw_browser_locale);
            }
        } else {
            if ( !($_COOKIE['locale'] ) ) {
                setcookie ('locale', $raw_browser_locale, time()+60*60*24*30, '/');
            }
        }

    }

    public static function get_user_locale() {
        $locale = 'en';
        if ( is_user_logged_in() ) {
            $user = wp_get_current_user();
            $locale = get_user_meta( $user->ID, 'locale', true );
        } else {
            $locale = $_COOKIE['locale'];
        }
        return $locale;
    }

    public static function set_translate() {
        $user_locale = self::get_user_locale();
        if (empty($user_locale) ) { $user_locale = 'en'; }
        $translate_folder = get_theme_file_path() . '/backend/translate/';
        $translate = json_decode( file_get_contents( $translate_folder . $user_locale . '.json'), true );
        define('wp_translate', $translate );
    }

    public static function set_user_locale() {

        $data = $_POST;
        $answer = [
            'result' => 'success',
            'message' => 'User locale changed',
            'data' => $data
        ];

        if( !$data['locale'] ) {
            $answer['result'] = 'error';
            $answer['message'] = 'No locale received';
        } else {
            if ( !Theme_Translate::$supported_locales[$data['locale']] ) {
                $answer['result'] = 'error';
                $answer['message'] = 'This language is not supported';
            } else {
                if ( is_user_logged_in() ) {
                    $user = wp_get_current_user();
                    update_user_meta($user->ID, 'locale', $data['locale'] );
                } else {
                    $cookie_updated = setcookie ('locale', $data['locale'], time()+60*60*24*30, '/');
                    $answer['cookie_updated'] = $cookie_updated;
                    if ( !$cookie_updated) {
                        $answer['result'] = 'error';
                        $answer['message'] = 'Failed to update cookie';
                    }
                }
            }
        }
        echo json_encode($answer);
        wp_die();

    }

}

add_action( 'wp_ajax_translate', ['Theme_Translate', 'set_user_locale'] );
add_action( 'wp_ajax_nopriv_translate', ['Theme_Translate', 'set_user_locale'] );