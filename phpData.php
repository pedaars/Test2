<?php

/* retrieves the orderdata file for processing */
$data = file_get_contents('orderdata');
/* echo $data; */

/* creates an array using each line as an element */
$lines = explode("\n", $data);

/* removes the first 7 array elements */
array_splice($lines, 0, 8);
/* var_dump($lines); */

/* removes the last 3 array elements  */
array_splice($lines, -3);
/* var_dump($lines); */

/* removes all NULL, FALSE and Empty Strings but leaves 0 (zero) values */
$lines = array_values(array_filter($lines, 'strlen'));

/* builds multidimensional array from the $lines array using the specified keys */
function arraySort($lines ,$i) {
	$value = $lines[$i];
	$keys = array('id', 'email_address', 'number_of_orders', 'total_order_value');
	
/* combines the array keys and values together trim used to remove whitespaces from the values */
	$fused = array_combine($keys, array_map('trim', array_filter(explode(':', $value))));
	$value = strDomain($lines, $i);
	$fused['domain'] = "$value";
	
	return $fused;
}

/* creates the values for the domain key */
function strDomain($lines, $i) {
	if($lines[$i] == null){
		return "";
	} 
	else {
		$str = $lines[$i];
		$splt = explode(':', $str);
		$domain = explode('@', $splt[1]);
		$domain[1] = str_replace(' ', '', $domain[1]);
		return $domain[1];
	}
}

/* uses arraySort to build the $reports array */
$reports = array();
$reps = array();
for($i = 0, $length = count($lines); $i < $length; ++$i) {
	$reps = arraySort($lines, $i);
	array_push($reports, $reps);
}

/* the domain name value used to search the array */
$search = $_GET['search'];
/* var_dump($search); */

if ($search!=null) {

/* filters the array to leave the elements that match the search value */
$filteredArray = 
array_filter($reports, function($element) use($search){
  return isset($element['domain']) && $element['domain'] == $search;
});

/* re indexes the array correctly */
$filtered = array_values($filteredArray);

/* sorts the array alphabetically descending using the domain key value */
array_multisort(array_column($filtered, 'domain'), SORT_DESC, $filtered);

$result = $filtered;
}

/* enables the display of all domains when the search value is equal to null */
else {
	$result = $reports;
} 

/* returns the results encoded as JSON */
echo json_encode($result);

?>