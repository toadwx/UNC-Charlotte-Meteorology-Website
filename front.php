<div class="main">

    <div class="upper">
        <div class="current">
            <h3>Current Conditions</h3>
            
            <table style="width:90%;margin-left:5%;">
                <tbody>
                    <tr>
                        <td style="text-align:center">
                            <div id="current_img"></div>
                        </td>
                        <td style="text-align:center">
                            <div id="stats_header"></div>

                            <div id="datetim"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <table style="width:75%;margin-left:12%;">
                <tbody>
                    <tr>
                        <td>Temperature</td>
                        <td id="T" style="text-align:right;"></td>
                    </tr>
                    <tr>
                        <td>Dew Point</td>
                        <td id="Td" style="text-align:right;"></td>
                    </tr>
                    <tr>
                        <td>Pressure</td>
                        <td id="p" style="text-align:right;"></td>
                    </tr>
                    <tr>
                        <td>Wind</td>
                        <td id="w" style="text-align:right;"></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td><b>Daily Climatology</b></td>
                    </tr>
                    <tr>
                        <td>Temperature Max/Min</td>
                        <td id="Tmax_min" style="text-align:right;"></td>
                    </tr>
                    <tr>
                        <td>Daily Rainfall</td>
                        <td id="r" style="text-align:right;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="forecast">
            <h3>Short-Term Forecast</h3>
            
            <table>
                <tbody>
                    <tr>
                        <td id="day0"></td>
                        <td id="day1"></td>
                        <td id="day2"></td>
                        <td id="day3"></td>
                        <td id="day4"></td>
                        <td id="day5"></td>
                        <td id="day6"></td>
                        <td id="day7"></td>
                        <td id="day8"></td>
                    </tr>
                    <tr>
                        <td id="day0_img"></td>
                        <td id="day1_img"></td>
                        <td id="day2_img"></td>
                        <td id="day3_img"></td>
                        <td id="day4_img"></td>
                        <td id="day5_img"></td>
                        <td id="day6_img"></td>
                        <td id="day7_img"></td>
                        <td id="day8_img"></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td id="day0_temp"></td>
                        <td id="day1_temp"></td>
                        <td id="day2_temp"></td>
                        <td id="day3_temp"></td>
                        <td id="day4_temp"></td>
                        <td id="day5_temp"></td>
                        <td id="day6_temp"></td>
                        <td id="day7_temp"></td>
                        <td id="day8_temp"></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div id="forecasterName" class="forecast-attribution">Forecast by: Ricky Matthews</div>
        </div>
    </div>
    
    <div class="lower">
        <div class="storm">
            <h4>STORM</h4>
        </div>
        <div class="met-prog">
            <a href="https://geoearth.charlotte.edu/undergraduate-programs/meteorology">
            <h4>Meteorology at Charlotte</h4>
            </a>
        </div>
    </div>

</div>
