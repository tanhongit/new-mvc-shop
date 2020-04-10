<?php
$title = 'Quản trị hệ thống - Quán Chị Kòi';
$user = $_SESSION['user'];
global $user_nav;
//table orders
$options_order_complete = array(
    'where' => 'status = 1',
    'order_by' => 'createtime DESC'
);
$order_completes = get_all('orders', $options_order_complete);

$options_order = array(
    'order_by' => 'id DESC'
);
$total_order = get_total('orders', $options_order);

$options_comlete = array(
    'where' => 'status = 1',
    'order_by' => 'id DESC'
);
$total_order_prosess = get_total('orders', $options_comlete);

$options_order_new = array(
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC'
);
$order_new = select_a_record('orders', $options_order_new);

$options_inprocess = array(
    'where' => 'status = 2',
    'order_by' => 'id DESC'
);
$total_order_inprosess = get_total('orders', $options_inprocess);

$options_cancell = array(
    'where' => 'status = 3',
    'order_by' => 'id DESC'
);
$total_order_cancell = get_total('orders', $options_cancell);

$options_noprocess = array(
    'where' => 'status = 0',
    'order_by' => 'id DESC'
);
$total_order_noprosess = get_total('orders', $options_noprocess);

$options_order_status = array(
    'where' => 'status=1 or status=3',
    'order_by' => 'id DESC'
);
$total_order_status = get_total('orders', $options_order_status);
if ($total_order_status != 0) $order_ratio = ($total_order_status / $total_order) * 100;
else $order_ratio = 0;

//feedbacks
$options_feedback = array(
    'order_by' => 'createTime DESC'
);
$total_feedback = get_total('feedbacks', $options_feedback);

$options_feedback_order = array(
    'order_by' => 'createTime DESC',
    'where' => 'order_id<>0'
);
$total_feedback_order = get_total('feedbacks', $options_feedback_order);

$options_feedback_five = array(
    'limit' => 5,
    'offset' => 0,
    'order_by' => 'id DESC'
);
$feedback_five = get_all('feedbacks', $options_feedback_five);

$options_feedback_noaccept = array(
    'order_by' => 'id DESC',
    'where' => 'status=0'
);
$total_feedback_noaccept = get_total('feedbacks', $options_feedback_noaccept);

$options_feedback_mine = array(
    'order_by' => 'id DESC',
    'where' => 'user_id=' . $user_nav
);
$total_feedback_mine = get_total('feedbacks', $options_feedback_mine);

$options_feedback_new = array(
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC'
);
$feedback_new = select_a_record('feedbacks', $options_feedback_new);

$options_feedback_product = array(
    'order_by' => 'createTime DESC',
    'where' => 'product_id<>0'
);
$total_feedback_product = get_total('feedbacks', $options_feedback_product);

$options_feedback_noaccept = array(
    'order_by' => 'createTime DESC',
    'where' => 'status=0'
);
$total_feedback_noaccept = get_total('feedbacks', $options_feedback_noaccept);

$options_feedback_status = array(
    'order_by' => 'createTime DESC',
    'where' => 'status=1'
);
$total_feedback_status = get_total('feedbacks', $options_feedback_status);
if ($total_feedback_status != 0) $feedback_ratio = $total_feedback_status / $total_feedback * 100;
else $feedback_ratio = 0;

//comments
$options_comments = array(
    'order_by' => 'id DESC'
);
$total_rows_comment = get_total('comments', $options_comments);

$options_comments_mine = array(
    'order_by' => 'id DESC',
    'where' => 'user_id=' . $user_nav
);
$total_mine_comment = get_total('comments', $options_comments_mine);

$options_comment_five = array(
    'limit' => 5,
    'offset' => 0,
    'where' => 'status<>3 and status<>2',
    'order_by' => 'id DESC'
);
$comment_five = get_all('comments', $options_comment_five);

$options_comment_new = array(
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC'
);
$comment_new = select_a_record('comments', $options_comment_new);

$options_comment_noaccept = array(
    'order_by' => 'id DESC',
    'where' => 'status=0'
);
$total_comment_noaccept = get_total('comments', $options_comment_noaccept);

$options_comment_trash = array(
    'order_by' => 'id DESC',
    'where' => 'status=2'
);
$total_comment_trash = get_total('comments', $options_comment_trash);

$options_comment_spam = array(
    'order_by' => 'id DESC',
    'where' => 'status=3'
);
$total_comment_spam = get_total('comments', $options_comment_spam);

$options_comment_accept = array(
    'order_by' => 'id DESC',
    'where' => 'status=1'
);
$total_comment_accept = get_total('comments', $options_comment_accept);
if ($total_comment_accept != 0) $comment_ratio = $total_comment_accept / $total_rows_comment * 100;
else $comment_ratio = 0;

//posts
$options_page_new = array(
    'limit' => 1,
    'offset' => 0,
    'where' => 'post_type=2',
    'order_by' => 'id DESC'
);
$page_new = select_a_record('posts', $options_page_new);

$options_post = array(
    'order_by' => 'id DESC',
    'where' => 'post_type=1',
);
$total_post = get_total('posts', $options_post);

$options_page = array(
    'order_by' => 'id DESC',
    'where' => 'post_type=2',
);
$total_page = get_total('posts', $options_page);

$options_posts = array(
    'order_by' => 'id DESC'
);
$total_posts = get_total('posts', $options_posts);

$options_posts_status = array(
    'order_by' => 'id DESC',
    'where' => 'post_status="Publiced"',
);
$total_posts_status = get_total('posts', $options_posts_status);

$options_page_draft = array(
    'order_by' => 'id DESC',
    'where' => 'post_type=2 and post_status="Draft"'
);
$total_page_draft = get_total('posts', $options_page_draft);

$options_post_new = array(
    'limit' => 1,
    'offset' => 0,
    'where' => 'post_type=1',
    'order_by' => 'id DESC'
);
$post_new = select_a_record('posts', $options_post_new);

$options_post_draft = array(
    'order_by' => 'id DESC',
    'where' => 'post_type=1 and post_status="Draft"'
);
$total_post_draft = get_total('posts', $options_post_draft);
if ($total_posts_status != 0) $posts_ratio = ($total_posts_status / $total_posts) * 100;
else $posts_ratio = 0;


$options_user_online = array(
    'order_by' => 'session'
);
$total_rows_online = get_total('users_online', $options_user_online);


$options_total_access = array(
    'order_by' => 'id'
);
$total_rows_access = get_total('visiters', $options_total_access);

$options_product_total = array(
    'order_by' => 'id'
);
$total_product = get_total('products', $options_product_total);
require('admin/views/home/index.php');
