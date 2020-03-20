<?php
require_once('lib/model.php');
require('content/views/shared/header.php'); ?>
<div role="main" class="main">
    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo PATH_URL; ?>home">Home</a></li>
                        <li class="active">404</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>404 - Page Not Found</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="page-not-found">
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <div class="page-not-found-main">
                        <h2>404 <i class="fa fa-file"></i></h2>
                        <p>We're sorry, but the page you were looking for doesn't exist.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Here are some useful links</h4>
                    <ul class="nav nav-list primary">
                        <li><a href="<?php echo PATH_URL; ?>home">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <form action="<?php echo PATH_URL; ?>search/" method="get">
            <div class="input-group input-group-lg">
                <input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</div>
<?php require('content/views/shared/footer.php'); ?>