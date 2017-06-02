<?php

$search = $_GET;
var_dump($search);


$array = json_decode($_POST['data']);
echo 'Received:';
var_dump($array);



/* var_dump(array_filter($array, function($v) {
    return $v == $search;
}, ARRAY_FILTER_USE_VALUE)); */
?>

