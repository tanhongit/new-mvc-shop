<?php
/*
Name: 			Newsletter Subscribe
Written by: 	Okler Themes - (http://www.okler.net)
Version: 		3.7.0
*/

require_once('mailchimp/mailchimp.php');

// Step 1 - Set the apiKey - How get your Mailchimp API KEY - http://kb.mailchimp.com/article/where-can-i-find-my-api-key
$apiKey 	= '11111111111111111111111111111111-us4';

// Step 2 - Set the listId - How to get your Mailchimp LIST ID - http://kb.mailchimp.com/article/how-can-i-find-my-list-id
$listId 	= '1111111111';

// Step 3 (Optional) - Vars - More Information - http://kb.mailchimp.com/merge-tags/using/getting-started-with-merge-tags
$mergeVars  = array('FNAME'=>'');

$MailChimp = new \Drewm\MailChimp($apiKey);

$result = $MailChimp->call('lists/subscribe', array(
                'id'                => $listId,
                'email'             => array('email'=>$_POST['email']),
                'merge_vars'        => $mergeVars,
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));

if (in_array('error', $result)) {
    $arrResult = array ('response'=>'error','message'=>$result['error']);
} else {
    $arrResult = array ('response'=>'success');
}

echo json_encode($arrResult);