<?php
permission_user();
$options = array(
    'where' => 'product_id <>0',
    'order_by' => 'id DESC'
);
$feedback_products  = get_all('feedbacks', $options);
$title = 'Phản hồi về các sản phẩm';
require('admin/views/feedback/feedback-product.php');
