<?php

define("DB_HOST", $_ENV['DB_HOST'] ?? 'db_server');
define("DB_PORT", $_ENV['DB_PORT'] ?? '3306');
define("DB_USER", $_ENV['DB_USER'] ?? 'root');
define("DB_PASS", $_ENV['DB_PASS'] ?? 'root');
define("DB_NAME", $_ENV['DB_NAME'] ?? 'new_mvc_shop_db');

if (isset($_SESSION['user'])) {
    $userNav = $_SESSION['user']['id'];
}

try {
    $linkConnectDB = connect();
} catch (Exception $e) {
    die($e->getMessage());
}

/**
 * @return mysqli
 */
function getLinkConnectDB(): mysqli
{
    global $linkConnectDB;
    return $linkConnectDB;
}

/**
 * Establish a database connection.
 *
 * @return mysqli
 * @throws Exception
 */
function connect(): mysqli
{
        $linkConnectDB = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        if ($linkConnectDB->connect_error) {
            throw new Exception('Connection error: ' . $linkConnectDB->connect_error);
        }

        $linkConnectDB->set_charset('utf8mb4');

        return $linkConnectDB;
}

/**
 * Execute a SQL query using prepared statements.
 *
 * @param string $sql The SQL query to execute.
 * @param array $params The parameters to bind to the query.
 *
 * @return mysqli_stmt The prepared statement.
 * @throws Exception
 */
function executeQuery(string $sql, array $params = []): mysqli_stmt
{
    global $linkConnectDB;
    $stmt = $linkConnectDB->prepare($sql);

    if (!$stmt) {
        throw new Exception('Prepare error: ' . $linkConnectDB->error);
    }

    if ($params) {
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    }

    if (!$stmt->execute()) {
        throw new Exception('Execute error: ' . $stmt->error);
    }

    return $stmt;
}
