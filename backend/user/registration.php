<?php

function coaching_registration() {

    $data = $_POST;
    $answer = [
        'result' => 'success',
        'message' => 'User successfully registered',
        'data' => $data
    ];

    if( !$data['email'] ) {
        $answer['result'] = 'error';
        $answer['message'] = 'No user email received';
    } else {
        $user_id = register_new_user( $data['email'], $data['email'] );
        if ( is_wp_error($user_id) ) {
            $answer['result'] = 'error';
            $answer['message'] = $user_id->get_error_message();
        } else {

            if ( $data['phone'] ) { update_user_meta( $user_id, 'phone', $data['phone'] ); }

            $update_result = wp_update_user([
                'ID' => $user_id,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name']
            ]);

            if ( is_wp_error( $update_result ) ) {
                $answer['result'] = 'warning';
                $answer['message'] = 'User data was not update';
            }
        }
    }

    echo json_encode($answer);
    wp_die();
}

add_action( 'wp_ajax_nopriv_registration', 'coaching_registration' );