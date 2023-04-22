<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.php"><img src="admin/themes/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">ChiKoi</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="admin.php?controller=user&action=info&user_id=<?= $userNav ?>"><img src="public/upload/images/<?= $userInfoNav['user_avatar'] ?>" alt="User"></a>
                    <div class="detail">
                        <h4><?= $userInfoNav['user_name'] ?></h4>
                        <small><?php if ($userInfoNav['role_id'] == 1) echo 'Admin';
                                elseif ($userInfoNav['role_id'] == 2) echo 'Moderator';
                                else echo "User"; ?></small>
                    </div>
                </div>
            </li>
            <li class="open"><a href="<?= PATH_URL ?>home" target="_blank"><i class="zmdi zmdi-home"></i><span>Quay lại SHOP</span></a></li>
            <li <?= $homeNav ?? '' ?>><a href="admin.php"><i class="zmdi zmdi-view-dashboard"></i><span>Bảng điều khiển</span></a></li>
            <li <?php if (isset($nav_profile)) echo $nav_profile; ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=user&action=info&user_id=<?= $userNav ?>">Your profile</a></li>
                    <li><a href="admin.php?controller=user&action=change-password&user_id=<?= $userInfoNav['id'] ?>">Change your Password</a></li>
                </ul>
            </li>
            <li <?= $yourFeedback ?? '' ?>><a href="admin.php?controller=feedback&action=myfeedback"><i class="zmdi zmdi-mail-send"></i><span>Your Feedback</span></a></li>
            <li <?= $yourPurchaseNav ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Your Purchase</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=purchase">Tất cả</a></li>
                    <li><a href="admin.php?controller=purchase&action=confirmed">Đơn đã xác thực</a></li>
                    <li><a href="admin.php?controller=purchase&action=delivery">Đơn đang vận chuyển</a></li>
                    <li><a href="admin.php?controller=purchase&action=receied">Đơn hàng đã nhận</a></li>
                    <li><a href="admin.php?controller=purchase&action=cancelled">Đơn hàng đã hủy</a></li>
                </ul>
            </li>
            <?php if ($userInfoNav['role_id'] != 0) :
                if ($userInfoNav['role_id'] == 1) : ?>
                    <li <?= $navCategory ?? ''; ?>> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>Quản lý danh mục</span></a>
                        <ul class="ml-menu">
                            <li><a href="admin.php?controller=shop">1. Nhóm danh mục</a></li>
                            <li><a href="admin.php?controller=shop&amp;action=edit">2. Add nhóm danh mục mới</a></li>
                            <li><a href="admin.php?controller=category">3. Danh mục con</a></li>
                            <li><a href="admin.php?controller=category&amp;action=edit">4. Add danh mục con mới</a></li>
                        </ul>
                    </li>
                    <li <?= $backupDbClass ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-dns"></i><span>Backup</span></a>
                        <ul class="ml-menu">
                            <li><a href="admin.php?controller=backupdb">Backup CSDL</a></li>
                            <li><a href="admin.php?controller=backupdb&action=list">List Backup CSDL</a></li>
                        </ul>
                    </li>
                    <li <?= $navHF ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Setup View Web</span></a>
                        <ul class="ml-menu">
                            <li><a href="admin.php?controller=slide">Slide HomePage</a></li>
                            <li><a href="admin.php?controller=header-footer">Edit Header Footer</a></li>
                            <li><a href="admin.php?controller=header-footer&action=listMenuFooter">Link Menu Footer</a></li>
                        </ul>
                    </li>
                    <li <?= $adminNav ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Admin</span></a>
                        <ul class="ml-menu">
                            <li><a href="admin.php?controller=user&action=info&user_id=<?= $userNav ?>">Your Profile</a></li>
                            <li><a href="admin.php?controller=role">List Role</a></li>
                            <li><a href="admin.php?controller=role&action=admin">List Admin</a></li>
                            <li><a href="admin.php?controller=user&action=add">Add New User Or Admin</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li <?= $pageNav ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog -> Page</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=page">All Page</a></li>
                        <li><a href="admin.php?controller=page&action=viewtrash">Thùng rác</a></li>
                        <li><a href="admin.php?controller=page&action=viewdraft">Các bản nháp</a></li>
                        <li><a href="admin.php?controller=page&action=add">ADD New Page</a></li>
                    </ul>
                </li>
                <li <?= $postNav ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog -> Post</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=post">All Post</a></li>
                        <li><a href="admin.php?controller=post&action=viewtrash">Thùng rác</a></li>
                        <li><a href="admin.php?controller=post&action=viewdraft">Các bản nháp</a></li>
                        <li><a href="admin.php?controller=post&action=add">ADD New Post</a></li>
                    </ul>
                </li>
                <li <?= $productNav ?? '' ?>> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-collection-text"></i><span>Quản lý sản phẩm</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=product">Danh sách sản phẩm</a></li>
                        <li><a href="admin.php?controller=product&action=update">Sản phẩm mới cập nhật</a></li>
                        <li><a href="admin.php?controller=product&action=newproduct">Sản phẩm mới</a></li>
                        <li><a href="admin.php?controller=product&action=saleproduct">Sản phẩm khuyến mại</a></li>
                        <li><a href="admin.php?controller=product&action=hotproduct">Sản phẩm hot</a></li>
                        <li><a href="admin.php?controller=product&amp;action=edit">Add sản phẩm mới</a></li>
                    </ul>
                </li>
                <li <?= $orderNav ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Quản lý đơn hàng</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=order">Danh sách All đơn hàng</a></li>
                        <li><a href="admin.php?controller=order&amp;action=order-noprocess">Đơn hàng chưa xử lý</a></li>
                        <li><a href="admin.php?controller=order&amp;action=order-inprocess">Đơn hàng đang xử lý</a></li>
                        <li><a href="admin.php?controller=order&amp;action=order-complete">Đơn hàng đã xử lý</a></li>
                        <li><a href="admin.php?controller=order&amp;action=order-cancell">Đơn hàng đã bị hủy</a></li>
                    </ul>
                </li>
                <li <?php if (isset($nav_user)) echo $nav_user; ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>User</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=user&action=info&user_id=<?= $userNav ?>">Your Profile</a></li>
                        <li><a href="admin.php?controller=user&action=listall">List Profile</a></li>
                        <li><a href="admin.php?controller=user&action=add">Add New User</a></li>
                    </ul>
                </li>
                <li <?php if (isset($navMedia)) echo $navMedia; ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-collection-folder-image"></i><span>Media</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=media&action=image-gallery">Product Image Gallery</a></li>
                        <li><a href="admin.php?controller=media">Library Media Upload</a></li>
                        <li><a href="admin.php?controller=media&action=add">Add New Media</a></li>
                    </ul>
                </li>
                <li <?= $navFeedback ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-email-open"></i><span>Feedback Manager</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=feedback">All Feedback</a></li>
                        <li><a href="admin.php?controller=feedback&action=pending">Pending Feedback</a></li>
                        <li><a href="admin.php?controller=feedback&action=product">Product Feedback</a></li>
                        <li><a href="admin.php?controller=feedback&action=order">Order Feedback</a></li>
                        <li><a href="admin.php?controller=feedback&action=other">Other Feedback</a></li>
                    </ul>
                </li>
                <li <?= $navComment ?? '' ?>><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comments"></i><span>Comment Manager</span></a>
                    <ul class="ml-menu">
                        <li><a href="admin.php?controller=comment">All comment</a></li>
                        <li><a href="admin.php?controller=comment&action=pending">Pending comment</a></li>
                        <li><a href="admin.php?controller=comment&action=spam">Spam comment</a></li>
                        <li><a href="admin.php?controller=comment&action=trash">Trash comment</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush" class="active">
                            <div class="blush"></div>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox rtl_support">
                                <input id="checkbox1" type="checkbox" value="rtl_view">
                                <label for="checkbox1">RTL Version</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox ms_bar">
                                <input id="checkbox2" type="checkbox" value="mini_active">
                                <label for="checkbox2">Mini Sidebar</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane right_chat" id="chat">
            <div class="slim_scroll">
                <div class="card">
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella <small class="float-right">11:31AM</small></span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John <small class="float-right">05:00PM</small></span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander <small class="float-right">06:08PM</small></span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>