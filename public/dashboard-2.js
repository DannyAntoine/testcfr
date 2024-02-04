(function($) {
    "use strict"

   // Define the generateColorClass function to generate random color classes
function generateColorClass() {
    // Generate a random color class (e.g., 'color-1', 'color-2', etc.)
    var randomColorNumber = Math.floor(Math.random() * 10) + 1;
    return 'color-' + randomColorNumber;
}

// AJAX request to fetch data
$.ajax({
    url: '/fetch-CaseReferalTypeData',
    method: 'GET',
    success: function(response) {
        var data = {
            labels: [],
            series: []
        };

        var colors = []; // Array to hold color classes

        response.forEach(function(item) {
            data.labels.push(item.referral_type);
            data.series.push(item.count);
            colors.push("bg-" + generateColorClass());
        });

        var options = {
            labelInterpolationFnc: function(value, index) {
                return data.labels[index] + ' ' + data.series[index];
            }
        };

        var responsiveOptions = [
            // Your responsive options here
        ];

        new Chartist.Pie('.ct-pie-chart', data, options, responsiveOptions, colors);
    },
    error: function(error) {
        console.log('Error fetching data: ', error);
    }
});

    
    
    


    /*----------------------------------*/
function fetchDataFromServer () {
   $.ajax({
    url: '/fetch-data',
    method:'GET',
    success:function(response){

        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            
        // Create an array to store the counts for each month (initialized with zeros)
        var monthCounts = Array(12).fill(0);

        // Populate the counts array based on the data from the server
        response.forEach(function (item) {
            var month = item.month - 1; // Adjust for 0-based index
            monthCounts[month] = item.count;
        });

        var data = {
            labels: months,
            series: [monthCounts]
        };

        var options = {
            seriesBarDistance: 10
        };

    var responsiveOptions = [
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
                labelInterpolationFnc: function(value) {
                    return value[0];
                }
            }
        }]
    ];

    new Chartist.Bar('.ct-bar-chart', data, options, responsiveOptions);

}

});

}

fetchDataFromServer();

    $('.year-calendar').pignoseCalendar({
        theme: 'blue' // light, dark, blue
    });






})(jQuery);


const wt2 = new PerfectScrollbar('.widget-todo2');