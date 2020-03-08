<?php
require('config/database.php');
require('config/config.php');
function get_a_record($table, $id, $select = '*')
{
    $id = intval($id);
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT $select FROM `$table` WHERE id=$id";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $data = NULL;
    if ($query = mysqli_query($link, $sql) === true) {
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            mysqli_free_result($query);
        }
    }
    return $data;
}
function get_all($table, $options = array())
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));

    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;
}
