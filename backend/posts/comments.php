<?php

Class Post_Comments {

    public static function add_comment( $data ) {

        $answer = [
            'result' => 'success',
            'message' => 'Comment added',
            'dump' => [
                'received_data' => $data
            ]
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

                } else {

                    $comment = get_comment($result);
                    $answer['dump']['comment'] = $comment;
                    ob_start();
                    include get_template_directory() . '/templates/comments/comment.php';
                    $html = ob_get_clean();
                    $answer['html'] = $html;

                }
            }
        }
        $answer['source'][] = __METHOD__;
        return $answer;
    }

    public static function  delete_comment( $data ) {

        $answer = [
            'result' => 'success',
            'message' => 'Comment deleted',
            'received_data' => $data,
        ];

        if ( !$data['comment_id'] ) {
            $answer['result'] = 'error';
            $answer['message'] = 'No comment ID received';
        } else {
            $comment = get_comment( $data['comment_id'] );
            if ( !$comment ) {
                $answer['result'] = 'error';
                $answer['message'] = 'No such comment exist';
            } else {
                $answer['dump'] = $comment;
                if ( !get_current_user_id() == $comment->user_id || !is_site_admin() ) {
                    $answer['result'] = 'error';
                    $answer['message'] = 'You have no permission for this action';
                } else {
                    $result = wp_delete_comment( $comment->comment_ID, true );
                    if ( !$result ) {
                        $answer['result'] = 'error';
                        $answer['message'] = 'Something went wrong';
                    }
                }
            }
        }
        $answer['source'][] = __METHOD__;
        return $answer;
    }

    public static function ajax_handler() {

        $answer = [
            'result' => 'error',
        ];

        if (!$_POST) {
            $answer['message'] = 'No request received';
        } else {
            if (!$_POST['command']) {
                $answer['message'] = 'No command received';
            } else {
                if (!$_POST['payload']) {
                    $answer['message'] = 'No payload received';
                } else {

                    if ( method_exists(__CLASS__, $_POST['command'] ) ) {
                        $command = $_POST['command'];
                        $answer = self::$command($_POST['payload']);
                    } else {
                        $answer['message'] = 'Unknown command ¯\_(ツ)_/¯';
                    }

                }
            }
        }

        $answer['source'][] = __METHOD__;
        echo json_encode($answer);
        wp_die();
    }

}

add_action( 'wp_ajax_comment', ['Post_Comments', 'ajax_handler'] );