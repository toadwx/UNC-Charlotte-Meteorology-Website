function gisButton() {
	var win = window.open('gis.html');
	if (win) {
	    //Browser has allowed it to be opened
	    win.focus();
	} else {
	    //Browser has blocked it
	    alert('Please allow popups for this website');
	}
}
function mosaicButton() {
	var win = window.open('mosaic.html');
	if (win) {
	    //Browser has allowed it to be opened
	    win.focus();
	} else {
	    //Browser has blocked it
	    alert('Please allow popups for this website');
	}
}
function matrixButton() {
	document.getElementById('Content').innerHTML = '';
	var content = document.getElementById("Content");
	
	var hazardRows = [" ","Wind", "Lightning", "Hail", "Tornado", "Precipitation","Wind Chill","Heat Index","Snow Accumulation","Ice Accumulation"," ","Temperature(F)","Chance of Precip","1hr Precip Total","Wind Gust(mph)","Wind Speed(mph)","Wind Direction"];
	var timeHazard = ["0000","0100","0200","0300","0400","0500","0600","0700","0800","0900","1000","1200","1300","1400","1500","1600","1700","1800","1900","2000","2100","2200","2300"]
	var text = "";
	var i;
	
	var table = document.createElement("table");
	
	for (i = 0; i < hazardRows.length; i++) 
	{
		var row = document.createElement("tr");
		var heading = document.createElement("th");
		var cell = document.createElement("td");
		
		var node = document.createTextNode(hazardRows[i]);
		
		heading.appendChild(node)
		row.appendChild(heading)
		
		if (i==0)
		{
			for (j=0; j < timeHazard.length; j++)
			{
				var cell = document.createElement("td");
				var nodeTime = document.createTextNode(timeHazard[j]);
				cell.appendChild(nodeTime);
				row.appendChild(cell);
			}
		}
		
		table.appendChild(row)
	}
	content.appendChild(table)
}
function shortTermButton() {
	
}
function longTermButton() {
	
}
function lightningButton() {
	
}
function precipButton() {
	
}
function contactUsButton() {
	
}
function pgenButton() {
	document.getElementById('Content').innerHTML = '';
}