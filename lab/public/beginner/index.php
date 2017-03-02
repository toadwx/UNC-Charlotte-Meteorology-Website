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
			<img src="../../res/unccwxslide.png" align="middle" width="100%" height="100%">
		</div>
		<div id="load_screen">
			<div id="loading" style="text-align:center;margin-left:auto;margin-right:auto;">
				<img src="../../src/20.gif" id="loader"><br><br><i>Connecting...</i>
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
			    image.src = "http://www.noaanews.noaa.gov/stories2005/images/ivan091504-1515z.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q1 = ["Mid-Latitude Cyclone","Hurricane","Flood","Tornado"];
			    
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
					    var text2 = document.createTextNode("That's right, hurricanes have a unique 'eye' in the center. They form in the tropics, but they cannot cross the equator because they depend on the coriolis effect. They rotate counter-clockwise in the Northern Hemisphere, and clockwise in the Southern Hemisphere.");
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
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/1/1a/Dszpics1.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Blizzard","Flood","Tornado","Scud Cloud"];
			    
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
					    var text2 = document.createTextNode("Tornadoes form inside of severe thunderstorms, they are very dangerous! They have been known to have winds so strong that pieces of straw have gone through telephone poles!!!");
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
			    image.src = "https://img.washingtonpost.com/rf/image_1484w/WashingtonPost/Content/Blogs/capital-weather-gang/201206/images/scud.jpg?uuid=Po6xfLA_EeGArNq3bQ53wA"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Blizzard","Flood","Tornado","Scud Cloud"];
			    
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
					    var text2 = document.createTextNode("Scud clouds can look just like tornadoes, but tornadoes rotate and create a cloud of debris on the ground.");
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
			    image.src = "http://eoimages.gsfc.nasa.gov/images/imagerecords/52000/52297/eastcoast_amo_2011269.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Mid-Latitude Cyclone","Hurricane","Tornado","Flood"];
			    
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
					    var text2 = document.createTextNode("Mid-latitude cyclones form in the mid-latitudes of the planet. When an area of low pressure forms, fronts will also be created. A cold front will extend far from the center, and will sometimes create thunderstorms! Mid-latitude cyclones affect us the most in the fall, winter, and spring.");
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
			    image.src = "https://www.weather.gov/images/bmx/Daily/microbursts/animation.gif"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Lightning","Thunderstorm","Tornado", "Microburst"];
			    
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
					    var text2 = document.createTextNode("Microbursts are created when a thunderstorm has so much rain and ice inside of it that the rising air cannot hold the precipitation up anymore. All of the rain and ice comes falling to the ground at once, causing very high wind speeds and even pulling planes out of the sky! Microbursts create damage that looks a lot like a tornado damaged an area, but a trained meteorologist can tell the difference between tornado damage and straight line winds like those of a microburst!");
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
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/e/eb/Staccoto_Lightning.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Thunder","Lightning","Tornado", "Snow"];
			    
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
					    var text2 = document.createTextNode("This is a lightning bolt! Lightning is hotter than the surface of the sun, and heats the air around it so much that the air around the bolt rapidly expands and then collapses, creating thunder! Remember: when thunder roars, go indoors! Lightning can strike up to 20 miles away from a thunderstorm, it is always safest to wait 20 minutes after the last roar of thunder before playing outside again!");
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
			    image.src = "https://www.mesacc.edu/sites/default/files/pages/section/academic-departments/cultural-science/meteorology/images/haboob-pielage.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Thunderstorm","Hurricane","Haboob", "Blizzard"];
			    
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
					    var text2 = document.createTextNode("This is a haboob! Hoboobs are common in dry parts of the world, they are created when strong winds pick up dust. The resulting dust storm can last for hours!");
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
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/a/a8/Nearwhiteoutinminnesota.JPG"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Thunderstorm","Hurricane","Haboob", "Blizzard"];
			    
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
					    var text2 = document.createTextNode("This is a blizzard! A blizzard is a snow storm with high winds! The winds make it very hard to see, and also make it easier for someone to get frostbite if they don't bundle up!");
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
			    image.src = "https://upload.wikimedia.org/wikipedia/commons/2/20/Chaparral_Supercell_2.JPG"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Thunderstorm","Hurricane","Haboob", "Blizzard"];
			    
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
					    var text2 = document.createTextNode("This is a thunderstorm! Thunderstorms have thunder, lightning, and rain. Severe thunderstorms can have hail, high winds, and sometimes tornadoes!");
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
			    image.src = "http://www.cocorahs.org/media/images/stone6_7102002.jpg"
			    
			    document.getElementById('controls').innerHTML = '';
			    var controls = document.getElementById("controls")
			    // Make a header :
			    var header = document.createElement("h3");
			    var text = document.createTextNode("What is this?");
			    header.appendChild(text);
			    controls.appendChild(header);
			    
			    var q2 = ["Hail","Sleet","Rain", "Snow"];
			    
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
					    var text2 = document.createTextNode("This is Hail! Hail only comes from thunderstorms, see how it looks like a lumpy snowcone? Hail can come in many shapes and sizes, even as big as basketballs! Don't mistake sleet for hail. Sleet happens in the wintertime when there is no thunderstorms, and looks like very small ice pellets.");
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