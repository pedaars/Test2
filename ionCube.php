<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>IonCube</title>

<link rel="stylesheet" type="text/css" href="cube.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body>

<h1>Order Reports</h1>
<br>

<!-- Create a text input field and a submit button that will be used to search the results for a specific Domain name -->
<div id="search">
<form method="post" id ="searchForm">
<input type="text" id="textBox" name="value" placeholder="Domain Name...">
<input type="submit" id="searchBtn" value="Search" onclick="run_query();">
</form>
</div>
<br>

<!-- Create a table. This will be used to display the data -->
<table id="Reports">
</table>
<br>

<!-- Do not load any of the below scripts untill the document has finished loading -->
<script>
function run_query() {
var search;
$("#searchForm").submit(function(e) {
    e.preventDefault();
	/* console.log('Search button clicked'); */
	search = $('input[name="value"]').val();
	/* console.log(search); */
	$('tbody').children().remove();
	
$.ajax({
    type: "POST",
	url: "phpData.php?search=" + search,
	dataType: 'json',
	success: function(data) {
	
	var newData = {};

    data.forEach(function(d) {
    var domain = d.domain;
	
    /* check if this a new domain */
    if (!newData.hasOwnProperty(domain)) {
      newData[domain] = [];
    }
    /* add entry */
    newData[domain].push(d);
  });
  
  /* get and sort domains alphabetically */
  var domains = Object.keys(newData).sort();
    
  /* build table */
  var html = '<table>';
  domains.forEach(function(domain) {
    html += '<tr><th colspan="3">' + domain + '</th></tr>';
    
    newData[domain].forEach(function(entry) {
      html += '<tr>';
      html += '<td>' + entry.email_address + '</td>';
      html += '<td>' + entry.number_of_orders + '</td>';
      html += '<td>' + '£' + entry.total_order_value + '</td>';
      html += '</tr>';
    });
    
  });
  html += '</table>';
  $('input[name="value"]').val('');
  $('#Reports').html(html);
	},	
    error: function(jqXHR, textStatus, errorThrown){
        alert('Error: ' + textStatus + ' - ' + errorThrown);
    }
})
})
}
</script>

</body>

</html>