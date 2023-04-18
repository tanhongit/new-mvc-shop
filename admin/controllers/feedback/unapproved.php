<?php

permission_user();

require_once('admin/models/feedbacks.php');

if (isset($_GET['feedback_id'])) {
    $feedbackId = intval($_GET['feedback_id']);
    unApproveFeedback($feedbackId);

    header('location:admin.php?controller=feedback&action=pending');
}
