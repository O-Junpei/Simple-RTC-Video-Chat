<?php

header("Access-Control-Allow-Origin: *");

$name = $_GET['name'];
$offer_sdp = $_GET['offer_sdp'];

$url = "db.json";
$json = file_get_contents($url);
$arr = (array)json_decode($json, true);

$dic = array(
    "name" => $name,
    "offer" => $offer_sdp,
    "answer" => "",
);
$arr[] = $dic;

$arr = json_encode($arr);
file_put_contents("db.json" , $arr);
