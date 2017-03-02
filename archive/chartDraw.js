var chartWidth = 800;
//var chartHeight = 300;	  
var chartWidth = window.innerWidth * 0.6;
var chartHeight = window.innerHeight * 0.5;  
// Load the Visualization API and the piechart package.
google.load('visualization', '1', {'packages':['corechart']});
	  
// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawTempChart);

function drawTempChart()
{ 
	var jsonData = $.ajax({
		url: "getChartData.php",
		dataType:"json"
	}).responseText;
	      
	// Create our data table out of JSON data loaded from server.
	var Rdata = new google.visualization.DataTable(jsonData);
	
	var options = {
			width: chartWidth,
			height: chartHeight,
			legend:{
			textStyle:{color:'black'}
		},
		hAxis: {
			title: 'Time (EST)',
			baselineColor: 'black',
			textStyle:{color:'black', fontSize:'9'},
			slantedText: true,
			slantedTextAngle:45,
			titleTextStyle:{color:'black'}
		},
		backgroundColor: '#FFFFFF',
		vAxis: {
			0:{ title: 'Monthly Rainfall (in)',
				baselineColor: 'black',
				textStyle:{color:'black'},
				titleTextStyle:{color:'black'}
			},
			1:{ title: 'Average High Temperature (F)',
				baselineColor: 'black',
				textStyle:{color:'black'},
				titleTextStyle:{color:'black'}
			},
			2:{ title: 'Average Low Temperature (F)',
				baselineColor: 'black',
				textStyle:{color:'black'},
				titleTextStyle:{color:'black'}
			}
		},   
		colors: ['#005F00', '#e2431e', '#e2431e'],
		seriesType: 'bars',
		series: {0:{targetAxisIndex:0, type:'bars'}, 1: {targetAxisIndex:1, type:'line'}, 2: {targetAxisIndex:1, type:'line'}},
		chartArea: {height: 150, width: 650}         
	};
	  
	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.ComboChart(document.getElementById('Tchart_div'));
	chart.draw(Rdata, options);
}