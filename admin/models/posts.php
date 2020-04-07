<?php
function post_trash($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE posts SET post_status='Trash' where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function post_delete($id)
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "DELETE FROM posts WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
