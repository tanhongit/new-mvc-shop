<?php

/**
 * @param  int  $id
 *
 * @return void
 */
function roleDestroy(int $id): void
{
    $sql = "DELETE FROM roles WHERE id = ?";

    try {
        $stmt = executeQuery($sql, [$id]);
        $stmt->close();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @return void
 */
function role_update(): void
{
    $role = [
        'id' => intval($_POST['role_id']),
        'role_name' => escape($_POST['name']),
        'role_desc' => ($_POST['description']),
    ];
    save('roles', $role);
    header('location:admin.php?controller=role');
}
