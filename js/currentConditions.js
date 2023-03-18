// On-Load
$(function() {
    // Initialize Default Chart
    loadGraphs();
    $('input[name="timescaleRadio"]').on('input', function(e) {
        loadGraphs();
    });

    var today = new Date();
    document.getElementById('customDatePick').value = today.toISOString().substr(0,10);
});

function loadGraphs() {
    var selectedTime = $('input[name="timescaleRadio"]:checked').val();
    if (selectedTime == "custom")
    {
        var timeScale = "24-hr";
        var today = new Date();
        var minDate = new Date("1990-01-01");
        var selectedDate = new Date($('#customDatePick').val());

        if (selectedDate > today || selectedDate < minDate) {
            alert("Invalid date was selected")
        }

        var endDate = new Date($('#customDatePick').val());
    }
    else {
        var timeScale = selectedTime;
        var endDate = new Date();
    }

    var stationGraph = new IemStationChart("tempChartCont", "JQF", "NC_ASOS", endDate, timeScale, "temp");
    var stationGraph2 = new IemStationChart("prcpChartCont", "JQF", "NC_ASOS", endDate, timeScale, "prcp");
    var stationGraph3 = new IemStationChart("windChartCont", "JQF", "NC_ASOS", endDate, timeScale, "wind");
}

function dateToString(d) {
    let stringMonth = d.getMonth() + 1;
    if (stringMonth < 10) stringMonth = '0' + stringMonth;
    let stringDay = d.getDate();
    if (stringDay < 10) stringDay = '0' + stringDay;
    const stringYear = d.getFullYear();

    return stringYear.toString() + "-" + stringMonth.toString() + "-" +
      stringDay.toString();
}

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  } 


/**
 * This class creates a HighCharts chart using IEM daily summary data
 */
class IemStationChart {
    LOADING_BAR = `PROGRESS_BAR HTML`;

    /**
     * 
     * @param {string} chartDiv ID of HighCharts container
     * @param {DateTime} endDate DateTime object for the last date in period (i.e. today)
     * @param {string} period Either 3-day, 48-hr, or 24-hr. Limited to prevent IEM abuse (Daryl anger)
     */
    constructor(chartDiv, stationID, network, endDate, period, chart) {
        this.chartDiv = chartDiv;
        this.stationID = stationID;
        this.network = network;
        this.period = period;
        this.endDate = endDate;
        this.chartType = chart;
        document.getElementById(chartDiv).innerHTML = this.LOADING_BAR;
        
        const instance = this; // Object reference for inside the deferred then
        /*
        Not pretty, but we basically switch through fixed use cases so we aren't building a 
        date looper (creating abuse opportunities). Each case subtracts from the end date to
        find the fixed days of data we need. I guess this is a limitation of IEM, but hey it's
        better than parsing the raw data! (Makes me appreciate the flexible start/end stamps
        for ACIS calls)
        */
        if (period == "3-day"){
            var dayOne = new Date(endDate);
            dayOne.setDate(endDate.getDate() - 2);
            var dayTwo = new Date(endDate);
            dayOne.setDate(endDate.getDate() - 1);
            var dayThree = new Date(endDate);

            // Handles multiple deferred calls so we dont end up with a nested mess
            $.when(
                instance.getStationData(dateToString(dayOne)),
                instance.getStationData(dateToString(dayTwo)),
                instance.getStationData(dateToString(dayThree))
            ).then(function(stnDataOne, stnDataTwo, stnDataThree) {
                // Check for errors
                // Combine JSON data into one package
                instance.stnData = [stnDataOne[0].data, stnDataTwo[0].data, stnDataThree[0].data];

                // Finally dig into the data to make chart
                instance.createChart();
            }, function() {
                instance.exception("There was an error recieving data from IEM");
            });
        }
        else if(period == "48-hr") {
            var dayOne = new Date(endDate);
            dayOne.setDate(endDate.getDate() - 1);
            var dayTwo = new Date(endDate);
            
            // Handles multiple deferred calls so we dont end up with a nested mess
            $.when(
                instance.getStationData(dateToString(dayOne)),
                instance.getStationData(dateToString(dayTwo))
            ).then(function(stnDataOne, stnDataTwo) {
                // Check for errors
                // Combine JSON data into one package
                instance.stnData = [stnDataOne[0].data, stnDataTwo[0].data];

                // Finally dig into the data to make chart
                instance.createChart();
            }, function() {
                instance.exception("There was an error recieving data from IEM");
            });
        }
        else if (period == "24-hr") {
            var dayOne = new Date(endDate);

            // Handles multiple deferred calls so we dont end up with a nested mess
            $.when(
                instance.getStationData(dateToString(dayOne))
            ).then(function(stnDataOne) {
                // Check for errors
                // Combine JSON data into one package
                instance.stnData = [stnDataOne.data];

                // Finally dig into the data to make chart
                instance.createChart();
            }, function() {
                instance.exception("There was an error recieving data from IEM");
            });
        }
    }

    /**
     * Gets daily station obs data from IEM, returns AJAX call
     */
    getStationData(dateString)
    {
        var iemURL = "https://mesonet.agron.iastate.edu/api/1/obhistory.json?network="
            + this.network + "&station=" + this.stationID + "&date=" + dateString + "&full=true";
        
        return $.ajax({
            timeout: 10000,
            url: iemURL,
            type: 'GET',
            crossDomain: true
        });
    }

    /**
     * Creates the HighChart chart for the StnData in object
     */
    createChart() {
        console.log(this.stnData);
        this.chartData = {}
        this.chartData["tempF"] = [];
        this.chartData["dewpF"] = [];
        this.chartData["presMb"] = [];
        this.chartData["prcpIn"] = [];
        this.chartData["pcpnAccum"] = [];
        this.chartData["windKt"] = [];
        this.chartData["windDir"] = [];
        this.chartData["windGust"] = [];
        this.chartData["timeStamps"] = [];

        var pcpnAccum = 0;
        // Loop through each day of data
        for (var i=0; i < this.stnData.length; i++) {
            // Loop through each hour of data
            for (var j=0; j < this.stnData[i].length; j++) {
                var valid_date = new Date(this.stnData[i][j].local_valid);
                valid_date = valid_date.getTime() - (valid_date.getTimezoneOffset() * 60000);
                
                this.chartData["tempF"].push([valid_date,this.stnData[i][j].tmpf]);
                this.chartData["dewpF"].push([valid_date,this.stnData[i][j].dwpf]);

                // JQF doesnt record MSLP, so we convert the altimeter setting from inHg to mb
                this.chartData["presMb"].push([valid_date,
                    this.stnData[i][j].alti / 0.02952998
                ]);
                this.chartData["prcpIn"].push([valid_date,this.stnData[i][j].p01i]);
                this.chartData["pcpnAccum"].push([valid_date,pcpnAccum]);
                pcpnAccum = pcpnAccum + this.stnData[i][j].p01i;
                this.chartData["windKt"].push([valid_date,this.stnData[i][j].sknt]);
                this.chartData["windDir"].push([valid_date,this.stnData[i][j].drct]);
                this.chartData["windGust"].push([valid_date,this.stnData[i][j].gust]);
                this.chartData["timeStamps"].push(this.stnData[i][j].local_valid)
            }
        }

        // Build Chart
        if (this.chartType == "temp") {
            this.chartTitle =  "Temperature/Dewpoint";
            this.chartSubTitle = "Previous " + this.period + " Period";
            this.temperatureChart();
        }
        else if(this.chartType == "prcp") {
            this.chartTitle =  "Precipitation Summary";
            this.chartSubTitle = "Previous " + this.period + " Period";
            this.precipChart();
        }
        else if(this.chartType == "wind") {
            this.chartTitle =  "Wind Summary";
            this.chartSubTitle = "Previous " + this.period + " Period";
            this.windChart();
        }
              
    }

    temperatureChart()
    {
        this.chartInstance = Highcharts.chart(this.chartDiv, {
            chart: {
                type: 'spline',
                height: '40%',
            },
            exporting: {
                sourceHeight: 1080,
                sourceWidth: 1920,
            },
            title: {
                text: this.chartTitle,
            },
            subtitle: {
                text: this.chartSubTitle,
            },
            xAxis: {
                title: {
                    text: "Valid Local Time"
                },
                type: 'datetime',
                labels: {
                    rotation: -35,
                    formatter: function() {
                        return Highcharts.dateFormat('%b-%d %H:%M', this.value);
                    }
                }
            },
            yAxis: [{
                title: {
                    text: 'Pressure (mb)',
                },
                opposite: true,
                },{
                title: {
                    text: "Degrees F"
                },
            }],
            plotOptions: {
                series : {
                    lineWidth: 2,
                    marker: {
                        enabled: true,
                        symbol: 'circle',
                        radius: 3,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: "Temperature (F)",
                data: this.chartData["tempF"],
                color: "#CB0003",
                yAxis: 1,
            },
            {
                name: "Dewpoint (F)",
                data: this.chartData["dewpF"],
                color: "#008C46",
                yAxis: 1,
            },
            {
                name: "Pressure (mb)",
                data: this.chartData["presMb"],
                color: "#e6e6e6",
                yAxis: 0,
            },
            ],
            credits: {
                enabled: true,
                text: 'Iowa Environmental Mesonet',
                href: 'https://mesonet.agron.iastate.edu/',
            },
        });
        this.chartInstance.reflow();
    }

    precipChart() {
        this.chartInstance = Highcharts.chart(this.chartDiv, {
            tooltip: {
                valueDecimals: 2,
            },
            chart: {
                type: 'spline',
                height: '40%',
            },
            title: {
                text: this.chartTitle,
            },
            subtitle: {
                text: this.chartSubTitle,
            },
            xAxis: {
                title: {
                    text: "Valid Local Time"
                },
                type: 'datetime',
                labels: {
                    rotation: -35,
                    formatter: function() {
                        return Highcharts.dateFormat('%b-%d %H:%M', this.value);
                    }
                }
            },
            yAxis: [{
                title: {
                    text: 'Accumulated Precipitation (in)',
                },
                opposite: true,
                },
                {
                    title: {
                    text: 'Precipitation (in)',
                },
            }],
            series: [{
                    type: 'spline',
                    name: 'Precipitation (in) Accumulation',
                    data: this.chartData["pcpnAccum"],
                    color: '#00bd4b',
                    yAxis: 1,
                },
                {
                    type: 'column',
                    name: 'Hourly Precipitation (in)',
                    data: this.chartData["prcpIn"],
                    color: '#000000',
                    yAxis: 0,
                },
            ],
            credits: {
                enabled: true,
                text: 'Iowa Environmental Mesonet',
                href: 'https://mesonet.agron.iastate.edu/',
            },
            });
            this.chartInstance.reflow();
    }

    windChart()
    {
        this.chartInstance = Highcharts.chart(this.chartDiv, {
            chart: {
                type: 'spline',
                height: '40%',
            },
            exporting: {
                sourceHeight: 1080,
                sourceWidth: 1920,
            },
            title: {
                text: this.chartTitle,
            },
            subtitle: {
                text: this.chartSubTitle,
            },
            xAxis: {
                title: {
                    text: "Valid Local Time"
                },
                type: 'datetime',
                labels: {
                    rotation: -35,
                    formatter: function() {
                        return Highcharts.dateFormat('%b-%d %H:%M', this.value);
                    }
                }
            },
            yAxis: [{
                title: {
                    text: 'Wind Speed (kts)',
                },
                opposite: true,
                },{
                title: {
                    text: "Wind Direction"
                },
                max: 360,
                min: 0,
            }],
            plotOptions: {
                series : {
                    lineWidth: 2,
                    marker: {
                        enabled: true,
                        symbol: 'circle',
                        radius: 3,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: "Wind Speed (kts)",
                data: this.chartData["windKt"],
                color: "#0666e2",
                yAxis: 0,
            },
            {
                name: "Wind Direction",
                data: this.chartData["windDir"],
                color: "#e6e6e6",
                yAxis: 1,
            },
            {
                name: "Wind Gust (kts)",
                data: this.chartData["windGust"],
                color: "#060ae2",
                yAxis: 0,
            },
            ],
            credits: {
                enabled: true,
                text: 'Iowa Environmental Mesonet',
                href: 'https://mesonet.agron.iastate.edu/',
            },
        });
        this.chartInstance.reflow();
    }

    /**
     * Handles exceptions
     */
    exception(message) {
        document.getElementById(this.chartDiv).innerHTML = message;
    }
}
