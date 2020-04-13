<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (!empty($_POST)) {
    $comment_add = array(
        'id' => 0,
        'product_id' => intval($_POST['product_id']),
        'email' => escape($_POST['email']),
        'author' => escape($_POST['author']),
        'content' => escape($_POST['content']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'user_id' => intval($_POST['user_id']),
        'link_image' => escape($_POST['link_image'])
    );
    save('comments', $comment_add);
    echo "<div class='alert alert-success'><strong>Done!</strong> Bạn đã ghi lời bình luận của bạn lại thành công !! <br>Hãy <a href='javascript: history.go(-1)'>Trở lại sản phẩm</a> hoặc <a href='index.php'>Đến trang chủ</a></div>";
}
require('content/views/comment/index.php');
