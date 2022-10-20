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
            <h3>Five-Day Forecast</h3>
            
            <table>
                <tbody>
                    <tr>
                        <td id="day1"></td>
                        <td id="day2"></td>
                        <td id="day3"></td>
                        <td id="day4"></td>
                        <td id="day5"></td>
                    </tr>
                    <tr>
                        <td><img src="images/clear.png" /></td>
                        <td><img src="images/cloudy.png" /></td>
                        <td><img src="images/rain.png" /></td>
                        <td><img src="images/snow.png" /></td>
                        <td><img src="images/tstorm.png" /></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td><p>High: XX&#176;F<br/>Low: XX&#176;F</p></td>
                        <td><p>High: XX&#176;F<br/>Low: XX&#176;F</p></td>
                        <td><p>High: XX&#176;F<br/>Low: XX&#176;F</p></td>
                        <td><p>High: XX&#176;F<br/>Low: XX&#176;F</p></td>
                        <td><p>High: XX&#176;F<br/>Low: XX&#176;F</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="lower">
        <div class="storm">
            <h4>STORM</h4>
        </div>
        <div class="met-prog">
            <h4>Meteorology at Charlotte</h4>
        </div>
    </div>

</div>
