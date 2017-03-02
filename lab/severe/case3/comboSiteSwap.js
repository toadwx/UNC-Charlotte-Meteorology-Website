/*
Double Combo Script Credit
By JavaScript Kit (www.javascriptkit.com)
Over 200+ free JavaScripts here!
*/

function changeProductTR0(){
	//var location=temp.options[temp.selectedIndex].value
	//img = document.getElementById("radarImage");
	//img.setAttribute('src', location);
		first_image = 0;
		last_image = 32;
		for (var i = first_image; i <= last_image; i++)
	   {
			modImages = new Array();
			modImages[0] = "img/TR1_5.gif";
			modImages[1] = "img/TR1_6.gif";
			modImages[2] = "img/TR1_7.gif";
			modImages[3] = "img/TR1_8.gif";
			modImages[4] = "img/TR1_9.gif";
			modImages[5] = "img/TR1_10.gif";
			modImages[6] = "img/TR1_11.gif";
			modImages[7] = "img/TR1_12.gif";
			modImages[8] = "img/TR1_13.gif";
			modImages[9] = "img/TR1_14.gif";
			modImages[10] = "img/TR1_15.gif";
			modImages[11] = "img/TR1_16.gif";
			modImages[12] = "img/TR1_17.gif";
			modImages[13] = "img/TR1_18.gif";
			modImages[14] = "img/TR1_19.gif";
			modImages[15] = "img/TR1_20.gif";
			modImages[16] = "img/TR1_21.gif";
			modImages[17] = "img/TR1_22.gif";
			modImages[18] = "img/TR1_23.gif";
			modImages[19] = "img/TR1_24.gif";
			modImages[20] = "img/TR1_25.gif";
			modImages[21] = "img/TR1_26.gif";
			modImages[22] = "img/TR1_27.gif";
			modImages[23] = "img/TR1_28.gif";
			modImages[24] = "img/TR1_29.gif";
			modImages[25] = "img/TR1_30.gif";
		
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
function changeProductTV0(){
	//var location=temp.options[temp.selectedIndex].value
	//img = document.getElementById("radarImage");
	//img.setAttribute('src', location);
		first_image = 0;
		last_image = 32;
		for (var i = first_image; i <= last_image; i++)
	   {
			modImages = new Array();
			modImages[0] = "img/TV1_5.gif";
			modImages[1] = "img/TV1_6.gif";
			modImages[2] = "img/TV1_7.gif";
			modImages[3] = "img/TV1_8.gif";
			modImages[4] = "img/TV1_9.gif";
			modImages[5] = "img/TV1_10.gif";
			modImages[6] = "img/TV1_11.gif";
			modImages[7] = "img/TV1_12.gif";
			modImages[8] = "img/TV1_13.gif";
			modImages[9] = "img/TV1_14.gif";
			modImages[10] = "img/TV1_15.gif";
			modImages[11] = "img/TV1_16.gif";
			modImages[12] = "img/TV1_17.gif";
			modImages[13] = "img/TV1_18.gif";
			modImages[14] = "img/TV1_19.gif";
			modImages[15] = "img/TV1_20.gif";
			modImages[16] = "img/TV1_21.gif";
			modImages[17] = "img/TV1_22.gif";
			modImages[18] = "img/TV1_23.gif";
			modImages[19] = "img/TV1_24.gif";
			modImages[20] = "img/TV1_25.gif";
			modImages[21] = "img/TV1_26.gif";
			modImages[22] = "img/TV1_27.gif";
			modImages[23] = "img/TV1_28.gif";
			modImages[24] = "img/TV1_29.gif";
			modImages[25] = "img/TV1_30.gif";
		
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
