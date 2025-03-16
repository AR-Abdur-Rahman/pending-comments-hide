<?php

function hide_pending_comments($comments) {
    if (!current_user_can('manage_options')) { // শুধুমাত্র এডমিন দেখতে পারবে
        foreach ($comments as $key => $comment) {
            if ($comment->comment_approved == '0') {
                unset($comments[$key]);
            }
        }
    }
    return $comments;
}
add_filter('comments_array', 'hide_pending_comments');


?>