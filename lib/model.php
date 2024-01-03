<?php
require('config/database.php');
require('config/config.php');

$linkConnectDB = getLinkConnectDB();

/**
 * Get data in table by id
 *
 * @param  string  $table
 * @param $id
 * @param  string  $select
 *
 * @return array|false|null
 */
function getRecord(string $table, $id, string $select = '*'): false|array|null
{
    $id = intval($id);

    $sql = "SELECT $select FROM `$table` WHERE id=$id";

    $query = executeQuery($sql);
    $result = $query->get_result()->fetch_assoc();
    $query->close();

    return $result;
}

/**
 * Get data in table by options
 *
 * @param  string  $table
 * @param  array  $options
 *
 * @return array
 */
function getAll(string $table, array $options = []): array
{
    $select = $options['select'] ?? '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    $sql = "SELECT $select FROM `$table` $where $order_by $limit";

    $query = executeQuery($sql);
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    $query->close();

    return $result;
}

/**
 * Get total data in table by options
 *
 * @param  string  $table
 * @param  array  $options
 *
 * @return mixed
 */
function getTotal(string $table, array $options = []): mixed
{
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";

    $query = executeQuery($sql);
    $result = $query->get_result()->fetch_assoc();
    $query->close();

    return $result['total'];
}

function save($table, $data = array())
{
    $values = array();
    global $linkConnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkConnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $id = intval($data['id']);
    if ($id > 0) {
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE id=$id";
    } else {
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    }
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
    $id = ($id > 0) ? $id : mysqli_insert_id($linkConnectDB);
    return $id;
}
function save_and_get_result($table, $data = array())
{
    $values = array();
    global $linkConnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkConnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    $result = mysqli_query($linkConnectDB, $sql);
    if (!$result) {
        $result = mysqli_error($linkConnectDB);
    }
    echo $result;
}

/**
 * Get the data in the table according to the arbitrary request of options
 *
 * @param  string  $table
 * @param  array  $options
 *
 * @return array|false|null
 */
function getByOptions(string $table, array $options = []): false|array|null
{
    $select = $options['select'] ?? '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $join = isset($options['join']) ? 'LEFT JOIN ' . $options['join'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    $sql = "SELECT $select FROM `$table` $join $where $order_by $limit";

    $query = executeQuery($sql);
    $result = $query->get_result()->fetch_assoc();
    $query->close();

    return $result;
}

/**
 * @param $timePost
 * @param $timeReply
 *
 * @return string
 */
function getTime($timePost, $timeReply): string
{
    $datePost = new DateTime($timePost);
    $dateReply = new DateTime($timeReply);
    $interval = $datePost->diff($dateReply);

    if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0) {
        if ($interval->h == 0 && $interval->i == 0) {
            $result = ($interval->s == 1) ? '1 second ago' : $interval->s . ' seconds ago';
        } elseif ($interval->h == 0) {
            $result = ($interval->i == 1) ? '1 minute ago' : $interval->i . ' minutes ago';
        } else {
            $result = ($interval->h == 1) ? '1 hour ago' : $interval->h . ' hours ago';
        }
    } elseif ($interval->d == 1) {
        $result = 'Yesterday at ' . $dateReply->format('H:i:s');
    } else {
        $result = $datePost->format('d/m/Y \a\t H:i:s');
    }

    return $result;
}
