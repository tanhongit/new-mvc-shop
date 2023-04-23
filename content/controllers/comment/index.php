<?php

if (!empty($_POST)) {
    global $userNav;
    if (isset($userNav)) {
        $comment_add = [
            'id'         => 0,
            'product_id' => intval($_POST['product_id']),
            'email'      => escape($_POST['email']),
            'author'     => escape($_POST['author']),
            'content'    => escape($_POST['content']),
            'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
            'user_id'    => intval($_POST['user_id']),
            'link_image' => escape($_POST['link_image']),
        ];
    } else {
        $comment_add = [
            'id'         => 0,
            'product_id' => intval($_POST['product_id']),
            'email'      => escape($_POST['email']),
            'author'     => escape($_POST['author']),
            'content'    => escape($_POST['content']),
            'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
            'user_id'    => intval($_POST['user_id']),
        ];
    }
    save('comments', $comment_add);
    echo "<div class='alert alert-success'><strong>Done!</strong> Bạn đã ghi lời bình luận của bạn lại thành công !! <br>Hãy <a href='javascript: history.go(-1)'>Trở lại sản phẩm</a> hoặc <a href='index.php'>Đến trang chủ</a></div>";
}
require 'content/views/comment/index.php';
// $input = json_decode(file_get_contents('php://input'), true);

// $productID = $input['productID'];
// $commentContent = $input['commentContent'];
// $userID = $input['userID'];
// $link_image = $input['link_image'];
// $author = $input['author'];
// $userID = $input['email'];

// $comment_add = array(
//     'id' => 0,
//     'product_id' => intval($productID),
//     'email' => escape($email),
//     'author' => escape($author),
//     'content' => escape($commentContent),
//     'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
//     'user_id' => intval($userID),
//     'link_image' => escape($link_image)
// );
// save('comments', $comment_add);

// $option = array('product_id' => intval($productID));

// $commentList = get_all('comments',$option);

// echo json_encode($commentList);
// echo 'aaaa';
