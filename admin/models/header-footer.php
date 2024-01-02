<?php

function updateHeaderFooter()
{
    $contacts = [
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
    ];
    $contact_id = save('contacts', $contacts);
    $image_name1 = 'logo-chikoiquan-' . slug($_POST['name']);
    $config = [
        'name' => $image_name1,
        'upload_path' => 'public/img/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $image1 = upload('logo', $config); //$field = name of input
    if ($image1) {
        $contacts = [
            'id' => $contact_id,
            'link_Logo' => $image1,
        ];
        save('contacts', $contacts);
    }
    $image_name2 = 'favicon-chikoiquan-' . slug($_POST['name']);
    $config2 = [
        'name' => $image_name2,
        'upload_path' => 'public/img/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $image2 = upload('favicon', $config2); //$field = name of input
    if ($image2) {
        $contacts = [
            'id' => $contact_id,
            'favicon' => $image2,
        ];
        save('contacts', $contacts);
    }
    header('location:admin.php?controller=header-footer');
}
function updateMenuFooter()
{
    $menuFooter = [
        'id' => intval($_POST['menu_footer_id']),
        'menu_name' => escape($_POST['name']),
        'menu_url' => escape($_POST['menu_url']),
        'menu_description' => escape($_POST['menu_description']),
    ];
    save('menu_footers', $menuFooter);
    header('location:admin.php?controller=header-footer&action=listMenuFooter');
}
