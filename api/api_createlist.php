<?php

$ccl = curl_init();

$data = array(
    "name" => $email,
    "description" => "teste3",
    "language"=> "en"
);
$payload = json_encode($data);
curl_setopt($ccl, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ccl, CURLOPT_URL, "http://api.themoviedb.org/3/list?api_key=".$apikey."&session_id=".$session_id);
curl_setopt($ccl, CURLOPT_HEADER, FALSE);
curl_setopt($ccl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ccl, CURLOPT_RETURNTRANSFER, TRUE);
$response4 = curl_exec($ccl);
curl_close($ccl);
$createlist = json_decode($response4);

?>