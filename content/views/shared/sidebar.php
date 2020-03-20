<?php
$get_id = array(
    'order_by' => 'id'
);
$sub_cate = get_all('subcategory', $get_id);
$shops = get_all('categories', $get_id);
?>
<aside class="sidebar">

    <form action="<?php echo PATH_URL;?>search/" method="get">
        <div class="input-group input-group-lg">
            <input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>

    <hr />

    <h5>Categoryes</h5>
    <?php foreach ($sub_cate as $cate) { ?>
        <a href="category/<?php echo $cate['id'] . '-' . $cate['slug']; ?>"><span class="label label-dark"><?php echo $cate['subcategory_name'] ?></span></a>
    <?php } ?>
    <?php foreach ($shops as $shop) { ?>
        <a href="shop/<?php echo $shop['id'] . '-' . $shop['slug']; ?>"><span class="label label-dark"><?php echo $shop['category_name'] ?></span></a>
    <?php } ?>
    <hr />
    <h5>Top Rated Products</h5>
    <ul class="simple-post-list">
        <li>
            <div class="post-image">
                <div class="img-thumbnail">
                    <a href="shop-product-sidebar.html">
                        <img alt="" width="60" height="60" class="img-responsive" src="img/products/product-1.jpg">
                    </a>
                </div>
            </div>
            <div class="post-info">
                <a href="shop-product-sidebar.html">Photo Camera</a>
                <div class="post-meta">
                    $299
                </div>
            </div>
        </li>
        <li>
            <div class="post-image">
                <div class="img-thumbnail">
                    <a href="shop-product-sidebar.html">
                        <img alt="" width="60" height="60" class="img-responsive" src="img/products/product-2.jpg">
                    </a>
                </div>
            </div>
            <div class="post-info">
                <a href="shop-product-sidebar.html">Golf Bag</a>
                <div class="post-meta">
                    $72
                </div>
            </div>
        </li>
        <li>
            <div class="post-image">
                <div class="img-thumbnail">
                    <a href="shop-product-sidebar.html">
                        <img alt="" width="60" height="60" class="img-responsive" src="img/products/product-3.jpg">
                    </a>
                </div>
            </div>
            <div class="post-info">
                <a href="shop-product-sidebar.html">Workout</a>
                <div class="post-meta">
                    $60
                </div>
            </div>
        </li>
    </ul>

</aside>