<?php

function approveComment($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE comments SET status=1 where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function spamComment($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE comments SET status=3 where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function trashComment($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE comments SET status=2 where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function unApprovedComment($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE comments SET status=0 where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function deleteComment($id)
{
    global $linkConnectDB;
    $id = intval($id);
    $sql = "DELETE FROM comments WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function updateComment()
{
    $comment = [
        'id' => intval($_POST['comment_id']),
        'author' => escape($_POST['name']),
        'email' => escape($_POST['email']),
        'content' => escape($_POST['subject']),
        'editTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'status' => intval($_POST['status']),
    ];
    save('comments', $comment);
    header('location:admin.php?controller=comment');
}
