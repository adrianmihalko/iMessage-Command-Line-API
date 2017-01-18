<?php

//TEST: http://localhost/imessage.php?message=TEST

//message
$message = $_GET["message"];

// +421xxx international format
$tel = $_GET["telephone"];


/* generate reqUID */
function random() {
  return (float)rand()/(float)getrandmax();
}

$random = "0000".(random()*pow(36,4) << 0);
$yo = base_convert($random, 10, 36);
$reqUID = substr($yo, -4);
echo $reqUID;

/******************/

//Quick example to send hello:
//hashid = TELEPHONE NUMBER
//recipients = empty
//file-name = empty
//text = text

$post_data = array(
    'hashid' => $tel,
    'reqUID' => $reqUID,
    'recipients' => '',
    'file-name' => '',
    'text' => $message,
);

$url = 'http://192.168.1.16:333/sendMessage.srv';
$curl = curl_init();
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data); 

$response = curl_exec($curl);

print($response);

?>