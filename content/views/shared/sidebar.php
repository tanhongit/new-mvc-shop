<?php
$get_id = [
    'order_by' => 'id',
];
$subCategoryData = getAll('subcategory', $get_id);
$shops = getAll('categories', $get_id);
$types = getAll('types', $get_id);
$topProducts = getAll('products', [
    'limit' => '6',
    'offset' => '0',
    'order_by' => 'totalView DESC',
]);
$newProducts = getAll('products', [
    'limit' => '5',
    'offset' => '0',
    'order_by' => 'id DESC',
]);
?>
<aside class="sidebar">
    <h3 style="font-weight: bold;">Tìm kiếm</h3>
    <form action="<?= PATH_URL; ?>search/" method="get">
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
        <a href="type/<?= $type['id'] . '-' . $type['slug']; ?>"><span class="label label-dark"><?= $type['type_name'] ?></span></a>
    <?php } ?><br>
    <?php foreach ($subCategoryData as $cate) { ?>
        <a href="category/<?= $cate['id'] . '-' . $cate['slug']; ?>"><span class="label label-dark"><?= $cate['subcategory_name'] ?></span></a>
    <?php } ?>
    <?php foreach ($shops as $shop) { ?>
        <a href="shop/<?= $shop['id'] . '-' . $shop['slug']; ?>"><span class="label label-dark"><?= $shop['category_name'] ?></span></a>
    <?php } ?>
    <hr />
    <h4 style="font-weight: bold;">SẢN PHẨM HÀNG ĐẦU</h4>
    <ul class="simple-post-list">
        <?php foreach ($topProducts as $product) : ?>
            <li>
                <div class="post-image">
                    <div class="img-thumbnail">
                        <a href="product/<?= $product['id'] . '-' . slug($product['product_name']) ?>">
                            <img alt="<?= $product['product_name'] ?>" width="60" height="60" class="img-responsive" src="public/upload/products/<?= $product['img1'] ?>">
                        </a>
                    </div>
                </div>
                <div class="post-info">
                    <a href="product/<?= $product['id'] . '-' . slug($product['product_name']) ?>"><?= $product['product_name'] ?></a>
                    <div class="post-meta">
                        <?php if ($product['saleoff'] != 0) {
                            echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.') . ' VNĐ';
                        } else {
                            echo number_format($product['product_price'], 0, ',', '.') . ' VNĐ';
                        } ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (isset($get_sidebar_with_only_product)) { ?>
        <h4 style="font-weight: bold;">SẢN PHẨM MỚI NHẤT</h4>
        <ul class="simple-post-list">
            <?php foreach ($newProducts as $product) : ?>
                <li>
                    <div class="post-image">
                        <div class="img-thumbnail">
                            <a href="product/<?= $product['id'] . '-' . slug($product['product_name']) ?>">
                                <img alt="<?= $product['product_name'] ?>" width="60" height="60" class="img-responsive" src="public/upload/products/<?= $product['img1'] ?>">
                            </a>
                        </div>
                    </div>
                    <div class="post-info">
                        <a href="product/<?= $product['id'] . '-' . slug($product['product_name']) ?>"><?= $product['product_name'] ?></a>
                        <div class="post-meta">
                            <?php if ($product['saleoff'] != 0) {
                                echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.') . ' VNĐ';
                            } else {
                                echo number_format($product['product_price'], 0, ',', '.') . ' VNĐ';
                            } ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php } ?>
</aside>
