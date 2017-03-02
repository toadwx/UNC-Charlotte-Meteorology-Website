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
	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',part2,false);
}

function part2()
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
	var text = document.createTextNode("Click where you think the tornado is!");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "HookEx.gif";
	image.setAttribute('width','80%');
	content.appendChild(image);
	
	var iconImg = document.createElement("img");
	iconImg.id = "icon";
	iconImg.setAttribute('width','5%');
	iconImg.src = 'tornadoIcon.png';
	content.appendChild(iconImg);
	
	// Place Icon:
	var icon = document.querySelector("#icon");
	content.addEventListener("click", getClickPosition, false);
	// Listen to proceed to next step
	parametersButton.addEventListener('click',scoreHook,false);
}

function scoreHook()
{
	var score = 0;
	var msg = "You never clicked!"
	var distance = Math.sqrt( (107-clickX)*(107-clickX) + (203.5-clickY)*(203.5-clickY) );
	distance = Math.abs( distance );
	if (distance < 5)
	{
		score = 1.0
		msg = "Great Job!"
	}
	else if (distance < 10)
	{
		score = 0.90
		msg = "Very Close!"
	}
	else if (distance < 20)
	{
		score = 0.80
		msg = "Just a little off!"
	}
	else if (distance <= 30)
	{
		score = 0.70
		msg = "Not quite"
	}
	else if (distance > 30)
	{
		score = 0
		msg = "Try this again later!"
	}
	correct = correct + score;
	var icon = document.querySelector("#icon");
	var xPosition = 107;
	var yPosition = 203.5;
	icon.style.left = xPosition + "px";
    icon.style.top = yPosition + "px";
    
    document.getElementById('controls').innerHTML = '';
    
    // SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("controls"); 
    var linebreak = document.createElement("br");
	
	// Make the controls box header :
	var header = document.createElement("h3");
	var text = document.createTextNode("Finding Tornadoes on Radar");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode(msg);
	subHeading.appendChild(text);
	controls.appendChild(subHeading);    
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',velocityExample,false);
}

function velocityExample()
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
	var text = document.createTextNode("Velocity Images");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode("Velocity images tell us which way the wind is blowing inside a storm!");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "velocity_example.png";
	image.setAttribute('width','80%');
	content.appendChild(image);

	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',rotationExample,false);
}
function rotationExample()
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
	var text = document.createTextNode("Velocity Images");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode("Now look at what rotation looks like. Remember: Green is wind blowing towards the radar, red is wind blowing away.");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "rotation_example.png";
	image.setAttribute('width','80%');
	content.appendChild(image);

	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',divergenceExample,false);
}
function divergenceExample()
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
	var text = document.createTextNode("Velocity Images");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode("Not every combination of red and green is rotation though. It can also be diverging wind caused by sinking air.");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "divergence_example.png";
	image.setAttribute('width','80%');
	content.appendChild(image);

	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',convergenceExample,false);
}
function convergenceExample()
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
	var text = document.createTextNode("Velocity Images");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode("Remembering that red is wind going away from the radar and green is wind going towards the radar. This time it is convergence, or rising air.");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "convergence_example.png";
	image.setAttribute('width','80%');
	content.appendChild(image);

	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',realRotationEx,false);
}
function realRotationEx()
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
	var text = document.createTextNode("Velocity Images");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode("Click where you think the ROTATION is?");
	subHeading.appendChild(text);
	controls.appendChild(subHeading);
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	var image = document.createElement("img");
	image.id = "radarFrame";
	image.src = "velocity_example1.gif";
	image.setAttribute('width','80%');
	content.appendChild(image);
	
	var iconImg = document.createElement("img");
	iconImg.id = "icon";
	iconImg.setAttribute('width','5%');
	iconImg.src = 'rotationIcon.png';
	content.appendChild(iconImg);
	
	// Place Icon:
	var icon = document.querySelector("#icon");
	content.addEventListener("click", getClickPosition, false);
	// Listen to proceed to next step
	parametersButton.addEventListener('click',scoreRotEx,false);
}
function scoreRotEx()
{
	var score = 0;
	var msg = "You never clicked!"
	var distance = Math.sqrt( (74-clickX)*(74-clickX) + (166.5-clickY)*(166.5-clickY) );
	distance = Math.abs( distance );
	if (distance < 5)
	{
		score = 1.0
		msg = "Great Job!"
	}
	else if (distance < 10)
	{
		score = 0.90
		msg = "Very Close!"
	}
	else if (distance < 20)
	{
		score = 0.80
		msg = "Just a little off!"
	}
	else if (distance <= 30)
	{
		score = 0.70
		msg = "Not quite"
	}
	else if (distance > 30)
	{
		score = 0
		msg = "Try this again later!"
	}
	correct = correct + score;
	var icon = document.querySelector("#icon");
	var xPosition = 74;
	var yPosition = 166.5;
	icon.style.left = xPosition + "px";
    icon.style.top = yPosition + "px";
    
    document.getElementById('controls').innerHTML = '';
    
    // SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("controls"); 
    var linebreak = document.createElement("br");
	
	// Make the controls box header :
	var header = document.createElement("h3");
	var text = document.createTextNode("Finding Rotation");
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode(msg);
	subHeading.appendChild(text);
	controls.appendChild(subHeading);    
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Next");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',finalScore,false);
}
function finalScore()
{
	var score = ( correct/2 ) * 100;
	if (score >= 90)
	{
		msg = "You're a real forecaster!";
	}
	else if (score >= 80)
	{
		msg = "Great Job!";
	}
	else if (score >= 70)
	{
		msg = "A little more practice and you'll be a great forecaster!";
	}
	else if (score < 70)
	{
		msg = "Come back later and try to get a 100%";
	}
    
    document.getElementById('controls').innerHTML = '';
    document.getElementById('content').innerHTML = '';
    
    // SET DIV VARIABLES -------------------------------
	var controls = document.getElementById("controls"); 
    var linebreak = document.createElement("br");
	
	// Make the controls box header :
	var header = document.createElement("h3");
	var text = document.createTextNode("Final Score: " + score);
	header.appendChild(text);
	controls.appendChild(header);
	
	controls.appendChild(linebreak);
	
	// Make sub-heading :
	var subHeading = document.createElement("p");
	var text = document.createTextNode(msg);
	subHeading.appendChild(text);
	controls.appendChild(subHeading);    
	
	// Make the controls box content :
	var parametersButton = document.createElement("BUTTON");
	var text = document.createTextNode("Finish!");
	parametersButton.id = "continueButton";
	parametersButton.appendChild(text);
	controls.appendChild(parametersButton);
	
	// Listen to proceed to next step
	parametersButton.addEventListener('click',goHome,false);
}
function getClickPosition(e) {
    var parentPosition = getPosition(e.currentTarget);
    var xPosition = e.clientX - parentPosition.x - (icon.clientWidth / 2);
    var yPosition = e.clientY - parentPosition.y - (icon.clientHeight / 2);
     
    icon.style.left = xPosition + "px";
    icon.style.top = yPosition + "px";
    
    clickX = xPosition;
    clickY = yPosition;
}
 
// Helper function to get an element's exact position
function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
      var yScroll = el.scrollTop || document.documentElement.scrollTop;
 
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}

