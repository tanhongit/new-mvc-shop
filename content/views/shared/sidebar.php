<?php
$get_id = array(
    'order_by' => 'id'
);
$sub_cate = get_all('subcategory', $get_id);
$shops = get_all('categories', $get_id);
$types = get_all('types', $get_id);
$product_top = get_all('products', array(
    'limit' => '6',
    'offset' => '0',
    'order_by' => 'totalView DESC'
));
$product_new = get_all('products', array(
    'limit' => '5',
    'offset' => '0',
    'order_by' => 'id DESC'
));
?>
<aside class="sidebar">
    <h3 style="font-weight: bold;">Tìm kiếm</h3>
    <form action="<?php echo PATH_URL; ?>search/" method="get">
        <div class="input-group input-group-lg">
            <input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <hr />
    <h3 style="font-weight: bold;">Danh mục</h3>
    <?php foreach ($types as $type) { ?>
        <a href="type/<?php echo $type['id'] . '-' . $type['slug']; ?>"><span class="label label-dark"><?php echo $type['type_name'] ?></span></a>
    <?php } ?><br>
    <?php foreach ($sub_cate as $cate) { ?>
        <a href="category/<?php echo $cate['id'] . '-' . $cate['slug']; ?>"><span class="label label-dark"><?php echo $cate['subcategory_name'] ?></span></a>
    <?php } ?>
    <?php foreach ($shops as $shop) { ?>
        <a href="shop/<?php echo $shop['id'] . '-' . $shop['slug']; ?>"><span class="label label-dark"><?php echo $shop['category_name'] ?></span></a>
    <?php } ?>
    <hr />
    <h4 style="font-weight: bold;">SẢN PHẨM HÀNG ĐẦU</h4>
    <ul class="simple-post-list">
        <?php foreach ($product_top as $topview_product) : ?>
            <li>
                <div class="post-image">
                    <div class="img-thumbnail">
                        <a href="product/<?= $topview_product['id'] . '-' . slug($topview_product['product_name']) ?>">
                            <img alt="<?= $topview_product['product_name'] ?>" width="60" height="60" class="img-responsive" src="public/upload/products/<?= $topview_product['img1'] ?>">
                        </a>
                    </div>
                </div>
                <div class="post-info">
                    <a href="product/<?= $topview_product['id'] . '-' . slug($topview_product['product_name']) ?>"><?= $topview_product['product_name'] ?></a>
                    <div class="post-meta">
                        <?php if ($topview_product['saleoff'] != 0) echo number_format(($topview_product['product_price']) - (($topview_product['product_price'] * $topview_product['percentoff']) / 100), 0, ',', '.') . ' VNĐ';
                        else echo number_format($topview_product['product_price'], 0, ',', '.') . ' VNĐ'; ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (isset($get_sidebar_with_only_product)) { ?>
        <h4 style="font-weight: bold;">SẢN PHẨM MỚI NHẤT</h4>
        <ul class="simple-post-list">
            <?php foreach ($product_new as $topview_product) : ?>
                <li>
                    <div class="post-image">
                        <div class="img-thumbnail">
                            <a href="product/<?= $topview_product['id'] . '-' . slug($topview_product['product_name']) ?>">
                                <img alt="<?= $topview_product['product_name'] ?>" width="60" height="60" class="img-responsive" src="public/upload/products/<?= $topview_product['img1'] ?>">
                            </a>
                        </div>
                    </div>
                    <div class="post-info">
                        <a href="product/<?= $topview_product['id'] . '-' . slug($topview_product['product_name']) ?>"><?= $topview_product['product_name'] ?></a>
                        <div class="post-meta">
                            <?php if ($topview_product['saleoff'] != 0) echo number_format(($topview_product['product_price']) - (($topview_product['product_price'] * $topview_product['percentoff']) / 100), 0, ',', '.') . ' VNĐ';
                            else echo number_format($topview_product['product_price'], 0, ',', '.') . ' VNĐ'; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php } ?>
</aside>