function gotData(data)
{
  //--------------------------------------------------------------------
  // Custom Functions
  //--------------------------------------------------------------------
  function addDays(date,days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    var dd = String(result.getDate()).padStart(2, '0');
    var mm = String(result.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = result.getFullYear();
    
    newDay = mm + '-' + dd + '-' + yyyy;
    return newDay;
  }
  
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
  var skyCover = obsData["skycover[code]"][0];
  var currWx = obsData["presentwx"][0];
  
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
  
  // If NaN value for rain total, correct to 0.00
  if (rainTot === null){
    var rainTot = 0.00;
  }
  
  // Determine image to display based on conditions
  if (currWx != null) {
    if (currWx == "DZ" || currWx == "RA") {
      var imgName = "rain";
      var currCond = "Rain";
    } else if (currWx == "SN") {
      var imgName = "snow";
      var currCond = "Snow";
    } else if (currWx == "TS") {
      var imgName = "tstorm";
      var currCond = "Thunderstorm";
    }
  } else if (skyCover == "SKC" || skyCover == "CLR") {
    var imgName = "clear";
    var currCond = "Clear";
  } else if (skyCover == "FEW" || skyCover == "BKN") {
    var imgName = "partly-cloudy";
    var currCond = "Partly Cloudy";
  } else {
    var imgName = "cloudy";
    var currCond = "Cloudy";
  }
  
  var today = new Date();
  
  //--------------------------------------------------------------------
  // Update html content
  //--------------------------------------------------------------------
  // document.getElementById("stats_header").innerHTML = "<b>" + currCond + "</b>";
  document.getElementById("datetim").innerHTML = "<i>" + dateTime + "</i>";
  document.getElementById("T").innerHTML = outTemp + "&#176;F";
  document.getElementById("Td").innerHTML = dewpoint + "&#176;F";
  document.getElementById("p").innerHTML = barometer + " mb";
  document.getElementById("w").innerHTML = wndspd + " mph from " + wnddir + "&#176;";
  if (document.getElementById("r") != null) {
    document.getElementById("r").innerHTML = rainTot + " in";
    document.getElementById("Tmax").innerHTML = maxT + "&#176;F";
    document.getElementById("Tmin").innerHTML = minT + "&#176;F";
  }
  
  //--------------------------------------------------------------------
  // Update Forecast Content
  //--------------------------------------------------------------------
  document.getElementById("day1").innerHTML = "<b>" + addDays(today,0) + "</b>";
  document.getElementById("day2").innerHTML = "<b>" + addDays(today,1) + "</b>";
  document.getElementById("day3").innerHTML = "<b>" + addDays(today,2) + "</b>";
  document.getElementById("day4").innerHTML = "<b>" + addDays(today,3) + "</b>";
  document.getElementById("day5").innerHTML = "<b>" + addDays(today,4) + "</b>";
}