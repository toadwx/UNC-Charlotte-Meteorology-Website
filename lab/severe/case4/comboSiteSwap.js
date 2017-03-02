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
			modImages[0] = "img/TR0_1.gif";
			modImages[1] = "img/TR0_2.gif";
			modImages[2] = "img/TR0_3.gif";
			modImages[3] = "img/TR0_4.gif";
			modImages[4] = "img/TR0_5.gif";
			modImages[5] = "img/TR0_6.gif";
			modImages[6] = "img/TR0_7.gif";
			modImages[7] = "img/TR0_8.gif";
			modImages[8] = "img/TR0_9.gif";
			modImages[9] = "img/TR0_10.gif";
			modImages[10] = "img/TR0_11.gif";
			modImages[11] = "img/TR0_12.gif";
			modImages[12] = "img/TR0_13.gif";
			modImages[13] = "img/TR0_14.gif";
			modImages[14] = "img/TR0_15.gif";
			modImages[15] = "img/TR0_16.gif";
			modImages[16] = "img/TR0_17.gif";
			modImages[17] = "img/TR0_18.gif";
			modImages[18] = "img/TR0_19.gif";
			modImages[19] = "img/TR0_20.gif";
		
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
			modImages[0] = "img/TV1_1.gif";
			modImages[1] = "img/TV1_2.gif";
			modImages[2] = "img/TV1_3.gif";
			modImages[3] = "img/TV1_4.gif";
			modImages[4] = "img/TV1_5.gif";
			modImages[5] = "img/TV1_6.gif";
			modImages[6] = "img/TV1_7.gif";
			modImages[7] = "img/TV1_8.gif";
			modImages[8] = "img/TV1_9.gif";
			modImages[9] = "img/TV1_10.gif";
			modImages[10] = "img/TV1_11.gif";
			modImages[11] = "img/TV1_12.gif";
			modImages[12] = "img/TV1_13.gif";
			modImages[13] = "img/TV1_14.gif";
			modImages[14] = "img/TV1_15.gif";
			modImages[15] = "img/TV1_16.gif";
			modImages[16] = "img/TV1_17.gif";
			modImages[17] = "img/TV1_18.gif";
			modImages[18] = "img/TV1_19.gif";
			modImages[19] = "img/TV1_20.gif";
		
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
