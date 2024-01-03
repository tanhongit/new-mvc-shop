<!-- Right Icon menu Sidebar -->
<?php require_once('admin/controllers/shared/statistics.php'); ?>
<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>
        <?php if ($userInfoNav['role_id'] != 0) : ?>
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideUp2">
                    <li class="header">App Sortcute</li>
                    <li class="body">
                        <ul class="menu app_sortcut list-unstyled">
                            <li>
                                <a href="admin.php?controller=media">
                                    <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-camera"></i></div>
                                    <p class="mb-0"> All Photos</p>
                                </a>
                            </li>
                            <!--<li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-translate"></i></div>
                                <p class="mb-0">Translate</p>
                            </a>
                        </li>
                        <li>
                            <a href="events.html">
                                <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-calendar"></i></div>
                                <p class="mb-0">Calendar</p>
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-account-calendar"></i></div>
                                <p class="mb-0">Contacts</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-tag"></i></div>
                                <p class="mb-0">News</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-grey"><i class="zmdi zmdi-map"></i></div>
                                <p class="mb-0">Maps</p>
                            </a>
                        </li> -->
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideUp2">
                    <li class="header">Notifications</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-blue"><i class="zmdi zmdi-pin-account"></i></div>
                                    <div class="menu-info">
                                        <h4>Có <?= $users_online_total ?> người dùng đang truy cập</h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="admin.php?controller=user&action=listall">
                                    <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                    <div class="menu-info">
                                        <h4><?= $user_total_7day ?> New Members joined 7 day</h4>
                                        <p><i class="zmdi zmdi-time"></i> <?= getTime($user_new['createDate'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?> </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="admin.php?controller=order&action=order-noprocess">
                                    <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                    <div class="menu-info">
                                        <h4><?= $total_order_noprosess ?> Đơn hàng mới</h4>
                                        <p><i class="zmdi zmdi-time"></i> <?= getTime($order_new['createtime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?> </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="admin.php?controller=order&action=order-cancell">
                                    <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                    <div class="menu-info">
                                        <h4>Có đơn hàng <b>bị hủy</b></h4>
                                        <p><i class="zmdi zmdi-time"></i> <?= getTime($order_cancell['editTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?> </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="admin.php?controller=user&action=info&user_id=<?= $user_update['id'] ?>">
                                    <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>
                                    <div class="menu-info">
                                        <h4><b><?= $user_update['user_name'] ?></b> Vừa cập nhật tài khoản</h4>
                                        <p><i class="zmdi zmdi-time"></i> <?= getTime($user_update['editTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?> </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="admin.php?controller=comment&action=pending">
                                    <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>
                                    <div class="menu-info">
                                        <h4><b><?= $comment_new['author'] ?></b> Vừa bình luận</h4>
                                        <p><i class="zmdi zmdi-time"></i> <?= getTime($comment_new['createDate'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?> </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="product/<?= $product_update['id'] . '-' . $product_update['slug'] ?>">
                                    <div class="icon-circle bg-purple"><i class="zmdi zmdi-refresh"></i></div>
                                    <div class="menu-info">
                                        <h4><b><?= $product_update['editBy'] ?></b> Vừa cập nhật sản phẩm</h4>
                                        <p><i class="zmdi zmdi-time"></i> <?= getTime($product_update['editDate'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?> </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
        <?php endif; ?>
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="admin.php?controller=home&amp;action=logout" class="mega-menu" title="Log Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>
