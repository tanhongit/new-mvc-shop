<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
//khởi tạo giỏ hàng
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
//thêm giỏ hàng
function cart_add($product_id, $number)
{
    if (isset($_SESSION['cart'][$product_id])) {
        //nếu đã có sp trong giỏ hàng thì số lượng công thêm $number
        $_SESSION['cart'][$product_id]['number'] += $number;
    } else {
        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
        $product = get_a_record('products', $product_id);

        $_SESSION['cart'][$product_id] = array(
            'id' => $product_id,
            'name' => $product['product_name'],
            'image' => $product['img1'],
            'number' => $number,
            'typeid' => $product['product_typeid'],
            'percent_off' => $product['percentoff'],
            'price' => $product['product_price'],
            'saleoff' => $product['saleoff']
        );
    }
}
//cập nhật giỏ hàng đến cho người dùng và từ người dùng xuống session cart
function update_sesion_cart()
{
    global $user_nav, $linkconnectDB;
    if (isset($user_nav)) {
        $option = array(
            'order_by' => 'id asc',
            'where' => 'user_id=' . $user_nav
        );
        $product_of_user = get_all('cart_user', $option);
        if (!empty($product_of_user)) {
            foreach ($product_of_user as $product) {
                if (isset($_SESSION['cart'][$product['product_id']]) && mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT product_id FROM cart_user WHERE product_id=" . $product['product_id']  . "")) == 1) {
                    //nếu đã có sp trong giỏ hàng thì số lượng công thêm $number
                    $_SESSION['cart'][$product['product_id']]['number'] += $product['number'];
                } else {
                    //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
                    $info_product = get_a_record('products', $product['product_id']);
                    $_SESSION['cart'][$product['product_id']] = array(
                        'id' => $product['product_id'],
                        'name' => $info_product['product_name'],
                        'image' => $info_product['img1'],
                        'number' => $product['number'],
                        'typeid' => $info_product['product_typeid'],
                        'percent_off' => $info_product['percentoff'],
                        'price' => $info_product['product_price'],
                        'saleoff' => $info_product['saleoff']
                    );
                }
            }
        }
        //dùng trong file login.php
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
