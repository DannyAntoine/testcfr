(function($) {
    "use strict"



$.ajax({
    url: '/fetch-DeclineData',
    method: 'GET',
    success: function(response) {
        

        // Initialize Morris Donut chart with formatted data
        Morris.Donut({
            element: 'morris_donught',
            data: response.map(function(item){
                return{
                    label:item.reason,
                    value:item.count
                };
            }),
            resize: true,
            colors: ['#75B432', 'rgb(192, 10, 39)', '#4400eb']
        });
    },
    error: function(error) {
        console.log('Error fetching data: ', error);
    }
});

/// line graph

// Initialize Morris Line chart with empty data
let line = new Morris.Line({
    element: 'morris_line',
    resize: true,
    data: [], // Initialize with an empty array
    xkey: 'y',
    ykeys: ['item1'],
    labels: ['Total Cases'],
    gridLineColor: 'transparent',
    lineColors: ['rgb(192, 10, 39)'],
    lineWidth: 1,
    hideHover: 'auto',
    pointSize: 0,
    axes: false,
});

// Make an AJAX request to retrieve the total cases data
$.ajax({
    url: '/fetch-CaseDataByYear', // Use the correct URL for your "totalcases" endpoint
    method: 'GET',
    success: function(response) {
        // Create an array to store the data for the line graph
        var lineChartData = [];

        // Populate lineChartData with response data
        response.forEach(function(item) {
            lineChartData.push({
                y: item.year.toString(), // Year
                item1: item.total_cases, // Total Cases
            });
        });

        // Update the Morris Line chart with the new data
        line.setData(lineChartData);
    },
    error: function(error) {
        console.log('Error fetching total cases: ', error);
    }
});



    







// Make an AJAX request to retrieve the pending cases data
$.ajax({
    url: '/pending-cases-by-year',
    method: 'GET',
    success: function (response) {
        // Check if the response data is not empty
        if (response.length > 0) {
            Morris.Bar({
                element: 'morris_bar',
                data: response,
                xkey: 'y',
                ykeys: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                barColors: ['#f25521', '#f9c70a', '#f21780', '#f25521', '#f9c70a', '#f21780', '#f25521', '#f9c70a', '#f21780', '#f25521', '#f9c70a', '#f21780'],
                hideHover: 'auto',
                gridLineColor: 'transparent',
                resize: true,
                barSizeRatio: 0.25,
                
            });
        }
    },
    error: function (error) {
        console.log('Error fetching pending cases data: ', error);
    }
});












})(jQuery);