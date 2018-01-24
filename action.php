<?php
function sendMessage($parameters)
{
    header('Content-Type: application/json');
    //      print_r($parameters);
    echo json_encode($parameters);
}
$post      = file_get_contents("php://input");
$post_data = json_decode($post, True);
error_log($post, 0);

if (isset($post_data["result"]["action"])) {
    $url        = "http://rathankalluri.com/lab/fetch.php?getdetails";
    $speak      = file_get_contents($url);
    error_log($speak, 0);
    $data = json_decode($speak, true);
    //$speak      = substr($speak, 0, strpos($speak, "(c)"));  
}     

$src = "agent";

$parameters = array(
    "source" => $src,
    "speech" => $data,
    "displayText" => $data,
    "contextOut" => []
);
sendMessage($parameters);
?>
