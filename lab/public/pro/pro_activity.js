/* WEATHERFEST PRO TAB
 * Author: Warren Pettee (@wpettee)
 * 
 * This script was created to provide a challenging,interactive activity for
 * WeatherFest 2016 participants.
 * 
 * The script will generate content in a 'controls' and 'content' div dynamically,
 * so the scores may roll-over between family fun.
 */

var correct = 0;
var controls = document.getElementById("controls");
var radarPath = '../../severe/case1/img/TR0_';

var clickX = 0;
var clickY = 0;
	
function goHome() 
{
	// Return to 'Make the Call' Menu
	window.location.href = "../index.php";
}

function startActivity() 
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('dialog').innerHTML = '';
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("dialog"); 
	var content = document.getElementById("content");
	
	var linebreak = document.createElement("br");
	
	var WFO_Counties = ['Mecklenburg','Cabarrus','Gaston'];
	
	createWatchControlBox(WFO_Counties);
	parametersTab();
	
	tab1 = document.getElementById('parametersToggle');
	tab2 = document.getElementById('upperAirToggle');
	tab3 = document.getElementById('satelliteToggle');
	tab4 = document.getElementById('wfoToggle');
	submitButton = document.getElementById('submitButton');
	
	tab1.addEventListener('click',parametersTab,false);
	tab2.addEventListener('click',upperAirTab,false);
	tab3.addEventListener('click',satelliteTab,false);
	tab4.addEventListener('click',wfoTab,false);
	submitButton.addEventListener('click',saveWatchScore,false);
	
}

function createWatchControlBox(counties)
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('dialog').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("dialog");
	
	var linebreak = document.createElement("br");
	
	// CREATE CONTROLS BOX -----------------------------
	
	// Make the controls box header :
	var header = document.createElement("h3");
	var text = document.createTextNode("Severe Weather Forecasting");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("h4");
	var text = document.createTextNode("Forecast Data");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Parameters");
	parametersButton.id = "parametersToggle";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var upperAirButton = document.createElement("BUTTON");
	var text = document.createTextNode("Upper-Air");
	upperAirButton.id = "upperAirToggle";
	upperAirButton.appendChild(text);
	controls.appendChild(upperAirButton);
	
	var satelliteButton = document.createElement("BUTTON");
	var text = document.createTextNode("Satellite/Radar");
	satelliteButton.id = "satelliteToggle";
	satelliteButton.appendChild(text);
	controls.appendChild(satelliteButton);
	
	var warnGenButton = document.createElement("BUTTON");
	var text = document.createTextNode("WFO");
	warnGenButton.id = "wfoToggle";
	warnGenButton.appendChild(text);
	controls.appendChild(warnGenButton);
	
	controls.appendChild(linebreak);
	
	// Severe Thunderstorm Watches:	
	// Make sub-heading :
	var subHeading = document.createElement("h4");
	var text = document.createTextNode("Severe Thunderstorm Watch");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make county list :
	var countyList = document.createElement("select");
	countyList.id = "countiesSev";
	countyList.setAttribute("size","10")
	controls.appendChild(countyList);
	document.getElementById("countiesSev").multiple = true;
	
	for(i=0;i<counties.length;i++){
		countyList.options[countyList.options.length] = new Option(counties[i]);
	}
	
	var subHeading = document.createElement("h5");
	var text = document.createTextNode("Conditions");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the warning statements :
	var hail1 = document.createElement('input');
	hail1.type = "checkbox";
	hail1.name = "hail1";
	hail1.value = "hail1";
	hail1.id = "hail1";
	
	var label = document.createElement('label')
	label.htmlFor = "hail1";
	label.appendChild(document.createTextNode('Hail > 1 in'));
	
	controls.appendChild(hail1);
	controls.appendChild(label);
	
	controls.appendChild(linebreak);
	
	var winds = document.createElement('input');
	winds.type = "checkbox";
	winds.name = "winds";
	winds.value = "winds";
	winds.id = "winds";
	
	var label = document.createElement('label')
	label.htmlFor = "winds";
	label.appendChild(document.createTextNode('Winds > 55 mph'));
	
	controls.appendChild(winds);
	controls.appendChild(label);
	
	// Tornado Watches:
	// Make sub-heading :
	var subHeading = document.createElement("h4");
	var text = document.createTextNode("Tornado Watch");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make county list :
	var countyList = document.createElement("select");
	countyList.id = "countiesTor";
	countyList.setAttribute("size","10")
	controls.appendChild(countyList);
	document.getElementById("countiesTor").multiple = true;
	
	for(i=0;i<counties.length;i++){
		countyList.options[countyList.options.length] = new Option(counties[i]);
	}
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("h4");
	var text = document.createTextNode("");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	var submitButton = document.createElement("BUTTON");
	var text = document.createTextNode("Submit Forecast");
	submitButton.id = "submitButton";
	submitButton.appendChild(text);
	controls.appendChild(submitButton);

}

function parametersTab()
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var content = document.getElementById("content");
	
	var parametersImg = document.createElement("iframe");
	parametersImg.src = "http://www.spc.noaa.gov/exper/archive/looper.php?date=20130531&type=rad";
	content.appendChild(parametersImg);
}

function upperAirTab()
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var content = document.getElementById("content");
	
	var parametersImg = document.createElement("img");
	parametersImg.src = "http://www.spc.noaa.gov/obswx/maps/925_130531_12.gif";
	content.appendChild(parametersImg);
}

function satelliteTab()
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var content = document.getElementById("content");
	
	var parametersImg = document.createElement("iframe");
	parametersImg.src = "http://www.spc.noaa.gov/exper/archive/looper.php?date=20130531&type=rad";
	content.appendChild(parametersImg);
}

function wfoTab()
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var content = document.getElementById("content");
	
	var parametersImg = document.createElement("iframe");
	parametersImg.src = "http://www.spc.noaa.gov/exper/archive/looper.php?date=20130531&type=rad";
	content.appendChild(parametersImg);
}

function saveWatchScore()
{
	mainRadar();
}

function mainRadar()
{
	// CLEAR DIVS --------------------------------------
	document.getElementById('dialog').innerHTML = '';
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("dialog"); 
	var content = document.getElementById("content");
	var canvas = document.getElementById("warnSpace");
	var linebreak = document.createElement("br");
	var d;
	var torPoints = [[10,10],[100,100],[150,150],[120,120]];
	// Create Control Box:
	createRadarControlBox();
	createRadarLoop();
	
	// Button Event Handlers:
	reflToggle = document.getElementById("reflToggle");
	velToggle = document.getElementById("velToggle"); 
	tornPolyToggle = document.getElementById("tornadoWarningPolygonToggle"); 
	strmPolyToggle = document.getElementById("severeWarningPolygonToggle"); 
	floodPolyToggle = document.getElementById("floodWarningPolygonToggle"); 
	 
	reflToggle.addEventListener('click',function() {radarPath='../../severe/case1/img/TR0_'},false);
	velToggle.addEventListener('click',function() {radarPath='../../severe/case1/img/TV0_'},false);
	tornPolyToggle.addEventListener('click',function(){},false);
	strmPolyToggle.addEventListener('click',drawPolygon,false);
	floodPolyToggle.addEventListener('click',drawPolygon,false);
	
}

function createRadarControlBox()
{
	// CREATE CONTROLS BOX -----------------------------
	document.getElementById('dialog').innerHTML = '';
	
	// SET VARIABLES -----------------------------------
	var controls = document.getElementById("dialog"); 
	var linebreak = document.createElement("br");
	
	// Make the controls box header :
	var header = document.createElement("h3");
	var text = document.createTextNode("WFO Radar Terminal");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	var subHeading = document.createElement("h4");
	var text = document.createTextNode("NEXRAD Products:");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	var reflectButton = document.createElement("BUTTON");
	var text = document.createTextNode("Reflectivity");
	reflectButton.id = "reflToggle";
	reflectButton.style.backgroundColor = "red";
	reflectButton.appendChild(text);
	controls.appendChild(reflectButton);
	
	var velocityButton = document.createElement("BUTTON");
	var text = document.createTextNode("Velocity");
	velocityButton.id = "velToggle";
	velocityButton.style.backgroundColor = "red";
	velocityButton.appendChild(text);
	controls.appendChild(velocityButton);
		
	var subHeading = document.createElement("h4");
	var text = document.createTextNode("Warning Polygons:");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var tornadoWarningButton = document.createElement("BUTTON");
	var text = document.createTextNode("Tornado");
	tornadoWarningButton.id = "tornadoWarningPolygonToggle";
	tornadoWarningButton.className = 'button';
	tornadoWarningButton.style.backgroundColor = "red";
	tornadoWarningButton.appendChild(text);
	controls.appendChild(tornadoWarningButton);
	
	var severeWarningButton = document.createElement("BUTTON");
	var text = document.createTextNode("Severe TS");
	severeWarningButton.id = "severeWarningPolygonToggle";
	severeWarningButton.className = "button";
	severeWarningButton.style.backgroundColor = "yellow";
	severeWarningButton.style.color = "black";
	severeWarningButton.appendChild(text);
	controls.appendChild(severeWarningButton);
		
	var floodWarningButton = document.createElement("BUTTON");
	var text = document.createTextNode("Flash Flood");
	floodWarningButton.id = "floodWarningPolygonToggle";
	floodWarningButton.className = "button";
	floodWarningButton.appendChild(text);
	floodWarningButton.style.backgroundColor = "green"
	controls.appendChild(floodWarningButton);
	
	// Instructions:
	//var instruct = document.createElement("P");
	//var text = document.createTextNode("Instructions:</b> Verification will be based on storm reports and storm track. Any tornado warned storm should not also be warned as a severe thunderstorm unless there will also be wind or hail reports.");
	//instruct.appendChild(text);
	//controls.appendChild(instruct);
}

function createRadarLoop()
{
	document.getElementById('content').innerHTML = '';
	// SET DIV VARIABLES -------------------------------
	var content = document.getElementById("content");
	
	var radarImg = document.createElement("img");
	radarImg.src = "";
	radarImg.id = "rotator";
	//radarImg.width = "90%";
	radarImg.style.position = 'absolute';
	radarImg.style.left = '0px';
	radarImg.style.top = '0px';
	radarImg.style.width = '1280px';
	radarImg.style.height = '1024px';
	radarImg.style.zIndex = '10';
	content.appendChild(radarImg);
	
	var canvas = document.createElement("canvas");
	canvas.id = "warnSpace";
	canvas.style.zIndex = "20";
	canvas.style.position = "absolute";
	canvas.style.left = "0px";
	canvas.style.top = "0px";
	canvas.style.width = '1280px';
	canvas.style.height = '1024px';
	canvas.setAttribute('width','100%');
	//canvas.width = "90%";
	//canvas.length = "90%";
	content.appendChild(canvas);
	
	imageLooper(42,74)
}

function imageLooper(start,end)
{
	rotator = document.getElementById('rotator'), //get the element
	delayInSeconds = 0.5,                           //delay in seconds
	num = start,                                      //start number
	len = end - start;                                      //limit
	setInterval(function(){                           //interval changer
			if (num > end)
			{
				num = start
			};                //reset if limit reached
			rotator.src = radarPath + num + '.gif';                     //change picture
			num++;                                        //increment counter
		},delayInSeconds * 1000);
}
function drawPolygon(type)
{
	
	canvas = document.getElementId('warnSpace');
	ctx = canvas.getContext('2d');
	
	canvas.addEventListener('click',makePoint,false);
}

