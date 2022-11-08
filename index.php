<html>
    <head>
        <?php include("header.php");?>
    </head>
    <body>
        <?php include("navbar.php");?>
        
        <?php include("front.php");?>

        <?php include("footer.php");?>
        
        <script type="text/javascript" src="js/stationData.js"></script>
        <script type="text/javascript" src="https://mesonet.agron.iastate.edu/json/current.py?network=NC_ASOS&station=JQF&callback=gotData"></script>
        <script type="text/javascript" src="js/nws_forecast.js"></script>
    </body>
</html>