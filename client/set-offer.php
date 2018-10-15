<?php
// offer側のsdpをセット
// http://localhost:8000/set-offer.php?name=onojun&offer_sdp=xxxx
header("Access-Control-Allow-Origin: *");

// getの受け取り
$name = $_GET['name'];
$offer_sdp = $_GET['offer_sdp'];

// dbを読み込む
$url = "db.json";
$json = file_get_contents($url);
$arr = (array)json_decode($json, true);

// sdpを保存
$arr[$name] = array(
  "offer_sdp" => $offer_sdp,
  "answer_sdp" => ""
);
$arr = json_encode($arr);
file_put_contents("db.json" , $arr);

// コールバック
$arr = array('is_success' => true);
echo json_encode($arr);
