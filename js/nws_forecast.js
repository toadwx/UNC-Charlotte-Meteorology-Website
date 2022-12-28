// loadJSON method to open the JSON file.
function loadJSON(path, success, error) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        success(JSON.parse(xhr.responseText));
      }
      else {
        error(xhr);
      }
    }
  };
  xhr.open('GET', path, true);
  xhr.send();
}

loadJSON("https://forecast.weather.gov/MapClick.php?lon=-80.73204&lat=35.30629&FcstType=json", parseFcst,'jsonp');

function parseFcst(Data) {
  console.log(Data['creationDateLocal']);
  
  var days = Data['time']['startPeriodName'].slice(0,6);
  var tempLabels = Data['time']['tempLabel'].slice(0,9);
  var tempVals = Data['data']['temperature'].slice(0,9);
  var icons = Data['data']['iconLink'].slice(0,9);
  var currIcon = 'https://forecast.weather.gov/newimages/medium/' + Data['currentobservation']['Weatherimage'];
  
  for (let i = 0; i < days.length; i++) {
    var dayId = "day" + i;
    
    if (tempLabels[i] == 'Low') {
      var labColor = 'blue';
    } else {
      var labColor = 'red';
    }
    
    document.getElementById(dayId).innerHTML = "<b>" + days[i] + "</b>";
    document.getElementById(dayId+"_img").innerHTML = "<img src=" + icons[i] + " />";
    document.getElementById(dayId+"_temp").innerHTML = "<span style='color:"+labColor+";'><b>" + tempLabels[i] + ": " + tempVals[i] + "&#176;F</b></span>";
    document.getElementById("current_img").innerHTML = "<img src=" + currIcon + " />";
  }
  
  console.log(tempVals);
}