// STUDENT FORECAST INTERACTIONS...
// Get the modal
var modal = document.getElementById('studentForecastBox');
// Get the button that opens the modal
var btn = document.getElementById("studentForecastButton");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function(){
    $('a#toggleButton').click(function(){
        $(this).toggleClass("down");
    });
});

// ASOS Menu Interaction
var asosMenuButton = document.getElementById('asosButton');
var asosMenu = document.getElementById('asosMenu')

function showHideAsosMenu () {
        if (asosMenu.style.display == "block") {
            asosMenu.style.display = "none";
            asosMenuButton.class = "verticalSideMenuInactive";
        }
        else {
            asosMenu.style.display = "block";
            asosMenuButton.class = "verticalSideMenuActive";
        }
    }

var forecastSpan = document.getElementsByClassName("close")[1];
var forecastBox = document.getElementById('pointForecastBox');
                
// When the user clicks on <span> (x), close the modal
forecastSpan.onclick = function() {
    forecastBox.style.display = "none";
}