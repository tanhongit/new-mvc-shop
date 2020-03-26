<?php
require('config/database.php');
require('config/config.php');
//lấy giá trị bảng theo id
function get_a_record($table, $id, $select = '*')
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` WHERE id=$id";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}
//lấy giá trị bảng theo yêu cầu tuỳ ý của option
function get_all($table, $options = array())
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;
}
function get_total($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_assoc($query);
    return $row['total'];
}
function save($table, $data = array())
{
    $values = array();
    global $linkconnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkconnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $id = intval($data['id']);
    if ($id > 0) {
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE id=$id";
    } else {
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    }
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $id = ($id > 0) ? $id : mysqli_insert_id($linkconnectDB);
    return $id;
}
//for admin
//lựa chọn bảng theo một mảng
function select_a_record($table, $options = array(), $select = '*')
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}
