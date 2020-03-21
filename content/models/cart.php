<?php
//khởi tạo giỏ hàng
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
//thêm giỏ hàng
function cart_add($product_id)
{
    if (isset($_SESSION['cart'][$product_id])) {
        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
        $_SESSION['cart'][$product_id]['number']++;
    } else {
        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
        $product = get_a_record('products', $product_id);

        $_SESSION['cart'][$product_id] = array(
            'id' => $product_id,
            'name' => $product['product_name'],
            'image' => $product['img1'],
            'number' => 1,
            'typeid' => $product['product_typeid'],
            'percent_off' => $product['percentoff'],
            'price' => $product['product_price']
        );
    }
}
//Cập nhật số lượng sản phẩm
function cart_update($product_id, $number)
{
    if ($number == 0) {
        //xóa sp ra khỏi giỏ hàng
        unset($_SESSION['cart'][$product_id]);
    } else {
        $_SESSION['cart'][$product_id]['number'] = $number;
    }
}
//Xóa sản phẩm ra khỏi giỏ hàng
function cart_delete($product_id)
{
    unset($_SESSION['cart'][$product_id]);
}
//Tổng giá trị giỏ hàng
function cart_total()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $product) {
        if ($product["typeid"] == 3) {
            $total += (($product['price']) - ($product['price']) * ($product['percent_off']) / 100) * $product['number'];
        } else
            $total += $product['price'] * $product['number'];
    }
    return $total;
}
//Số sản phẩm có trong giỏ hàng
function cart_number()
{
    $number = 0;
    foreach ($_SESSION['cart'] as $product) {
        $number += $product['number'];
    }
    return $number;
}
//Danh sách sản phẩm trong giỏ hàng
function cart_list()
{
    return $_SESSION['cart'];
}
// Xóa giỏ hàng
function cart_destroy()
{
    $_SESSION['cart'] = array();
}
