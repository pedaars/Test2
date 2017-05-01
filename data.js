/* When called the loadData() function will perform a get request to the url to retrieve the data  
The data for the page which then be displayed under the HTML table #Results. If there is an 
error an alert will be displayed */

function loadData() {
$.ajax({
        url: "orderdata",
		dataType: 'text',
        success: function (data){
			var lines = data.split('\n');
			lines.splice(0,8);
			l = lines.length -3;
			lines.splice(l,3);
			lines = lines.filter(Boolean);
			var reports = [];
			var reps = {};
			for(i in lines) {
			reps = arraySort(lines, i);
			reports.push(reps);
			}
			console.log(reports);
			var JSONText = JSON.stringify(reports);
			console.log(JSONText);
		}, 
		error: function(jqXHR, textStatus, errorThrown){
			alert('Error: ' + textStatus + ' - ' + errorThrown);
		}	
})
}


/*The searchDomain() function is called when the search button is clicked. The string that has been entered into the textbox is 
stored to var search. An ajax get request is then carried out using the url and the var search. It searches through the domain 
names for any matches removes any displayed data in the table and the textbox and then displays the results in the table.
If no results are found an alert window is shown. */

function searchDomain(reports) {
var search;
$("form").submit(function(e) {
    e.preventDefault();
	console.log('Search button clicked');
	search = $('input[name="search_value"]').val();
	console.log(search);
	$(".Results td").parent().remove();
	$('input[name="search_value"]').val('');
			
			console.log(lines);
			for(i in lines) {
			var row = $('<tr><th colspan="3">' + strDomain(lines, i) + '<br>' + '</th></tr>' 
			+ '<tr><td id="email">' + strEmail(lines, i) + '<br>' 
			+ '</td><td id="orderNo">' + orderNo(lines, i) + '<br>'
			+ '</td><td id="value">' + orderValue(lines, i) + '<br>'
			+ '</td></tr>'); 
		
			$('.Reports').append(row);
        }
	})
}


function arraySort(lines, i) {
	var sort = lines;
	var rep = {};
	rep.id = strId(lines, i);
	rep.email_address = strEmail(lines, i);
	rep.domain = strDomain(lines, i);
	rep.number_of_orders = orderNo(lines, i);
	rep.total_order_value = orderValue(lines, i);
	return rep;
}


function strDomain(lines, i) {
	if(lines[i] == null){
		return "";
	} 
	else {
		var str = lines[i];
		var splt = str.split(':');
		var domain = splt[1].split('@');
		return domain[1];
	}
}


function strId(lines, i) {
	if(lines[i] == null){
		return "";
	} 
	else {
		var str = lines[i];
		var splt = str.split(':');
		return splt[0];
	}
	
}


function strEmail(lines, i) {
	if(lines[i] == null){
		return "";
	} 
	else {
		var str = lines[i];
		var splt = str.split(':');
		return splt[1];
	}
}


function orderNo(lines, i) {
	if(lines[i] == null){
		return "";
	} 
	else {
		var str = lines[i];
		var splt = str.split(':');
		return splt[2];
	}
}


function orderValue(lines, i) {
	if(lines[i] == null){
		return "";
	} 
	else {
		var str = lines[i];
		var splt = str.split(':');
		return '£' + splt[3];
	}
}