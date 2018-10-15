<?php
// answer側のsdpをセット
// http://localhost:8000/set-answer.php?name=onojun&answer_sdp=yyyy
header("Access-Control-Allow-Origin: *");

// getの受け取り
$name = $_GET['name'];
$answer_sdp = $_GET['answer_sdp'];

// dbを読み込む
$url = "db.json";
$json = file_get_contents($url);
$arr = (array)json_decode($json, true);

// keyがあるかチェック
if (!array_key_exists($name, $arr)) {
  //エラー
  $response = array(
    "is_success" => false,
  );
  echo json_encode($response);
  return;
} else {
  // sdpを保存
  $arr[$name] = array(
    "offer_sdp" => $arr[$name]["offer_sdp"],
    "answer_sdp" => $answer_sdp
  );
  $arr = json_encode($arr);
  file_put_contents("db.json" , $arr);

  // コールバック
  $arr = array('is_success' => true);
  echo json_encode($arr);
}
