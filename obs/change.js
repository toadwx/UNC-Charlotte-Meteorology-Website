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
	if (!Date.now) {
		Date.now = function() { return new Date().getTime(); }
	}
	var time = Math.floor(Date.now() / 1000);
	
	if (site == "VIS")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/VIS_1.gif?"+time;
					modImages[1] = "../data/sat/nc/VIS_2.gif?"+time;
					modImages[2] = "../data/sat/nc/VIS_3.gif?"+time;
					modImages[3] = "../data/sat/nc/VIS_4.gif?"+time;
					modImages[4] = "../data/sat/nc/VIS_5.gif?"+time;
					modImages[5] = "../data/sat/nc/VIS_6.gif?"+time;
					modImages[6] = "../data/sat/nc/VIS_7.gif?"+time;
					modImages[7] = "../data/sat/nc/VIS_8.gif?"+time;
					modImages[8] = "../data/sat/nc/VIS_9.gif?"+time;
					modImages[9] = "../data/sat/nc/VIS_10.gif?"+time;
					modImages[10] = "../data/sat/nc/VIS_11.gif?"+time;
					modImages[11] = "../data/sat/nc/VIS_12.gif?"+time;
					modImages[12] = "../data/sat/nc/VIS_13.gif?"+time;
					modImages[13] = "../data/sat/nc/VIS_14.gif?"+time;
					modImages[14] = "../data/sat/nc/VIS_15.gif?"+time;
					modImages[15] = "../data/sat/nc/VIS_16.gif?"+time;
					modImages[16] = "../data/sat/nc/VIS_17.gif?"+time;
					modImages[17] = "../data/sat/nc/VIS_18.gif?"+time;
					modImages[18] = "../data/sat/nc/VIS_19.gif?"+time;
					modImages[19] = "../data/sat/nc/VIS_20.gif?"+time;
		
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
	if (site == "IR")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/IR_1.gif?"+time;
					modImages[1] = "../data/sat/nc/IR_2.gif?"+time;
					modImages[2] = "../data/sat/nc/IR_3.gif?"+time;
					modImages[3] = "../data/sat/nc/IR_4.gif?"+time;
					modImages[4] = "../data/sat/nc/IR_5.gif?"+time;
					modImages[5] = "../data/sat/nc/IR_6.gif?"+time;
					modImages[6] = "../data/sat/nc/IR_7.gif?"+time;
					modImages[7] = "../data/sat/nc/IR_8.gif?"+time;
					modImages[8] = "../data/sat/nc/IR_9.gif?"+time;
					modImages[9] = "../data/sat/nc/IR_10.gif?"+time;
					modImages[10] = "../data/sat/nc/IR_11.gif?"+time;
					modImages[11] = "../data/sat/nc/IR_12.gif?"+time;
					modImages[12] = "../data/sat/nc/IR_13.gif?"+time;
					modImages[13] = "../data/sat/nc/IR_14.gif?"+time;
					modImages[14] = "../data/sat/nc/IR_15.gif?"+time;
					modImages[15] = "../data/sat/nc/IR_16.gif?"+time;
					modImages[16] = "../data/sat/nc/IR_17.gif?"+time;
					modImages[17] = "../data/sat/nc/IR_18.gif?"+time;
					modImages[18] = "../data/sat/nc/IR_19.gif?"+time;
					modImages[19] = "../data/sat/nc/IR_20.gif?"+time;
		
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
	if (site == "WV")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/WV_1.gif?"+time;
					modImages[1] = "../data/sat/nc/WV_2.gif?"+time;
					modImages[2] = "../data/sat/nc/WV_3.gif?"+time;
					modImages[3] = "../data/sat/nc/WV_4.gif?"+time;
					modImages[4] = "../data/sat/nc/WV_5.gif?"+time;
					modImages[5] = "../data/sat/nc/WV_6.gif?"+time;
					modImages[6] = "../data/sat/nc/WV_7.gif?"+time;
					modImages[7] = "../data/sat/nc/WV_8.gif?"+time;
					modImages[8] = "../data/sat/nc/WV_9.gif?"+time;
					modImages[9] = "../data/sat/nc/WV_10.gif?"+time;
					modImages[10] = "../data/sat/nc/WV_11.gif?"+time;
					modImages[11] = "../data/sat/nc/WV_12.gif?"+time;
					modImages[12] = "../data/sat/nc/WV_13.gif?"+time;
					modImages[13] = "../data/sat/nc/WV_14.gif?"+time;
					modImages[14] = "../data/sat/nc/WV_15.gif?"+time;
					modImages[15] = "../data/sat/nc/WV_16.gif?"+time;
					modImages[16] = "../data/sat/nc/WV_17.gif?"+time;
					modImages[17] = "../data/sat/nc/WV_18.gif?"+time;
					modImages[18] = "../data/sat/nc/WV_19.gif?"+time;
					modImages[19] = "../data/sat/nc/WV_20.gif?"+time;
		
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
	if (site == "DHR")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/DHR_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/DHR_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/DHR_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/DHR_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/DHR_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/DHR_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/DHR_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/DHR_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/DHR_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/DHR_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/DHR_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/DHR_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/DHR_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/DHR_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/DHR_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/DHR_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/DHR_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/DHR_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/DHR_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/DHR_20.gif?"+time;
		
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
	if (site == "VIL")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/DVL_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/DVL_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/DVL_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/DVL_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/DVL_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/DVL_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/DVL_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/DVL_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/DVL_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/DVL_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/DVL_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/DVL_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/DVL_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/DVL_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/DVL_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/DVL_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/DVL_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/DVL_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/DVL_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/DVL_20.gif?"+time;
		
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
	if (site == "EET")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/EET_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/EET_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/EET_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/EET_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/EET_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/EET_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/EET_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/EET_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/EET_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/EET_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/EET_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/EET_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/EET_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/EET_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/EET_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/EET_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/EET_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/EET_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/EET_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/EET_20.gif?"+time;
		
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
	if (site == "HHC")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/HHC_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/HHC_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/HHC_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/HHC_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/HHC_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/HHC_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/HHC_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/HHC_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/HHC_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/HHC_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/HHC_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/HHC_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/HHC_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/HHC_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/HHC_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/HHC_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/HHC_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/HHC_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/HHC_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/HHC_20.gif?"+time;
		
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
	if (site == "N0R")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/N0R_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/N0R_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/N0R_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/N0R_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/N0R_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/N0R_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/N0R_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/N0R_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/N0R_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/N0R_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/N0R_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/N0R_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/N0R_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/N0R_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/N0R_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/N0R_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/N0R_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/N0R_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/N0R_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/N0R_20.gif?"+time;
		
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
	if (site == "N1P")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/N1P_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/N1P_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/N1P_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/N1P_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/N1P_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/N1P_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/N1P_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/N1P_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/N1P_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/N1P_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/N1P_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/N1P_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/N1P_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/N1P_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/N1P_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/N1P_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/N1P_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/N1P_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/N1P_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/N1P_20.gif?"+time;
		
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
	if (site == "NTP")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/nexrad/COMP/NTP_1.gif?"+time;
					modImages[1] = "../data/nexrad/COMP/NTP_2.gif?"+time;
					modImages[2] = "../data/nexrad/COMP/NTP_3.gif?"+time;
					modImages[3] = "../data/nexrad/COMP/NTP_4.gif?"+time;
					modImages[4] = "../data/nexrad/COMP/NTP_5.gif?"+time;
					modImages[5] = "../data/nexrad/COMP/NTP_6.gif?"+time;
					modImages[6] = "../data/nexrad/COMP/NTP_7.gif?"+time;
					modImages[7] = "../data/nexrad/COMP/NTP_8.gif?"+time;
					modImages[8] = "../data/nexrad/COMP/NTP_9.gif?"+time;
					modImages[9] = "../data/nexrad/COMP/NTP_10.gif?"+time;
					modImages[10] = "../data/nexrad/COMP/NTP_11.gif?"+time;
					modImages[11] = "../data/nexrad/COMP/NTP_12.gif?"+time;
					modImages[12] = "../data/nexrad/COMP/NTP_13.gif?"+time;
					modImages[13] = "../data/nexrad/COMP/NTP_14.gif?"+time;
					modImages[14] = "../data/nexrad/COMP/NTP_15.gif?"+time;
					modImages[15] = "../data/nexrad/COMP/NTP_16.gif?"+time;
					modImages[16] = "../data/nexrad/COMP/NTP_17.gif?"+time;
					modImages[17] = "../data/nexrad/COMP/NTP_18.gif?"+time;
					modImages[18] = "../data/nexrad/COMP/NTP_19.gif?"+time;
					modImages[19] = "../data/nexrad/COMP/NTP_20.gif?"+time;
		
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
	if (site == "NAT")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_NAT.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_NAT.gif?"+time;
		
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
	if (site == "NE")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_NE.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_NE.gif?"+time;
		
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
	if (site == "SE")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_SE.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_SE.gif?"+time;
		
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
	if (site == "NC")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_NC.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_NC.gif?"+time;
		
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
	if (site == "SC")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_SC.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_SC.gif?"+time;
		
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
	if (site == "NW")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_NW.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_NW.gif?"+time;
		
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
	if (site == "SW")
	{
			first_image = 0;
				last_image = 19;
				for (var i = first_image; i <= last_image; i++)
			   {
					modImages = new Array();
					modImages[0] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[1] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[2] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[3] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[4] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[5] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[6] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[7] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[8] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[9] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[10] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[11] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[12] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[13] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[14] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[15] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[16] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[17] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[18] = "../data/sat/nc/METAR_SW.gif?"+time;
					modImages[19] = "../data/sat/nc/METAR_SW.gif?"+time;
		
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
}
