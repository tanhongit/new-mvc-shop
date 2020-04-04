<?php
function updateCountView($id)
{
    global $linkconnectDB;
    $sql = "Update products set totalView = totalView + 1 WHERE id =$id";
    return mysqli_query($linkconnectDB, $sql);
}
