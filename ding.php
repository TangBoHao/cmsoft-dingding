<?php
header("Content-type: text/html; charset=utf-8");
$con=$_POST['con'];
$accesstoken = curl_init();
$options = [
    CURLOPT_URL => 'https://oapi.dingtalk.com/gettoken?corpid=ding81358ad22ebe3dd135c2f4657eb6378f&corpsecret=lanUxsI1BT6WfPWpuyF9t9k58IrFQ__pUP49fO5yMz7Ss3P8kHzz-qprmuzlm4oH',
    //CURLOPT_POST => true,
   // CURLOPT_HEADER => true,
    //CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2,
    //CURLOPT_POSTFIELDS => json_encode($postData)
];

curl_setopt_array($accesstoken, $options);

$response = curl_exec($accesstoken);
$response=json_decode($response,true);
//var_dump($response);
$key=$response['access_token'];
//echo "<script>alert('$key');</script>";

$postData = [
    "touser" => "@all",
    // "toparty" => "Party",
    "msgtype" => "text",
    "agentid" => "45099300",
    "text" => [
        "content" => "$con "
    ]
];
//echo "$postData";

$ch = curl_init();
$options = [
    CURLOPT_URL => "https://oapi.dingtalk.com/message/send?access_token=$key",
    CURLOPT_POST => true,
    CURLOPT_HEADER => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_POSTFIELDS => json_encode($postData)
];

curl_setopt_array($ch, $options);

$response = curl_exec($ch);
//echo $response;
//var_dump(curl_getinfo($ch));
echo "<script>alert('发送成功');
window.location='http://www.scuec.top/cmdd';
</script>";



