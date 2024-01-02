<?php

function updateCountView($id)
{
    global $linkConnectDB;
    $sql = "Update products set totalView = totalView + 1 WHERE id =$id";

    return mysqli_query($linkConnectDB, $sql);
}
