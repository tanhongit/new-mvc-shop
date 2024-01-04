<?php

define("PATH_URL", $_ENV['PATH_URL'] ?? '/');

define("PATH_URL_IMG", PATH_URL . ($_ENV['PATH_URL_IMG'] ?? 'public/upload/images/'));

define("PATH_URL_IMG_PRODUCT", PATH_URL . ($_ENV['PATH_URL_IMG_PRODUCT'] ?? 'public/upload/product/'));
