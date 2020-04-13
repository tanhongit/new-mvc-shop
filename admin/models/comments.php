<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function comment_Approved($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE comments SET status=1 where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function comment_Spam($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE comments SET status=3 where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function comment_Trash($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE comments SET status=2 where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function comment_unApproved($id)
{
    if (isset($_GET['comment_id'])) {
        $id = intval($_GET['comment_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE comments SET status=0 where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function comment_delete($id)
{
    global $linkconnectDB;
    $id = intval($id);
    $sql = "DELETE FROM comments WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function comment_update()
{
    $comment = array(
        'id' => intval($_POST['comment_id']),
        'author' => escape($_POST['name']),
        'email' => escape($_POST['email']),
        'content' => escape($_POST['subject']),
        'editTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'status' => intval($_POST['status']),
    );
    save('comments', $comment);
    header('location:admin.php?controller=comment');
}
