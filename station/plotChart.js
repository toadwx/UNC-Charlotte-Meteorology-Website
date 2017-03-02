var chartWidth = window.innerWidth * 0.6;
var chartHeight = window.innerHeight * 0.5;  
var optionsT = {
		width: chartWidth,
		height: chartHeight,
		backgroundColor: '#FFFFFF',
		legend:{
		textStyle:{color:'black'}
	},
	
	hAxis: {
		title: 'Time (EST)',
		baselineColor: 'black',
		textStyle:{color:'black',fontSize:'9'},
		slantedText: true,
		slantedTextAngle:45,
		titleTextStyle:{color:'black'}
	},
	   
	vAxis: {
		title: 'Temperature(F)',
		baselineColor: 'black',
		textStyle:{color:'black'},
		titleTextStyle:{color:'black'}
	},
	  
		colors: ['#FF0000', '#005F00']
	 		        
	};
var optionsP = {
	    width: chartWidth,
	    height: chartHeight,
	    backgroundColor: '#FFFFFF',
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
	   
	    vAxis: {
	      title: 'Sea Level Pressure (mb)',
	      baselineColor: 'black',
	      textStyle:{color:'black'},
	      titleTextStyle:{color:'black'}
	        },
	   
	        colors: ['#0066FF', '#007329']
	 		        
	  };	
	  
var optionsW = {
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
	      title: 'Wind Speed (mph)',
	      baselineColor: 'black',
	      textStyle:{color:'black'},
	      titleTextStyle:{color:'black'}
	        },
	   
	        colors: ['#0033CC', '#FF0000']
	 		        
	  };	
	  
var optionsS = {
	    width: chartWidth,
	    height: chartHeight,
	    legend:{
	    	textStyle:{color:'black'}
	    },
	    hAxis: {
	      title: 'Time (EST)',
	      baselineColor: 'black',
	      textStyle:{color:'black',fontSize:'9'},
	      slantedText: true,
	      slantedTextAngle:45,
	      titleTextStyle:{color:'black'}
	    },
	    backgroundColor: '#FFFFFF',
	    vAxis: {
	      0: {title: 'Solar Radiation (w/m^2)',
		      baselineColor: 'black',
		      textStyle:{color:'black'},
		      titleTextStyle:{color:'black'}
		    },
		  1: {
		  		title: 'UV Index',
		      	baselineColor: 'black',
		      	textStyle:{color:'black'},
		      	titleTextStyle:{color:'black'}
		  	}
	        },
	        series: {0: {targetAxisIndex:0},
	                 1:{targetAxisIndex:1}
	               },
	   
	        colors: ['#ffd000','#b73797']
	 		        
	  };	  
var optionsR = {
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
	     0:{ title: 'Hourly Rainfall (in)',
	      baselineColor: 'black',
	      textStyle:{color:'black'},
	      titleTextStyle:{color:'black'}
	        },
	     1:{ title: 'Accumulated Rainfall (in)',
	      baselineColor: 'black',
	      textStyle:{color:'black'},
	      titleTextStyle:{color:'black'}
	        }
	        },
	   
	        colors: ['#005F00', '#e2431e'],
	        seriesType: 'bars',
	        series: {0:{targetAxisIndex:0, type:'bars'}, 1: {targetAxisIndex:1, type:'line'}},
	        chartArea: {height: 150, width: 650} 
	 		        
	  };	
$(document).ready(function(){
	
	// Load the Visualization API and the piechart package.
	google.charts.load('current', {'packages':['corechart']});
	
	google.charts.setOnLoadCallback(drawChart); 
	

	$('#pickingForm').on('submit', function (e) {
		e.preventDefault();
	    google.charts.setOnLoadCallback(drawChart);
	});
});

function drawChart() {		
	var chartWidth = window.innerWidth * 0.6;
	var chartHeight = window.innerHeight * 0.5;  
	// Set a callback to run when the Google Visualization API is loaded.
	timeScale = $('input[name=chartTime]:checked').val();
	variable = $('input[name=chartType]:checked').val();
	jsonData = $.ajax({
		type: "POST",
		url: "getData.php",
		data: { time: timeScale, parameter: variable },
		async: false,
		dataType:"json"
	}).responseText;  
	//window.alert(jsonData);
	// Create our data table out of JSON data loaded from server.
	data = new google.visualization.DataTable(jsonData);
	
	//data.setView({'cols':[0,1,2]});
	
	// SET CHART OPTIONS BASED ON VARIABLE...
	if (variable == 'temp'){
		options = optionsT;
	}
	else if (variable == 'pres'){
		options = optionsP;
	}
	else if (variable == 'wind'){
		options = optionsW;
	}
	else if (variable == 'radi'){
		options = optionsS;
	}
	else if (variable == 'rain'){
		options = optionsR;
	}
	
	// DRAW A CHART!
	if (variable == 'rain'){
		 var chart = new google.visualization.ComboChart(document.getElementById('chartObject'));
	  	chart.draw(data, options);
	}
	else {
		var chart = new google.visualization.LineChart(document.getElementById('chartObject'));
		chart.draw(data, options);
	}  
	
}