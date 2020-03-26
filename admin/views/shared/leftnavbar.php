<!-- Left Sidebar -->
<?php global $user_nav;
$user_info_nav = get_a_record('users', $user_nav) ?>
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.php"><img src="admin/themes/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">ChiKoi</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="admin.php?controller=user&action=info&user_id=<?= $user_nav ?>"><img src="public/upload/images/<?= $user_info_nav['user_avatar'] ?>" alt="User"></a>
                    <div class="detail">
                        <h4><?= $user_info_nav['user_name'] ?></h4>
                        <small><?php if ($user_info_nav['role_id'] == 1) echo 'Admin';
                                elseif ($user_info_nav['role_id'] == 3) echo 'Moderator';
                                else echo "User"; ?></small>
                    </div>
                </div>
            </li>
            <li class="open"><a href="<?= PATH_URL ?>home" target="_blank"><i class="zmdi zmdi-home"></i><span>Quay lại SHOP</span></a></li>
            <li class="active open"><a href="admin.php"><i class="zmdi zmdi-view-dashboard"></i><span>Bảng điều khiển</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=user&action=info&user_id=<?= $user_nav ?>">Your profile</a></li>
                    <li><a href="admin.php?controller=user&action=change-password&user_id=<?= $user_info_nav['id'] ?>">Change your Password</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Quản lý sản phẩm</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=product">Danh sách sản phẩm</a></li>
                    <li><a href="admin.php?controller=product&action=newproduct">Sản phẩm mới</a></li>
                    <li><a href="admin.php?controller=product&action=saleproduct">Sản phẩm khuyến mại</a></li>
                    <li><a href="admin.php?controller=product&action=hotproduct">Sản phẩm hot</a></li>
                    <li><a href="admin.php?controller=product&amp;action=edit">Add sản phẩm mới</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>Quản lý danh mục</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=shop">1. Nhóm danh mục</a></li>
                    <li><a href="admin.php?controller=shop&amp;action=edit">2. Add nhóm danh mục mới</a></li>
                    <li><a href="admin.php?controller=category">3. Danh mục con</a></li>
                    <li><a href="admin.php?controller=category&amp;action=edit">4. Add danh mục con mới</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Quản lý đơn hàng</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=order">Danh sách All đơn hàng</a></li>
                    <li><a href="admin.php?controller=order&amp;action=order-noprocess">Đơn hàng chưa xử lý</a></li>
                    <li><a href="admin.php?controller=order&amp;action=order-inprocess">Đơn hàng đang xử lý</a></li>
                    <li><a href="admin.php?controller=order&amp;action=order-complete">Đơn hàng đã xử lý</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>User</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=user&action=info&user_id=<?= $user_nav ?>">Your Profile</a></li>
                    <li><a href="admin.php?controller=user&action=listall">List Profile</a></li>
                    <li><a href="admin.php?controller=user&action=add">Add New User</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Admin</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=user&action=info&user_id=<?= $user_nav ?>">Your Profile</a></li>
                    <li><a href="admin.php?controller=role">List Role</a></li>
                    <li><a href="admin.php?controller=role&action=admin">List Admin</a></li>
                    <li><a href="admin.php?controller=user&action=add">Add New User Or Admin</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-collection-folder-image"></i><span>Media</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=media&action=image-gallery">Product Image Gallery</a></li>
                    <li><a href="admin.php?controller=media">Library Media Upload</a></li>
                    <li><a href="admin.php?controller=media&action=add">Add New Media</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-dns"></i><span>Backup</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=backupdb">Backup CSDL</a></li>
                    <li><a href="admin.php?controller=backupdb&action=list">List Backup CSDL</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-info"></i><span>Edit Info</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=backupdb">Backup CSDL</a></li>
                    <li><a href="admin.php?controller=backupdb&action=list">List Backup CSDL</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Setup View Web</span></a>
                <ul class="ml-menu">
                    <li><a href="admin.php?controller=backupdb">Backup CSDL</a></li>
                    <li><a href="admin.php?controller=backupdb&action=list">List Backup CSDL</a></li>
                </ul>
            </li>
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