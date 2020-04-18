<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require('admin/views/shared/header.php');
if (!empty($_POST)) {
	$order = array(
		'id' => 0,
		'customer' => escape($_POST['name']),
		'province' => escape($_POST['province']),
		'address' => escape($_POST['address']),
		'phone' => escape($_POST['phone']),
		'cart_total' => $_POST['cart_total'],
		'createtime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
		'message' => escape($_POST['message']),
		'user_id' => intval($_POST['user_id'])
	);
	$order_id = save('orders', $order);

	$cart = cart_list();
	//lấy sản phẩm trong session cart
	foreach ($cart as $product) {
		$order_detail = array(
			'id' => 0,
			'order_id' => $order_id,
			'product_id' => $product['id'],
			'quantity' => $product['number'],
			'price' => $product['price']
		);
		save('order_detail', $order_detail);
	}
	cart_destroy(); //xoá cart sau khi save order db
	global $user_nav;
	if (isset($user_nav)) detroy_cart_user_db(); //xóa đồng bộ cart trên db sau khi đặt hàng
	$title = 'Đặt hàng thành công - Quán Chị Kòi';
	header("refresh:15;url=" . PATH_URL . "home");
	echo '<div style="text-align: center;padding: 20px 10px;">Đã đặt hàng thành công</div><div style="text-align: center;padding: 20px 10px;">Cảm ơn bạn đã đặt hàng của Quán Chị Kòi. Quán sẽ gọi điện từ số điện thoại bạn đã cung cấp để Confirm (Xác nhận) lại với bạn trong thời gian sớm nhất để xác nhận đơn hàng.<br>
                    Trình duyệt sẽ tự động chuyển về trang chủ sau 15s, hoặc bạn có thể click <a href="' . PATH_URL . 'home">vào đây</a>.</div>';
} else {
	header('location:.');
}
