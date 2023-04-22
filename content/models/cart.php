<?php
//khởi tạo giỏ hàng
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
//thêm giỏ hàng
function cart_add($productId, $number)
{
    if (isset($_SESSION['cart'][$productId])) {
        //nếu đã có sp trong giỏ hàng thì số lượng công thêm $number
        $_SESSION['cart'][$productId]['number'] += $number;
    } else {
        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
        $product = get_a_record('products', $productId);

        $_SESSION['cart'][$productId] = array(
            'id' => $productId,
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
function updateCartSession()
{
    global $userNav, $linkConnectDB;
    if (isset($userNav)) {
        $option = array(
            'order_by' => 'id asc',
            'where' => 'user_id=' . $userNav
        );
        $product_of_user = get_all('cart_user', $option);
        if (!empty($product_of_user)) {
            foreach ($product_of_user as $product) {
                if (isset($_SESSION['cart'][$product['product_id']]) && mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT product_id FROM cart_user WHERE product_id=" . $product['product_id']  . "")) == 1) {
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
//đồng bộ sản phẩm giữa session và db khi người dùng add to cart
function mergeCartSessionWithDB()
{
    global $userNav, $linkConnectDB;
    //lấy sản phẩm trong session cart
    $cart = cart_list();

    //nếu row > 0, tức người dùng đã có sp trên db
    if (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT * FROM cart_user WHERE user_id=" . $userNav . "")) > 0) {
        foreach ($cart as $product_cart) {
            $option_cart_user = array(
                'order_by' => 'id',
                'where' => 'user_id=' . $userNav
            );
            //duyệt mảng cart_user với user là người đang đăng nhập
            $cart_users = get_all('cart_user', $option_cart_user);
            foreach ($cart_users as $cart_user) {
                if ($cart_user['product_id'] == $product_cart['id']) {
                    $status = 1;
                    break;
                } else $status = 0;
            }

            if ($status == 1) { //nếu sp trong cart này đã có trên db -> edit
                $cart_user = array(
                    'id' => $cart_user['id'],
                    'product_id' => $product_cart['id'],
                    'number' => $product_cart['number'],
                );
                save('cart_user', $cart_user);
            } elseif ($status == 0) { //nếu sp trong cart này chưa có trên db -> add
                $cart_user = array(
                    'id' => 0,
                    'user_id' => $userNav,
                    'product_id' => $product_cart['id'],
                    'number' => $product_cart['number'],
                );
                save('cart_user', $cart_user);
            }
        }
    } else {
        foreach ($cart as $product_cart) {
            $up_cart_user = array(
                'id' => 0,
                'user_id' => $userNav,
                'product_id' => $product_cart['id'],
                'number' => $product_cart['number'],
            );
            save('cart_user', $up_cart_user);
        }
    }
    /*
    phân tích đồng bộ số lượng sản phẩm trong cart lên db:
    đầu tiên sẽ kểm tra người dùng hiện tại trên db
    có 2 trường hợp: 1 là người dùng hiện tại chưa có sản phẩm nào trên db, 2 là  đã có 1 số sản phẩm trên đó
    TH1:
        kiểm tra xem người dùng hiện tại có sp nào trên db không
        nếu chưa có sẽ tiến hành upload sản phẩm lên với id = 0 là mặc định (add sp)
    TH2: (đã có 1 số sản phẩm trên đó)
        2.0) kiểm tra xem người dùng hiện tại có sp nào trên db không
        2.1) nếu sản phẩm trong cart chưa tồn tại ở trên db, sẽ tiến hành add sp với id = 0
        2.2) Nếu 1 số sp trong cart đã có trên db -> tiến hành đổi số lượng với id = id sản phẩm trong cart (Phải kiểm tra có đúng là của người dùng đang đăng nhập)
    */
}
//xóa đồng bộ sản phẩm giữa session và db khi người dùng đã đặt hàng
function detroy_cart_user_db()
{
    global $userNav, $linkConnectDB;
    $sql = "DELETE FROM cart_user WHERE user_id=" . $userNav;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
//xóa động bộ tùy sản phẩm được loại khỏi cart 
function delete_cart_user_db($productId)
{
    global $userNav, $linkConnectDB;
    $sql = "DELETE FROM cart_user WHERE user_id=" . $userNav . " and product_id=" . $productId;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
//Cập nhật số lượng sản phẩm
function cart_update($productId, $number)
{
    if ($number == 0) {
        //xóa sp ra khỏi giỏ hàng
        unset($_SESSION['cart'][$productId]);
    } else {
        $_SESSION['cart'][$productId]['number'] = $number;
    }
}
//Xóa sản phẩm ra khỏi giỏ hàng
function cart_delete($productId)
{
    unset($_SESSION['cart'][$productId]);
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
function cartDestroy()
{
    $_SESSION['cart'] = array();
}
