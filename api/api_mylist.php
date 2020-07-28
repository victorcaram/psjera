<?php

$list_id = $_SESSION['list_id'];

$cl = curl_init();
curl_setopt($cl, CURLOPT_URL, "http://api.themoviedb.org/3/list/". $list_id. "?api_key=" . $apikey);
curl_setopt($cl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($cl, CURLOPT_HEADER, FALSE);
curl_setopt($cl, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response3 = curl_exec($cl);
curl_close($cl);
$mylist = json_decode($response3);

?>