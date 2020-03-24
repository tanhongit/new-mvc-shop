<?php
function role_delete($id)
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "DELETE FROM role WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
