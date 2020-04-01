<?php
permission_user();
if (!empty($_POST)) {
    $contacts = array(
        'id' => intval($_POST['contact_id']),
        'contact_name' => escape($_POST['name']),
        'address' => escape($_POST['address']),
        'country' => escape($_POST['country']),
        'phone' => escape($_POST['phone']),
        'phone_2' => escape($_POST['phone_2']),
        'email' => escape($_POST['email']),
        'link_Contact' => escape($_POST['link_Contact']),
        'link_Facebook' => escape($_POST['link_Facebook']),
        'link_Twitter' => escape($_POST['link_Twitter']),
        'link_linkedin' => escape($_POST['link_linkedin']),
        'zalo' => escape($_POST['zalo']),
        'link_about' => escape($_POST['link_about']),
        'about_footer' => escape($_POST['about_footer']),
    );
    $contact_id = save('contacts', $contacts);
    $image_name1 = 'logo-chikoiquan-' . slug($_POST['name']);
    $config = array(
        'name' => $image_name1,
        'upload_path' => 'public/img/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('logo', $config);//$field = name of input 
    if ($image1) {
        $contacts = array(
            'id' => $contact_id,
            'link_Logo' => $image1
        );
        save('contacts', $contacts);
    }
    header('location:admin.php?controller=header-footer');
}
$title = 'Sửa header footer website';
$contact = get_a_record('contacts', 1);
require('admin/views/header-footer/index.php');
