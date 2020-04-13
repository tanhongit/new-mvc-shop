<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
// php.net
function show_404()
{
    header('HTTP/1.1 404 Not Found', true, 404);
    require('404.php');
    exit();
}
//Thoát các ký tự đặc biệt trong chuỗi
function escape($str)
{
    global $linkconnectDB;
    return mysqli_real_escape_string($linkconnectDB, $str);
}
function pagination($url, $page, $total)
{
    $adjacents = 2;
    $out = '<ul class="pagination pull-right">';
    //first
    if ($page == 1) {
        $out .= '<li class="disabled"><span>Đầu</span></li>';
    } else {
        $out .= '<li><a href="' . $url . '">Đầu</a></li>';
    }
    // previous
    if ($page == 1) {
        $out .= '<li class="disabled"><span><i class="fa fa-chevron-left"></i></span></li>';
    } elseif ($page == 2) {
        $out .= '<li><a href="' . $url . '"><i class="fa fa-chevron-left"></i></a></li>';
    } else {
        $out .= '<li><a href="' . $url . '&amp;page=' . ($page - 1) . '"><i class="fa fa-chevron-left"></i></a></li>';
    }
    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($total - $adjacents)) ? ($page + $adjacents) : $total;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out .= '<li class="active"><span>' . $i . '</span></li>';
        } elseif ($i == 1) {
            $out .= '<li><a href="' . $url . '">' . $i . '</a></li>';
        } else {
            $out .= '<li><a href="' . $url . "&amp;page=" . $i . '">' . $i . '</a></li>';
        }
    }
    // next
    if ($page < $total) {
        $out .= '<li><a href="' . $url . '&amp;page=' . ($page + 1) . '"><i class="fa fa-chevron-right"></i></a></li>';
    } else {
        $out .= '<li class="disabled"><span><i class="fa fa-chevron-right"></i></span></li>';
    }
    //last
    if ($page < $total) {
        $out .= '<li><a href="' . $url . '&amp;page=' . $total . '">Cuối</a></li>';
    } else {
        $out .= '<li class="disabled"><span>Cuối</span></li>';
    }

    $out .= '</ul>';
    return $out;
}

//chuyển đổi name sang slug
function stringURL($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/[^A-Za-z0-9 ]/", '', $str);
    $str = preg_replace("/\s+/", ' ', $str);
    $str = trim($str);
    return $str;
}
function convert_name($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
    $str = preg_replace("/( )/", '-', $str);
    return $str;
}
function slug($str)
{
    $str = convert_name($str);
    $str = strtolower($str); //mb_strtolower($str, 'UTF-8');
    $str = str_replace(' ', '-', $str);
    return $str;
}

//only admin
function upload($field, $config = array())
{
    $options = array(
        'name' => '',
        'upload_path'  => './',
        'allowed_exts' => '*',
        'overwrite'    => TRUE,
        'max_size'     => 0
    );
    $options = array_merge($options, $config); //Hợp nhất một hoặc nhiều mảng
    if (!isset($_FILES[$field])) return FALSE;
    $file = $_FILES[$field];
    if ($file['error'] != 0) return FALSE;
    $temp = explode(".", $file["name"]);
    $ext = end($temp); //Đặt con trỏ bên trong của một mảng thành phần tử cuối cùng của nó
    if ($options['allowed_exts'] != '*') {
        $allowedExts = explode('|', $options['allowed_exts']);
        if (!in_array($ext, $allowedExts)) return FALSE;
    }
    $size = $file['size'] / 1024 / 1024;
    if (($options['max_size'] > 0) && ($size > $options['max_size'])) return FALSE;

    $name = empty($options['name']) ? $file["name"] : $options['name'] . '.' . $ext;
    $file_path = $options['upload_path'] . $name;
    if ($options['overwrite'] && file_exists($file_path)) {
        unlink($file_path);
    }

    move_uploaded_file($file["tmp_name"], $file_path);
    return $name;
}
//permission users
function permission_user()
{
    global $user_nav;
    $user_login = get_a_record('users', $user_nav);
    if ($user_login['role_id'] == 0) {
        header('location:index.php');
        exit;
    }
}
function permission_moderator()
{
    global $user_nav;
    $user_login = get_a_record('users', $user_nav);
    if ($user_login['role_id'] == 2) {
        header('location:admin.php');
        exit;
    }
}
//pagination admin
function pagination_admin($url, $page, $total)
{
    $adjacents = 2;
    $out = '<ul class="pagination pagination-primary mt-4">';
    //first
    if ($page == 1) {
        $out .= '<li class="page-item disabled"><span class="page-link">Đầu</span></li>';
    } else {
        $out .= '<li class="page-item"><a style="color: blueviolet" class="page-link" href="' . $url . '">Đầu</a></li>';
    }
    // previous
    if ($page == 1) {
        $out .= '<li class="page-item disabled"><span class="page-link"><i class="zmdi zmdi-arrow-left"></i></span></li>';
    } elseif ($page == 2) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '"><i class="zmdi zmdi-arrow-left"></i></a></li>';
    } else {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page - 1) . '"><i class="zmdi zmdi-arrow-left"></i></a></li>';
    }
    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($total - $adjacents)) ? ($page + $adjacents) : $total;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
        } elseif ($i == 1) {
            $out .= '<li class="page-item"><a class="page-link" href="' . $url . '">' . $i . '</a></li>';
        } else {
            $out .= '<li class="page-item"><a class="page-link" href="' . $url . "&amp;page=" . $i . '">' . $i . '</a></li>';
        }
    }
    // next
    if ($page < $total) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page + 1) . '"><i class="zmdi zmdi-arrow-right"></i></a></li>';
    } else {
        $out .= '<li class="page-item disabled"><span class="page-link"><i class="zmdi zmdi-arrow-right"></i></span></li>';
    }
    //last
    if ($page < $total) {
        $out .= '<li class="page-item"><a style="color: blueviolet" class="page-link" href="' . $url . '&amp;page=' . $total . '">Cuối</a></li>';
    } else {
        $out .= '<li class="page-item disabled"><span class="page-link">Cuối</span></li>';
    }
    $out .= '</ul>';
    return $out;
}
