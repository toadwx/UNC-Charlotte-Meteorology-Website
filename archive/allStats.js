$(function () 
  {
  	function getStats() 
  	{
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
      cache: false,                                      
      url: 'allStats.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php                                //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
      	
        var hiTimeYR = data[0];
        var hiYR = data[1];
        var loTimeYR = data[2];
        var loYR = data[3];
        var hiTime6M = data[4];
        var hi6M = data[5];
        var loTime6M = data[6];
        var lo6M = data[7];
        var hiTime3D = data[8];
        var hi3D = data[9];
        var loTime3D = data[10];
        var lo3D = data[11];
        var hiTimeWK = data[12];
        var hiWK = data[13];
        var loTimeWK = data[14];
        var loWK = data[15];
        
        var rainYR = data[16];
        var rain6M = data[17];
        var rain3D = data[18];
        var rainWK = data[19];
        
        var hiWndTimeYR = data[20];
        var hiWndYR = data[21];
        var hiWndTime6M = data[22];
        var hiWnd6M = data[23];
        var hiWndTime3D = data[24];
        var hiWnd3D = data[25];
        var hiWndTimeWK = data[26];
        var hiWndWK = data[27];
        
        // Note In. Hg. to mb conversion
        var hiPresTimeYR = data[28];
        var hiPresYR = data[29] * 33.8637526;
        var hiPresTime6M = data[30];
        var hiPres6M = data[31] * 33.8637526;
        var hiPresTime3D = data[32];
        var hiPres3D = data[33] * 33.8637526;
        var hiPresTimeWK = data[34];
        var hiPresWK = data[35] * 33.8637526;
        var loPresTimeYR = data[36];
        var loPresYR = data[37] * 33.8637526;
        var loPresTime6M = data[38];
        var loPres6M = data[39] * 33.8637526;
        var loPresTime3D = data[40];
        var loPres3D = data[41] * 33.8637526;
        var loPresTimeWK = data[42];
        var loPresWK = data[43] * 33.8637526;
        
        //var hiPresYR = hiPresYR * 33.8637526;
        //var loPresYR = loPresYR * 33.8637526;
        
        var hiYR = parseFloat(hiYR).toFixed(2);
        var loYR = parseFloat(loYR).toFixed(2);
        var hi6M = parseFloat(hi6M).toFixed(2);
        var lo6M = parseFloat(lo6M).toFixed(2);
        var hi3D = parseFloat(hi3D).toFixed(2);
        var lo3D = parseFloat(lo3D).toFixed(2);
        var hiWK = parseFloat(hiWK).toFixed(2);
        var loWK = parseFloat(loWK).toFixed(2);
        
        var rainYR = parseFloat(rainYR).toFixed(2);
        var rain6M = parseFloat(rain6M).toFixed(2);
        var rain3D = parseFloat(rain3D).toFixed(2);
        var rainWK = parseFloat(rainWK).toFixed(2);
        
        var hiWndYR = parseFloat(hiWndYR).toFixed(2);
        var hiWnd6M = parseFloat(hiWnd6M).toFixed(2);
        var hiWnd3D = parseFloat(hiWnd3D).toFixed(2);
        var hiWndWK = parseFloat(hiWndWK).toFixed(2);
               
        var hiPresYR = parseFloat(hiPresYR).toFixed(2);
        var hiPres6M = parseFloat(hiPres6M).toFixed(2);
        var hiPres3D = parseFloat(hiPres3D).toFixed(2);
        var hiPresWK = parseFloat(hiPresWK).toFixed(2);
        
        var loPresYR = parseFloat(loPresYR).toFixed(2);
        var loPres6M = parseFloat(loPres6M).toFixed(2);
        var loPres3D = parseFloat(loPres3D).toFixed(2);
        var loPresWK = parseFloat(loPresWK).toFixed(2);
        
        //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
        document.getElementById("HTyr").innerHTML = hiYR + "&#176;F @ " + hiTimeYR;
        document.getElementById("LTyr").innerHTML = loYR + "&#176;F @ " + loTimeYR;
        document.getElementById("HT6m").innerHTML = hi6M + "&#176;F @ " + hiTime6M;
        document.getElementById("LT6m").innerHTML = lo6M + "&#176;F @ " + loTime6M;
        document.getElementById("HT3d").innerHTML = hi3D + "&#176;F @ " + hiTime3D;
        document.getElementById("LT3d").innerHTML = lo3D + "&#176;F @ " + loTime3D;
        document.getElementById("HTwk").innerHTML = hiWK + "&#176;F @ " + hiTimeWK;
        document.getElementById("LTwk").innerHTML = loWK + "&#176;F @ " + loTimeWK;
        
        document.getElementById("TRyr").innerHTML = rainYR + '"';
        document.getElementById("TR6m").innerHTML = rain6M + '"';
        document.getElementById("TR3d").innerHTML = rain3D + '"';
        document.getElementById("TRwk").innerHTML = rainWK + '"';
        
        document.getElementById("HWyr").innerHTML = hiWndYR + "mph @ " + hiWndTimeYR;
        document.getElementById("HW6m").innerHTML = hiWnd6M + "mph @ " + hiWndTime6M;
        document.getElementById("HW3d").innerHTML = hiWnd3D + "mph @ " + hiWndTime3D;
        document.getElementById("HWwk").innerHTML = hiWndWK + "mph @ " + hiWndTimeWK;
        
        document.getElementById("HPyr").innerHTML = hiPresYR + "mb @ " + hiPresTimeYR;
        document.getElementById("HP6m").innerHTML = hiPres6M + "mb @ " + hiPresTime6M;
        document.getElementById("HP3d").innerHTML = hiPres3D + "mb @ " + hiPresTime3D;
        document.getElementById("HPwk").innerHTML = hiPresWK + "mb @ " + hiPresTimeWK;
        
        document.getElementById("LPyr").innerHTML = loPresYR + "mb @ " + loPresTimeYR;
        document.getElementById("LP6m").innerHTML = loPres6M + "mb @ " + loPresTime6M;
        document.getElementById("LP3d").innerHTML = loPres3D + "mb @ " + loPresTime3D;
        document.getElementById("LPwk").innerHTML = loPresWK + "mb @ " + loPresTimeWK;
      } 
    });
   }
   getStats();
  }); 