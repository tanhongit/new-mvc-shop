<?php
$options = array(
    'where' => 'product_typeid = 2',
    'order_by' => 'createDate'
);
$products = get_all('products', $options); ?>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Truy Xuất Dữ Liệu</strong> Sản Phẩm Mới</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="admin.php?controller=product&action=edit">Thêm Sản phẩm mới</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Ngày Tạo</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Tổng Lượt View</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Ngày Tạo</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Tổng Lượt View</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?php echo $product['id'] ?></td>
                                    <td><a href="admin.php?controller=product&amp;action=edit&amp;product_id=<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></a></td>
                                    <td><?php echo $product ? number_format($product['product_price'], 0, ',', '.') : 0; ?></td>
                                    <td><?php if ($product["saleoff"] == 1) echo number_format(($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)), 0, ',', '.'); ?></td>
                                    <td><?php echo $product['createDate'] ?></td>
                                    <td><?php echo '<image src="public/upload/products/' . $product['img1'] . '?time=' . time() . '" style="max-width:50px;" />'; ?></td>
                                    <td><?php echo $product['totalView'] ?></td>
                                    <td><a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug'] ?>" target="_blank" class="btn btn-success waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-eye"></i></a>
                                        <a href="admin.php?controller=product&amp;action=edit&amp;product_id=<?php echo $product['id']; ?>" class="btn btn-warning waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="admin.php?controller=product&amp;action=delete&amp;product_id=<?= $product['id'] ?>" class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>