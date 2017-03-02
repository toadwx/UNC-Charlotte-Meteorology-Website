<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="PRAGMA" content="NO-CACHE">
		<title>Weather Learning Lab</title>
		<!-- WEATHER LEARNING LAB: BEGINNERS ACTIVITY.
			Developed by Warren Pettee -->
		<link rel="stylesheet" type="text/css" href="beginner.css"/>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!-- LOADD MEE -->
		<script>
		$(window).load(function() {
		    $('#load_screen').fadeOut('slow');
		});
		</script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-54843224-1', 'auto');
			ga('require', 'displayfeatures');
			ga('send', 'pageview');
		</script>
	</head>
    
	<body>
		<div id="backgroundImg" style="position:absolute; z-index:-10;">
			<img src="../../../res/unccwxslide.png" align="middle" width="100%" height="100%">
		</div>
		<div id="load_screen">
			<div id="loading" style="text-align:center;margin-left:auto;margin-right:auto;">
				<img src="../../../src/20.gif" id="loader"><br><br><i>Connecting...</i>
			</div>
		</div>
		
		<div id="masthead">
			<h1>University of North Carolina at Charlotte</h1>
			<h2>Weather Learning Lab</h2>
		</div>
		<div id="schoolLogo">
			<p align="right">
				<a href="http://www.uncc.edu/"><img id = "school" src="http://weather.uncc.edu/src/UNCC_Crown_Logo_1c.png"  width="80%" height="80%"/></a>
			</p>
		</div>
		
		<img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Thunderstorm_in_sydney_2000x1500.png" id="slideshow" width="50%" style="float:left;"/>

		<div id="controls">
			<p style="color:#000000;font-size:2.0em;" align=center ><b>Ready to start?</b></p>
			<button type="button" onclick="return startActivity()">Let's Go!</button>
			<button type="button" onclick="return goHome()">On Second Thought...</button>
		</div>
		<script>
			var correct = 0;
			var controls = document.getElementById("controls");
			
			function goHome() 
			{
			    window.location.href = "../index.php";
			}
			function startActivity() 
			{
				var attempts = 0;
				
			    var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/7/73/Cirrus_clouds2.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q1 = ["Cumulonimbus","Cirrus","Stratus","Cumulus"];
			    
			    for(var i = 0; i < q1.length; i++){

					    // create the necessary elements
					    var pair = q1[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go)
				
				go.addEventListener('click', function() {
				    if (document.getElementById('slct1').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("This is a cirrus cloud!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q2()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts = attempts + 1;
			        };
				}, false);

		    }
			function q2()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/4/45/Big_Cumulonimbus.JPG"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Stratocumulus","Cumulus","Cumulonimbus","Stratus"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct2').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("This is a cumulonimbus cloud!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q3()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q3()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "http://freebigpictures.com/wp-content/uploads/2009/09/stratus.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Cirrus","Cumulus","Cumulonimbus","Stratus"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct3').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("Stratus clouds are what normally produce light rain showers.");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q4()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q4()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/SunArcs2011Oregon.png/220px-SunArcs2011Oregon.png"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Ice Halo","Stratus","Cumulus","Rainbow"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct0').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("Ice halos form due to the refraction of light through ice crystals!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q5()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q5()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Mammatus_clouds_in_the_Nepal_Himalayas.jpg/304px-Mammatus_clouds_in_the_Nepal_Himalayas.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Lightning","Cirrus","Cumulus", "Mammatus"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct3').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("Mammatus are commonly seen in severe thunderstorms!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q6()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q6()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/c/c0/Rainbow_02.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Thunder","Rainbow","Stratus", "Cirrus"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct1').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("Rainbows form from the refraction of light through rain.");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q7()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q7()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/4/4f/Pyrocumulus_Cloud_Station_Fire_082909.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Ice Halo","Cirrus","Pyrocumulus", "Stratus"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct2').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("Pyrocumulus clouds form near wildfires. Notice the smoke at the bottom of the cloud? That's how you can tell!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q8()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q8()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/1/1c/Lenticular_clouds_and_Mount_Hotaka_from_Mount_Otensho_1994-06-25.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Cumulonimbus","Hurricane","Cumulus", "Lenticular Cloud"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct3').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("This is a lenticular cloud! It normally means there are high winds in the sky!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q9()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q9()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/7/78/Wall_cloud_with_lightning_-_NOAA.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Cirrus","Wall Cloud","Stratus", "Blizzard"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i;
						checkbox.name = "question";      // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct1').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("This is a wall cloud, it is found in powerful thunderstorms, and sometimes makes tornadoes!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {q10()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function q10()
			{
				var attempts = 0;
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/d/da/Rolling-thunder-cloud.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Shelf Cloud","Wall Cloud","Cirrus", "Stratus"];
			    
			    for(var i = 0; i < q2.length; i++){

					    // create the necessary elements
					    var pair = q2[i]
					    
						var label= document.createElement("label");
						var description = document.createTextNode(pair);
						var checkbox = document.createElement("input");
						
						checkbox.type = "radio";    // make the element a checkbox
						checkbox.id = "slct" + i; 
						checkbox.name = "question";     // give it a name we can check on the server side
						checkbox.value = pair;         // make its value "pair"
						
						label.appendChild(checkbox);   // add the box to the element
						label.appendChild(description);// add the description to the element
						
						// add the label element to your div
						controls.appendChild(label);
						linebreak = document.createElement("br");
						controls.appendChild(linebreak);
					
				}
				
				linebreak = document.createElement("br");
				controls.appendChild(linebreak);
				
				var go = document.createElement("BUTTON");
				var text = document.createTextNode("Go!");
				go.appendChild(text);
				controls.appendChild(go);
				go.addEventListener('click', function() {
				    if (document.getElementById('slct0').checked) {
				    	
				    	if (attempts == 0) {
				    		correct = correct+5;
				    	}
				    	else if (attempts == 1) {
				    		correct = correct+4;
				    	}
				    	else if (attempts == 2) {
				    		correct = correct+3;
				    	}
				    	else if (attempts == 3) {
				    		correct = correct+2;
				    	}
				    	else if (attempts == 4){
				    		correct = correct +1;
				    	}
				    	else if (attempts >= 5){
				    		correct = correct;
				    	}
				    	
		            	document.getElementById('controls').innerHTML = '';
		            	var controls = document.getElementById("controls");
		            	 
					    // Make a header :
					    var header = document.createElement("h3");
					    var text = document.createTextNode("Correct!");
					    header.appendChild(text);
					    controls.appendChild(header);
					    
					    var paragraph = document.createElement("P");
					    var text2 = document.createTextNode("Shelf clouds are normally found on the front of strong thunderstorms!");
		            	paragraph.appendChild(text2);
		            	controls.appendChild(paragraph);
		            	
		            	var go = document.createElement("BUTTON");
						var text = document.createTextNode("Continue");
						go.appendChild(text);
						controls.appendChild(go)
						go.addEventListener('click', function() {score()}, false);
			        } else {
			        	var controls = document.getElementById("controls");
			            var wrong = document.createElement("h3");
					    var text = document.createTextNode("Not quite.. Try again!");
					    wrong.appendChild(text);
					    controls.appendChild(wrong);
					    attempts=attempts+1;
			        };
				}, false);
			}
			function score()
			{
				var score = (correct/50) * 100;
				
				var image = document.getElementById('slideshow');
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/1/1a/Dszpics1.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("Your score is: " + score + '%');
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    if (score >= 80) {
			    	// Make a header :
				    var message = document.createElement("h3");
				    var text = document.createTextNode("Wow! You're a real meteorologist!");
				    message.appendChild(text);
				    controls.appendChild(message);
			    }
			    else if (score >= 70) {
			    	// Make a header :
				    var message = document.createElement("h3");
				    var text = document.createTextNode("So close! Come back sometime and see if you can get a 100%");
				    message.appendChild(text);
				    controls.appendChild(message);
			    }
			    else if (score < 70) {
			    	// Make a header :
				    var message = document.createElement("h3");
				    var text = document.createTextNode("Come back sometime and see if you can get a 100%");
				    message.appendChild(text);
				    controls.appendChild(message);
			    }
			    var go = document.createElement("BUTTON");
				var text = document.createTextNode("Done!");
				go.onclick = function() {goHome();};
				go.appendChild(text);
				controls.appendChild(go)
				
			}
			
		</script>
	</body>
</html>