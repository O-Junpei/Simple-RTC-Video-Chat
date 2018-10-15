<?php
// offer側のsdpをリード
// http://localhost:8000/read-offer.php?name=onojun
header("Access-Control-Allow-Origin: *");

// getの受け取り
$name = $_GET['name'];

// dbを読み込む
$url = "db.json";
$json = file_get_contents($url);
$arr = (array)json_decode($json, true);

// keyがあるかチェック
if (array_key_exists($name, $arr)) {
    // コールバック
    $response = array(
      "is_success" => true,
      "offer_sdp" => $arr[$name]["offer_sdp"]
  );
    echo json_encode($response);
} else {
  //エラー
  $response = array(
    "is_success" => false,
  );
  echo json_encode($response);
}
