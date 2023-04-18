<?php

permission_user();
permission_moderator();

require_once('admin/models/feedbacks.php');

$feedbackId = intval($_GET['feedback_id']);
deleteFeedback($feedbackId);

header('location:admin.php?controller=feedback');
