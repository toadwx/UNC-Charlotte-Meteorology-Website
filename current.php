<html>
    <head>
        <?php include("header.php");?>
    </head>
    <body>
        <?php include("navbar.php");?>
        
        <div class="app-container">
        <h3>Current Conditions</h3>
        <div>
            <label class="radio-container">24 hours
                <input type="radio" checked="checked" name="timescaleRadio">
                <span class="radio-checkmark"></span>
            </label>
            <label class="radio-container">48 hours
                <input type="radio" name="timescaleRadio">
                <span class="radio-checkmark"></span>
            </label>
            <label class="radio-container">72 hours
                <input type="radio" name="timescaleRadio">
                <span class="radio-checkmark"></span>
            </label>
        </div>
        <div class="tab">
            <button id="defaultTabButton" class="tablinks active" onclick="openTab(event, 'tempChartCont')">Temperatures</button>
            <button class="tablinks" onclick="openTab(event, 'prcpChartCont')">Precipitation</button>
            <button class="tablinks" onclick="openTab(event, 'presChartCont')">Pressure</button>
            <button class="tablinks" onclick="openTab(event, 'windChartCont')">Wind</button>
        </div>
        <div id="tempChartCont" class="tabcontent" style="display:block"><div id="tempChart"></div></div>
        <div id="prcpChartCont" class="tabcontent"><div id="prcpChart"></div></div>
        <div id="presChartCont" class="tabcontent"><div id="presChart"></div></div>
        <div id="windChartCont" class="tabcontent"><div id="windChart"></div></div>

        </div>
    
        <?php include("footer.php");?>
        
        <script type="text/javascript" src="js/currentConditions.js"></script>
    </body>
</html>