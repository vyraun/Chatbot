<?php
@$query = $_GET["q"];

$query = urlencode($query);
$data = file_get_contents("http://0.0.0.0:8080/generate?start_text==$query&n=1");
$data = json_decode($data, true);
$concept = $data["completions"][0];
$final["result"] = $concept ;

$final = json_encode($final, true);
return $final;

//print_r(json_encode($final, true));

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>
