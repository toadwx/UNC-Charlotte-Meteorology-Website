/**
 * @author Warren
 */
$(function() 
  {
  	function liveStn()
  	{
	    //-----------------------------------------------------------------------
	    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
	    //-----------------------------------------------------------------------
	    $.ajax({   
	      cache: false,                                   
	      url: 'liveData.php',                  //the script to call to get data          
	      data: "",                        //you can insert url argumnets here to pass to api.php , for example "id=5&parent=6"
	      async: false,                    //Async runs request in background. Allows the refresh to happen.
	      loadonce: false,
	      dataType: 'json',                //data format      
	      success: function(data)          //on recieve of reply
	      {
	        var dateTime = data[0];                       
	        var outTemp = data[7];
	        var RH = data[9];
	        var wndspd = data [10];
	        var wnddir = data[11];
	        var rainRate = data[14];
	        var dewpoint = data[16];
	        var wndchl = data[17];
	        var htindx = data[18];
	        var UV = data[21];
	        
	        var outTemp = parseFloat(outTemp).toFixed(2);
	        var wndchl = parseFloat(wndchl).toFixed(2);
	        var htindx = parseFloat(htindx).toFixed(2);
	        var dewpoint = parseFloat(dewpoint).toFixed(2);
	        var RH = parseFloat(RH).toFixed(2);
	        var wndspd = parseFloat(wndspd).toFixed(2);
	        var wnddir = parseFloat(wnddir).toFixed(0);
	        var rainRate = parseFloat(rainRate).toFixed(2);
	        var UV = parseFloat(UV).toFixed(1);
	        
	        var temp = (outTemp + 459) * (5/9);
	        var dewp = (dewpoint + 459) * (5/9);
	        	       
	        //--------------------------------------------------------------------
	        // 3) Update html content
	        //--------------------------------------------------------------------
	        document.getElementById("dattim").innerHTML = dateTime;
	        document.getElementById("T").innerHTML = outTemp + "&#176;F";
	        if(outTemp < 60)
	        {
	        	document.getElementById("HI").innerHTML = wndchl + "&#176;F";
	        }
	        if(outTemp >= 60)
	        {
	        	document.getElementById("HI").innerHTML = htindx + "&#176;F";
	        }
	        document.getElementById("Td").innerHTML = dewpoint + "&#176;F";
	        document.getElementById("RH").innerHTML = RH + "%";
	        document.getElementById("w").innerHTML = wndspd + " mph from " + wnddir;
	        document.getElementById("rr").innerHTML = rainRate + " in/hr";
	        document.getElementById("UV").innerHTML = UV ;
	        
	        //alert(data[0]); // DEBUG
	       
	       
	      } 
	    });
	   }
	   		
	   liveStn();	   
  	  
});
