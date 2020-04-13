<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function role_delete($id)
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "DELETE FROM roles WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function role_update()
{
    $role = array(
        'id' => intval($_POST['role_id']),
        'role_name' => escape($_POST['name']),
        'role_desc' => ($_POST['description'])
    );
    save('roles', $role);
    header('location:admin.php?controller=role');
}
