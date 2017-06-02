<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>IonCube</title>

<link rel="stylesheet" type="text/css" href="cube.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="data.js" type="text/javascript"></script>

</head>

<body>

<h1>Order Reports</h1>
<br>

<!-- Create a table. This will be used to display the data -->
<table class="Reports">
</table>
<br>

<!-- Create a text input field and a submit button that will be used to search the results for a specific Domain name -->
<div id="search">
<form action="search.php" method="get">
<input type="text" id="textBox" name="search_value" placeholder="Domain Name...">
<input type="submit" id="searchBtn" value="Search">
</form>
</div>
<br>

<!-- Do not load any of the below scripts untill the document has finished loading -->
<script>
$(document).ready(function() {
loadData();
/* searchDomain(); */
});
</script>


</body>

</html>