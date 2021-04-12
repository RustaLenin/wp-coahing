<?php

Class Post_Comments {

    public static function add_comment() {

        $data = $_POST;

        $answer = [
            'result' => 'success',
            'message' => 'Comment added',
            'received_data' => $data
        ];

        if ( !$data['post_id'] ) {
            $answer['result'] = 'error';
            $answer['message'] = 'No post ID received';
        } else {
            if ( !$data['comment_content'] ) {
                $answer['result'] = 'error';
                $answer['message'] = 'No commented content received';
            } else {

                $commentdata = [
                    'comment_post_ID' => $data['post_id'],
                    'comment_content' => $data['comment_content'],
                    'user_ID'         => get_current_user_id(),
                ];

                $result = wp_new_comment( $commentdata );
                if ( !$result ) {
                    $answer['result'] = 'error';
                    $answer['message'] = 'Failed to add comment';
                    $answer['dump'] = $result;

                }
            }
        }

        echo json_encode($answer);
        wp_die();

    }


}

add_action( 'wp_ajax_add_comment', ['Post_Comments', 'add_comment'] );