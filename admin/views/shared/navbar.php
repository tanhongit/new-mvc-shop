<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin.php">Trang Quản Trị</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="admin.php?controller=comment">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="admin.php?controller=user&amp;action=info&amp;uid=<?php echo $user['id'];?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <?php if ($user['role_id']==1):?>
                    <li><a href="admin.php?controller=user&amp;action=list"><i class="fa fa-gear fa-fw"></i>List quản trị</a></li>
                    <li><a href="admin.php?controller=user&amp;action=add"><i class="fa fa-gear fa-fw"></i>Thêm quản trị</a></li>
                <?php endif;?>
                <li class="divider"></li>
                <li> <a href="admin.php?controller=home&amp;action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <form id="product_form" method="post" action="admin.php?controller=product" role="form">
                    <div class="input-group custom-search-form">
                        <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm"/>
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                        </form>
                </li>

                <li>
                    <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <?php if ($user['role_id']==1):?>
                    <li>
                        <a href="admin.php?controller=role"><i class="fa fa-cog fa-fw"></i> Quyền truy cập</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Cấu hình website<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin.php?controller=banner">Quản lý Banner</a>
                            </li>
                            <li>
                                <a href="admin.php?controller=slideshow">Quản lý Slideshow chính</a>
                            </li>
                            <li>
                                <a href="admin.php?controller=contactinfo">Quản lý Thông tin liên hệ</a>
                            </li>
                            <li>
                                <a href="admin.php?controller=intro">Trang giới thiệu</a>
                            </li>
                            <li>
                                <a href="admin.php?controller=advertise">Banner quảng cáo</a>
                            </li>
                        </ul>
                    </li>
                <?php endif;?>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Quản lý đơn hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin.php?controller=order&amp;action=order_inprocess"><i class="fa fa-table fa-fw"></i>Danh sách chưa xử lý</a>
                        </li>
                        <li>
                            <a href="admin.php?controller=order&amp;action=order_complete"><i class="fa fa-table fa-fw"></i>Danh sách đã xử lý</a>
                        </li>
                        <li>
                            <a href="admin.php?controller=order"><i class="fa fa-table fa-fw"></i>Danh sách đơn hàng</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="admin.php?controller=product"><i class="fa fa-folder-open fa-fw"></i>Quản lý sản phẩm <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="admin.php?controller=product&amp;action=newproduct">Sản phẩm mới</a>
                        </li>
                        <li>
                            <a href="admin.php?controller=product&amp;action=orderproduct">Sản phẩm order</a>
                        </li>
                        <li>
                            <a href="admin.php?controller=product&amp;action=saleproduct">Sản phẩm khuyến mại</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="admin.php?controller=category"><i class="fa fa-folder-open fa-fw"></i>Quản lý danh mục sản phẩm</a>
                </li>

                <li>
                    <a href="admin.php?controller=group"><i class="fa fa-folder-open fa-fw"></i>Quản lý nhóm danh mục</a>
                </li>


                <li>
                    <a href="admin.php?controller=livesport"><i class="fa fa-youtube-play fa-fw"></i> Quản lý phát video</a>
                </li>

                <li>
                    <a href="admin.php?controller=comment"><i class="fa fa-comments-o fa-fw"></i>Quản lý bình luận</a>
                </li>

                <li>
                    <a href="admin.php?controller=feedback"><i class="fa fa-envelope-o fa-fw"></i>Phản hồi của khách hàng</a>
                </li>

                <li>
                    <a href="admin.php?controller=counter"><i class="fa fa-tasks fa-fw"></i> Thống kê online</a>
                </li>

                <li>
                    <a href="index.php" target="_blank"><i class="fa fa-home fa-fw"></i>Trang chủ<span class="fa arrow"></span></a>
                </li>

            </ul>
        </div>
    </div>
</nav>