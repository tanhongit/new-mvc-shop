<?php

function roleDestroy($id)
{
    $id = intval($id);
    global $linkConnectDB;
    $sql = "DELETE FROM roles WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or exit(mysqli_error($linkConnectDB));
}
function role_update()
{
    $role = [
        'id'        => intval($_POST['role_id']),
        'role_name' => escape($_POST['name']),
        'role_desc' => $_POST['description'],
    ];
    save('roles', $role);
    header('location:admin.php?controller=role');
}
