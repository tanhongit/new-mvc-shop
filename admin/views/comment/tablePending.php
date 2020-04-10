<?php
$option = array(
    'order_by' => 'id desc',
    'where' => 'status=0'
);
$comments_pending = get_all('comments', $option);
?>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Truy Xuất Dữ Liệu <strong>"Bình luận chưa phê duyệt"</strong> </h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="admin.php?controller=comment">All comment</a></li>
                            <li><a href="admin.php?controller=comment&action=trash">Trash</a></li>
                            <li><a href="admin.php?controller=comment&action=spam">Spam</a></li>
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
                                <th>Bình luận</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Bình luận</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($comments_pending as $comment) :
                                if ($comment['product_id'] <> 0) $product = get_a_record('products', $comment['product_id']);
                                elseif ($comment['post_id'] <> 0) $post = get_a_record('posts', $comment['post_id']);
                                elseif ($comment['page_id'] <> 0) $page = get_a_record('posts', $comment['page_id']); ?>
                                <tr style="background-color: #FFD18E;">
                                    <td>
                                        <?php echo '<image src="public/upload/images/' . $comment['link_image'] . '?time=' . time() . '" style="max-width:20px;" />'; ?>
                                        <strong><?php echo $comment['author'] ?></strong> | <strong><?= get_time($comment['createDate'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></strong>
                                        <br><?php if ($comment['product_id'] <> 0) { ?>
                                            <a target="_blank" href="<?= PATH_URL . 'product/' . $product['id'] . '-' . $product['slug'] ?>"><?= PATH_URL . 'product/' . $product['id'] . '-' . $product['slug'] ?></a>
                                        <?php } elseif ($comment['post_id'] <> 0) { ?>
                                            <a target="_blank" href="<?= PATH_URL . 'post/' . $post['id'] . '-' . $post['post_slug'] ?>"><?= PATH_URL . 'post/' . $post['id'] . '-' . $post['post_slug'] ?></a>
                                        <?php } elseif ($comment['page_id'] <> 0) { ?>
                                            <a target="_blank" href="<?= PATH_URL . 'page/' . $page['id'] . '-' . $page['post_slug'] ?>"><?= PATH_URL . 'page/' . $page['id'] . '-' . $page['post_slug'] ?></a>
                                        <?php } ?>
                                        <br>( <?= $comment['email'] ?> )<br><br>
                                        <?= $comment['content'] ?>
                                    </td>
                                    <td>
                                        <a title="Approve" class="btn btn-info btn-icon" href="admin.php?controller=comment&action=approved&comment_id=<?= $comment['id'] ?>"> <i class="zmdi zmdi-minus-circle"></i></a>
                                        <a title="Add Trash" class="btn btn-danger btn-icon" href="admin.php?controller=comment&action=trash-action&comment_id=<?= $comment['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                                        <a title="Edit" class="btn btn-warning btn-icon" href="admin.php?controller=comment&action=edit&comment_id=<?= $comment['id'] ?>"> <i class="zmdi zmdi-eyedropper"></i></a>
                                        <a title="Add Spam" class="btn btn-danger btn-icon" href="admin.php?controller=comment&action=spam-action&comment_id=<?= $comment['id'] ?>"> <i class="zmdi zmdi-minus-circle"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>