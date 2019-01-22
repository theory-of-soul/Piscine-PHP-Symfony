<?php
include "vendor/tcdent/php-restclient/restclient.php";

$api = new RestClient([
    'base_url' => "http://api.openweathermap.org/data/2.5"
]);
$result = $api->get("forecast", [
    'q' => "Kiev,UA",
    "units" => "metric",
    "APPID" => "f948ac8add742c52f8a7bbad8dcf1825"
]);

if($result->info->http_code == 200) {
    $newFile = fopen(__DIR__ . "/weather.txt", "w");
    fwrite($newFile, json_encode($result->decode_response()->list[1]));
    fclose($newFile);
}