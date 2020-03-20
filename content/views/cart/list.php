<div class="featured-box featured-box-secundary featured-box-cart">
    <div class="box-content">
        <form method="post" action="index.php?controller=cart" role="form">
            <table cellspacing="0" class="shop_table cart">
                <thead>
                    <tr>
                        <th class="product-remove">
                            &nbsp;
                        </th>
                        <th class="product-thumbnail">
                            &nbsp;
                        </th>
                        <th class="product-name">
                            Sản Phẩm
                        </th>
                        <th class="product-price">
                            Giá
                        </th>
                        <th class="product-quantity">
                            Số Lượng
                        </th>
                        <th class="product-subtotal">
                            Tổng Tiền
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $product_id => $product) { ?>
                        <tr class="cart_table_item">
                            <td class="product-remove">
                                <a title="Remove this item" class="remove" href="cart/delete/<?php echo $product['id']; ?>">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="product/<?php echo $product['id'] . '-' . $product['name']; ?>">
                                    <img width="100" height="100" alt="" class="img-responsive" src="<?php echo 'public/upload/products/' . $product['image'] ?>">
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="product/<?php echo $product['id'] . '-' . $product['name']; ?>"><?php echo $product['name'] ?></a>
                            </td>
                            <td class="product-price">
                                <span class="amount"><?php echo number_format($product['price'], 0, ',', '.') ?> VNĐ</span>
                            </td>
                            <td class="product-quantity">
                                <form enctype="multipart/form-data" method="post" class="cart">
                                    <div class="quantity">
                                        <input type="button" class="minus" value="-">
                                        <input type="text" class="input-text qty text" title="Qty" value="<?php echo $product['number']; ?>" name="number[<?php echo $product['id']; ?>]" min="1" step="1">
                                        <input type="button" class="plus" value="+">
                                    </div>
                                </form>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount"><?php echo number_format($product['price'] * $product['number'], 0, ',', '.') ?> VNĐ</span>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="actions" colspan="6">
                            <div class="actions-continue">
                                <input type="submit" value="Update Cart" name="update_cart" class="btn btn-default">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>