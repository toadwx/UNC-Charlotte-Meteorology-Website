/* WEATHERFEST RADAR BEGINNER TAB
 * Author: Warren Pettee (@wpettee)
 * 
 * This script was created to provide a challenging,interactive activity for
 * WeatherFest 2016 participants.
 * 
 * The script will generate content in a 'controls' and 'content' div dynamically,
 * so the scores may roll-over between family fun.
 */

var correct = 0;
var dialog = document.getElementById("controls");

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
	document.getElementById('controls').innerHTML = '';
	document.getElementById('content').innerHTML = '';
	
	// SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("controls"); 
	var content = document.getElementById("content");
	
	var linebreak = document.createElement("br");
	
	// Make the controls box header :
	var header = document.createElement("h3");
	var text = document.createTextNode("Finding Tornadoes on Radar");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode("See the 'hook'? Tornadoes are commonly found where a clear hook is.");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Continue");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "ref_example.png";
	content.appendChild(image);
}