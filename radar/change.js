function getRadioVal(form, name) {
    var val;
    // get list of radio buttons with specified name
    var radios = form.elements[name];
    
    // loop through list of radio buttons
    for (var i=0, len=radios.length; i<len; i++) {
        if ( radios[i].checked ) { // radio checked?
            val = radios[i].id; // if so, hold its value in val
            break; // and break out of for loop
        }
    }
    return val; // return value of checked radio or undefined if none checked
}

function changeProduct() {
	var site = getRadioVal( document.getElementById('productSelector'), 'site' );
	var prod = getRadioVal( document.getElementById('productSelector'), 'prod' );
	if (site != "CLT" && site != "RDU" && site != "ATL" && site != "BNA")
	{
		if (prod == "TR0")
		{
			prod= "N0Q";
		}
		if (prod == "TR1")
		{
			prod= "N1Q";
		}
		if (prod == "TR2")
		{
			prod= "N3Q";
		}
		if (prod == "TV0")
		{
			prod= "N0U";
		}
		if (prod == "TV1")
		{
			prod= "N1U";
		}
		if (prod == "TV2")
		{
			prod= "N3U";
		}
		if (prod == "NET")
		{
			prod= "NET";
		}
		if (prod == "N1P")
		{
			prod= "OHA";
		}
		if (prod == "DHR")
		{
			prod= "DHR";
		}
	}
	/*if (site =="CLT" || site == "RDU" || site == "ATL" || site == "BNA")
	{
		if (prod == "DHR" || prod == "N0X" || prod == "N1X" || prod == "N2X" || prod == "N0C" ||
			prod == "N1C" || prod == "N2C" || prod == "N0K" || prod == "N1K" || prod == "N2K")
		{
			prod= "TR0";
			alert("TDWR does not offer this product!");
		}
	}*/
	if (!Date.now) {
		Date.now = function() { return new Date().getTime(); }
	}
	var time = Math.floor(Date.now() / 1000);
	
	first_image = 0;
		last_image = 19;
		for (var i = first_image; i <= last_image; i++)
	   {
			modImages = new Array();
			modImages[0] = "../data/nexrad/"+site+"/"+prod+"_1.gif?"+time;
			modImages[1] = "../data/nexrad/"+site+"/"+prod+"_2.gif?"+time;
			modImages[2] = "../data/nexrad/"+site+"/"+prod+"_3.gif?"+time;
			modImages[3] = "../data/nexrad/"+site+"/"+prod+"_4.gif?"+time;
			modImages[4] = "../data/nexrad/"+site+"/"+prod+"_5.gif?"+time;
			modImages[5] = "../data/nexrad/"+site+"/"+prod+"_6.gif?"+time;
			modImages[6] = "../data/nexrad/"+site+"/"+prod+"_7.gif?"+time;
			modImages[7] = "../data/nexrad/"+site+"/"+prod+"_8.gif?"+time;
			modImages[8] = "../data/nexrad/"+site+"/"+prod+"_9.gif?"+time;
			modImages[9] = "../data/nexrad/"+site+"/"+prod+"_10.gif?"+time;
			modImages[10] = "../data/nexrad/"+site+"/"+prod+"_11.gif?"+time;
			modImages[11] = "../data/nexrad/"+site+"/"+prod+"_12.gif?"+time;
			modImages[12] = "../data/nexrad/"+site+"/"+prod+"_13.gif?"+time;
			modImages[13] = "../data/nexrad/"+site+"/"+prod+"_14.gif?"+time;
			modImages[14] = "../data/nexrad/"+site+"/"+prod+"_15.gif?"+time;
			modImages[15] = "../data/nexrad/"+site+"/"+prod+"_16.gif?"+time;
			modImages[16] = "../data/nexrad/"+site+"/"+prod+"_17.gif?"+time;
			modImages[17] = "../data/nexrad/"+site+"/"+prod+"_18.gif?"+time;
			modImages[18] = "../data/nexrad/"+site+"/"+prod+"_19.gif?"+time;
			modImages[19] = "../data/nexrad/"+site+"/"+prod+"_20.gif?"+time;

		  theImages[i-first_image] = new Image();
		  theImages[i-first_image].src = modImages[i-first_image];
		  imageNum[i-first_image] = true;
		  document.animation.src = theImages[i-first_image].src;
		  document.control_form.frame_nr.value = i;
	   }
   // this needs to be done to set the right mode when the page is manually reloaded
   change_mode (1);
   fwd();
}
