<?php

require 'config/database.php';
require 'config/config.php';
//lấy giá trị bảng theo id
function get_a_record($table, $id, $select = '*')
{
    $id = intval($id);
    global $linkConnectDB;
    $sql = "SELECT $select FROM `$table` WHERE id=$id";
    $query = mysqli_query($linkConnectDB, $sql) or exit(mysqli_error($linkConnectDB));
    $data = null;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }

    return $data;
}
//lấy giá trị bảng theo yêu cầu tuỳ ý của option
function get_all($table, $options = [])
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE '.$options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY '.$options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT '.$options['offset'].','.$options['limit'] : '';
    global $linkConnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkConnectDB, $sql) or exit(mysqli_error($linkConnectDB));
    $data = [];
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }

    return $data;
}
function get_total($table, $options = [])
{
    global $linkConnectDB;
    $where = isset($options['where']) ? 'WHERE '.$options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";
    $query = mysqli_query($linkConnectDB, $sql) or exit(mysqli_error($linkConnectDB));
    $row = mysqli_fetch_assoc($query);

    return $row['total'];
}
function save($table, $data = [])
{
    $values = [];
    global $linkConnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkConnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $id = intval($data['id']);
    if ($id > 0) {
        $sql = "UPDATE `$table` SET ".implode(',', $values)." WHERE id=$id";
    } else {
        $sql = "INSERT INTO `$table` SET ".implode(',', $values);
    }
    mysqli_query($linkConnectDB, $sql) or exit(mysqli_error($linkConnectDB));
    $id = ($id > 0) ? $id : mysqli_insert_id($linkConnectDB);

    return $id;
}
function save_and_get_result($table, $data = [])
{
    $values = [];
    global $linkConnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkConnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $sql = "INSERT INTO `$table` SET ".implode(',', $values);
    $result = mysqli_query($linkConnectDB, $sql);
    if (!$result) {
        $result = mysqli_error($linkConnectDB);
    }
    echo $result;
}
//lựa chọn bảng theo một mảng
function select_a_record($table, $options = [], $select = '*')
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE '.$options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY '.$options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT '.$options['offset'].','.$options['limit'] : '';
    global $linkConnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkConnectDB, $sql) or exit(mysqli_error($linkConnectDB));
    $data = null;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }

    return $data;
}
function get_time($timePost, $timeReply)
{
    $datePost = date_parse_from_format('Y:m:d H:i:s', $timePost);
    $dateReply = date_parse_from_format('Y:m:d H:i:s', $timeReply);
    $tsPost = mktime($datePost['hour'], $datePost['minute'], $datePost['second'], $datePost['month'], $datePost['day'], $datePost['year']);
    $tsReply = mktime($dateReply['hour'], $dateReply['minute'], $dateReply['second'], $dateReply['month'], $dateReply['day'], $dateReply['year']);
    $distance = $tsReply - $tsPost;

    switch ($distance) {
        case $distance < 60:
            $result = ($distance == 1) ? $distance.' second ago' : $distance.' seconds ago';
            break;
        case $distance >= 60 && $distance < 3600:
            $minute = round($distance / 60);
            $result = ($minute == 1) ? $minute.' minute ago' : $minute.' minutes ago';
            break;
        case $distance >= 3600 && $distance < 86400:
            $hour = round($distance / 3600);
            $result = ($hour == 1) ? $hour.' hour ago' : $hour.' hours ago';
            break;
        case round($distance / 86400) == 1:
            $result = 'Yesterday at '.date('H:i:s', $tsReply);
            break;
        default:
            $result = date('d/m/Y \a\t H:i:s', $tsPost);
            break;
    }

    return $result;
}
