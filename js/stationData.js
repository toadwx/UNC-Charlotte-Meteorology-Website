function gotData(data)
{
  //--------------------------------------------------------------------
  // Parse JSON data
  //--------------------------------------------------------------------
  var stnID = data["id"];
  var obsData = data["last_ob"];
  var dateTime = obsData["local_valid"];
  var barometer = obsData["altimeter[in]"];
  var outTemp = obsData["airtemp[F]"];
  var dewpoint = obsData["dewpointtemp[F]"];
  var wndspd = obsData ["windspeed[kt]"];
  var wnddir = obsData["winddirection[deg]"];
  var rainTot = obsData["precip_today[in]"];
  var maxT = obsData["max_dayairtemp[F]"];
  var minT = obsData["min_dayairtemp[F]"];
  
  //--------------------------------------------------------------------
  // Modify data to our liking (units, SI units, the works)
  //--------------------------------------------------------------------
  var barometer = barometer * 33.8637526;
  
  var outTemp = parseFloat(outTemp).toFixed(1);
  var dewpoint = parseFloat(dewpoint).toFixed(1);
  var barometer = parseFloat(barometer).toFixed(2);
  var wndspd = parseFloat(wndspd).toFixed(2);
  var wnddir = parseFloat(wnddir).toFixed(0);
  var rainTot = parseFloat(rainTot).toFixed(2);
  var maxT = parseFloat(maxT).toFixed(1);
  var minT = parseFloat(minT).toFixed(1);
  
  var LCL = 125 * (outTemp - dewpoint);
  var LCL = parseFloat(LCL).toFixed(2);
 
  //--------------------------------------------------------------------
  // Update html content
  //--------------------------------------------------------------------
  document.getElementById("stats_header").innerHTML = "<b>" + stnID + "</b>";
  document.getElementById("datetim").innerHTML = dateTime;
  document.getElementById("T").innerHTML = outTemp + "&#176;F";
  document.getElementById("Td").innerHTML = dewpoint + "&#176;F";
  document.getElementById("p").innerHTML = barometer + " mb";
  document.getElementById("w").innerHTML = wndspd + " mph from " + wnddir + "&#176;";
  document.getElementById("r").innerHTML = rainTot + " in";
  document.getElementById("Tmax_min").innerHTML = maxT + "&#176;F / " + minT + "&#176;F";
}