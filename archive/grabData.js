function grabData()
{
	if (document.getElementById('r1').checked) {
	  range = document.getElementById('r1').value;
	}
	if (document.getElementById('r2').checked) {
	  range = document.getElementById('r2').value;
	}
	if (document.getElementById('r3').checked) {
	  range = document.getElementById('r3').value;
	}
	if (document.getElementById('r4').checked) {
	  range = document.getElementById('r4').value;
	}
	
	var jsonDataP = $.ajax({
	  type: "POST",
	  url: "grabData.php",
	  data: {timeRange: range},
	  dataType:"json",
	  async: false
	  }).responseText;
	  
	alert(jsonDataP);
}
	