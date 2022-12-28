// On-Load
$(function() {
    // Initialize Default Chart
    var stationChart = new IemStationChart("current-conditions-chart", "JQF", "NC_ASOS", new Date(), "48-hr");
});

function dateToString(d) {
    let stringMonth = d.getMonth() + 1;
    if (stringMonth < 10) stringMonth = '0' + stringMonth;
    let stringDay = d.getDate();
    if (stringDay < 10) stringDay = '0' + stringDay;
    const stringYear = d.getFullYear();

    return stringYear.toString() + "-" + stringMonth.toString() + "-" +
      stringDay.toString();
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
    constructor(chartDiv, stationID, network, endDate, period) {
        this.chartDiv = chartDiv;
        this.stationID = stationID;
        this.network = network;
        this.period = period;
        this.endDate = endDate;
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
            var dayOne = endDate;
            dayOne.setDate(endDate.getDate() - 2);
            var dayTwo = endDate;
            dayOne.setDate(endDate.getDate() - 1);
            var dayThree = endDate;

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
            var dayOne = endDate;
            dayOne.setDate(endDate.getDate() - 1);
            var dayTwo = endDate;

            // Handles multiple deferred calls so we dont end up with a nested mess
            $.when(
                instance.getStationData(dateToString(dayOne)),
                instance.getStationData(dateToString(dayTwo))
            ).then(function(stnDataOne, stnDataTwo, stnDataThree) {
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
            var dayOne = endDate;

            // Handles multiple deferred calls so we dont end up with a nested mess
            $.when(
                instance.getStationData(dateToString(dayOne))
            ).then(function(stnDataOne, stnDataTwo, stnDataThree) {
                // Check for errors
                // Combine JSON data into one package
                instance.stnData = [stnDataOne[0].data];

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
        console.log(this.stnData)
    }

    /**
     * Handles exceptions
     */
    exception(message) {
        document.getElementById(this.chartDiv).innerHTML = message;
    }
}
