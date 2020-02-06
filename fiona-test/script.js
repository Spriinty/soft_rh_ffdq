var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data = {
        datasets: [{
            data: [10, 20, 30]
        }],

        // Configuration options go here
        options: {},
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Red',
            'Yellow',
            'Blue'
        ]
    }
});

var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});