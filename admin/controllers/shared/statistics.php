<?php
/**
 * @var $userNav
 */

$options_order_complete = [
    'where' => 'status = 1',
    'order_by' => 'createtime DESC',
];
$orderCompletes = getAll('orders', $options_order_complete);

$options_order = [
    'order_by' => 'id DESC',
];
$total_order = getTotal('orders', $options_order);

$options_order_mine = [
    'order_by' => 'id DESC',
    'where' => 'user_id=' . $userNav,
];
$total_order_mine = getTotal('orders', $options_order_mine);

$options_comlete = [
    'where' => 'status = 1',
    'order_by' => 'id DESC',
];
$total_order_prosess = getTotal('orders', $options_comlete);

$options_order_new = [
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC',
];
$order_new = getByOptions('orders', $options_order_new);

$options_inprocess = [
    'where' => 'status = 2',
    'order_by' => 'id DESC',
];
$total_order_inprosess = getTotal('orders', $options_inprocess);

$options_mine_inprocess = [
    'where' => 'status = 2 and user_id=' . $userNav,
    'order_by' => 'id DESC',
];
$total_mine_order_inprosess = getTotal('orders', $options_mine_inprocess);

$options_mine_complete = [
    'where' => 'status = 1 and user_id=' . $userNav,
    'order_by' => 'id DESC',
];
$total_mine_order_complete = getTotal('orders', $options_mine_complete);

$options_cancell_total = [
    'where' => 'status = 3',
    'order_by' => 'id DESC',
];
$total_order_cancell = getTotal('orders', $options_cancell_total);

$options_noprocess = [
    'where' => 'status = 0',
    'order_by' => 'id DESC',
];
$total_order_noprosess = getTotal('orders', $options_noprocess);

$options_cancell = [
    'where' => 'status = 3',
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC',
];
$order_cancell = getByOptions('orders', $options_cancell);

$options_order_status = [
    'where' => 'status=1 or status=3',
    'order_by' => 'id DESC',
];
$total_order_status = getTotal('orders', $options_order_status);
if ($total_order_status != 0) {
    $order_ratio = ($total_order_status / $total_order) * 100;
} else {
    $order_ratio = 0;
}

//feedbacks
$options_feedback = [
    'order_by' => 'createTime DESC',
];
$total_feedback = getTotal('feedbacks', $options_feedback);

$options_feedback_order = [
    'order_by' => 'createTime DESC',
    'where' => 'order_id<>0',
];
$total_feedback_order = getTotal('feedbacks', $options_feedback_order);

$options_feedback_five = [
    'limit' => 5,
    'offset' => 0,
    'order_by' => 'id DESC',
];
$feedback_five = getAll('feedbacks', $options_feedback_five);

$options_feedback_noaccept = [
    'order_by' => 'id DESC',
    'where' => 'status=0',
];
$total_feedback_noaccept = getTotal('feedbacks', $options_feedback_noaccept);

$options_feedback_mine = [
    'order_by' => 'id DESC',
    'where' => 'user_id=' . $userNav,
];
$total_feedback_mine = getTotal('feedbacks', $options_feedback_mine);

$options_feedback_mine_product = [
    'order_by' => 'id DESC',
    'where' => 'product_id<>0 and user_id=' . $userNav,
];
$total_feedback_mine_product = getTotal('feedbacks', $options_feedback_mine_product);

$options_feedback_mine_order = [
    'order_by' => 'id DESC',
    'where' => 'product_id<>0 and user_id=' . $userNav,
];
$total_feedback_mine_order = getTotal('feedbacks', $options_feedback_mine_order);

$options_feedback_new = [
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC',
];
$feedback_new = getByOptions('feedbacks', $options_feedback_new);

$options_feedback_product = [
    'order_by' => 'createTime DESC',
    'where' => 'product_id<>0',
];
$total_feedback_product = getTotal('feedbacks', $options_feedback_product);

$options_feedback_noaccept = [
    'order_by' => 'createTime DESC',
    'where' => 'status=0',
];
$total_feedback_noaccept = getTotal('feedbacks', $options_feedback_noaccept);

$options_feedback_status = [
    'order_by' => 'createTime DESC',
    'where' => 'status=1',
];
$total_feedback_status = getTotal('feedbacks', $options_feedback_status);
if ($total_feedback_status != 0) {
    $feedback_ratio = $total_feedback_status / $total_feedback * 100;
} else {
    $feedback_ratio = 0;
}

//comments
$options_comments = [
    'order_by' => 'id DESC',
];
$totalRows_comment = getTotal('comments', $options_comments);

$options_comments_mine = [
    'order_by' => 'id DESC',
    'where' => 'user_id=' . $userNav,
];
$total_mine_comment = getTotal('comments', $options_comments_mine);

$options_mine_comment_noaccept = [
    'order_by' => 'id DESC',
    'where' => 'status=0 and user_id=' . $userNav,
];
$total_mine_comment_noaccept = getTotal('comments', $options_mine_comment_noaccept);

$options_comment_five = [
    'limit' => 5,
    'offset' => 0,
    'where' => 'status<>3 and status<>2',
    'order_by' => 'id DESC',
];
$comment_five = getAll('comments', $options_comment_five);

$options_comment_new = [
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC',
];
$comment_new = getByOptions('comments', $options_comment_new);

$options_comment_noaccept = [
    'order_by' => 'id DESC',
    'where' => 'status=0',
];
$total_comment_noaccept = getTotal('comments', $options_comment_noaccept);

$options_comment_trash = [
    'order_by' => 'id DESC',
    'where' => 'status=2',
];
$total_comment_trash = getTotal('comments', $options_comment_trash);

$options_comment_spam = [
    'order_by' => 'id DESC',
    'where' => 'status=3',
];
$total_comment_spam = getTotal('comments', $options_comment_spam);

$options_comment_accept = [
    'order_by' => 'id DESC',
    'where' => 'status=1',
];
$total_comment_accept = getTotal('comments', $options_comment_accept);
if ($total_comment_accept != 0) {
    $comment_ratio = $total_comment_accept / $totalRows_comment * 100;
} else {
    $comment_ratio = 0;
}

//posts
$options_page_new = [
    'limit' => 1,
    'offset' => 0,
    'where' => 'post_type=2',
    'order_by' => 'id DESC',
];
$page_new = getByOptions('posts', $options_page_new);

$options_post = [
    'order_by' => 'id DESC',
    'where' => 'post_type=1',
];
$total_post = getTotal('posts', $options_post);

$options_page = [
    'order_by' => 'id DESC',
    'where' => 'post_type=2',
];
$total_page = getTotal('posts', $options_page);

$options_trash = [
    'order_by' => 'id DESC',
    'where' => 'post_status="Trash"',
];
$total_post_trash = getTotal('posts', $options_trash);

$options_posts = [
    'order_by' => 'id DESC',
];
$total_posts = getTotal('posts', $options_posts);

$options_posts_status = [
    'order_by' => 'id DESC',
    'where' => 'post_status="Published"',
];
$total_posts_status = getTotal('posts', $options_posts_status);

$options_page_draft = [
    'order_by' => 'id DESC',
    'where' => 'post_type=2 and post_status="Draft"',
];
$total_page_draft = getTotal('posts', $options_page_draft);

$options_post_new = [
    'limit' => 1,
    'offset' => 0,
    'where' => 'post_type=1',
    'order_by' => 'id DESC',
];
$post_new = getByOptions('posts', $options_post_new);

$options_post_draft = [
    'order_by' => 'id DESC',
    'where' => 'post_type=1 and post_status="Draft"',
];
$total_post_draft = getTotal('posts', $options_post_draft);
if ($total_posts_status != 0) {
    $posts_ratio = ($total_posts_status / $total_posts) * 100;
} else {
    $posts_ratio = 0;
}

//uuser online
$options_user_online = [
    'order_by' => 'session',
];
$users_online = getAll('users_online', $options_user_online);
$users_online_total = 0;
foreach ($users_online as $user) {
    if ($user['dateonline'] >= date('Y-m-d H:i:s', mktime(date('H'), date('i') - 10, date('s'), date('m'), date('d'), date('Y')) + 7 * 3600)) {
        $users_online_total++;
    }
}

$options_user_online_all = [
    'order_by' => 'session',
];
$users_online_all = getTotal('users_online', $options_user_online_all);

//product
$options_product_total = [
    'order_by' => 'id',
];
$total_product = getTotal('products', $options_product_total);

$options_New_product_total = [
    'order_by' => 'id',
    'where' => 'product_typeid=2',
];
$total_new_product = getTotal('products', $options_New_product_total);

$options_hot_product_total = [
    'order_by' => 'id',
    'where' => 'product_typeid=1',
];
$total_hot_product = getTotal('products', $options_hot_product_total);

$options_sale_product_total = [
    'order_by' => 'id',
    'where' => 'product_typeid=3',
];
$total_sale_product = getTotal('products', $options_sale_product_total);

$options_product_update = [
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'editDate DESC',
];
$product_update = getByOptions('products', $options_product_update);

//user
$options_user_update = [
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'editTime DESC',
];
$user_update = getByOptions('users', $options_user_update);

$options_user_all = [
    'order_by' => 'editTime DESC',
];
$user_all_total = getTotal('users', $options_user_all);

$options_user_not_veri = [
    'order_by' => 'editTime DESC',
    'where' => 'verified=0',
];
$user_not_veri_total = getTotal('users', $options_user_not_veri);

$options_user_new = [
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'createDate DESC',
];
$user_new = getByOptions('users', $options_user_new);

$options_user = [
    'order_by' => 'editTime DESC',
];
$users = getAll('users', $options_user);
$user_total_7day = 0;
foreach ($users as $user) {
    if (strtotime($user['createDate']) > strtotime(date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), (date('d') - 7), date('Y'))))) {
        $user_total_7day++;
    }
}
