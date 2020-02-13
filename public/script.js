var ctx = document.getElementById("myChart");

var data = {
    labels: [
        "Fatigué",
        "Heureux",
        "Stressé"
    ],
    datasets: [
        {
            data: [stat, monthstat],   // id back vote
            backgroundColor: [
                "#2c786c",
                "#f16731",
                "#f8b400"
            ],
            hoverBackgroundColor: [
                "#FF4394",
                "#36A2EB",
                "#FFCE56"
            ]			
        }]
};

// moyenne du jour, chart:

var ctx = document.getElementById("myChart").getContext('2d');

var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
                
        datasets: [
            {
                label: 'Fatigué',           
                data: [],                           //back id
                backgroundColor: ["#2c786c",],           
            },
            {
                label: 'Heureux',
                data:  [],            //back id
                backgroundColor: ["#f16731",],
            },
            {
                label: 'Stressé',
                data: [],                  //back id
                backgroundColor: ["#f8b400",],           
            }
        ],
    },    
        options : { 
        	cutoutPercentage:40,
        }
});

// chart par services:
var ctx = document.getElementById("myChartS1").getContext('2d');

var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
                
        datasets: [
            {
                label: 'Fatigué',           
                data: [],                           //back id
                backgroundColor: ["#2c786c",],           
            },
            {
                label: 'Heureux',
                data:  [],            //back id
                backgroundColor: ["#f16731",],
            },
            {
                label: 'Stressé',
                data: [],                  //back id
                backgroundColor: ["#f8b400",],           
            }
        ],
    },    
        options : { 
        	cutoutPercentage:40,
        }
});

var ctx = document.getElementById("myChartS2").getContext('2d');

var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
                
        datasets: [
            {
                label: 'Fatigué',           
                data: [],                           //back id
                backgroundColor: ["#2c786c",],           
            },
            {
                label: 'Heureux',
                data:  [],            //back id
                backgroundColor: ["#f16731",],
            },
            {
                label: 'Stressé',
                data: [],                  //back id
                backgroundColor: ["#f8b400",],           
            }
        ],
    },    
        options : { 
        	cutoutPercentage:40,
        }
});

var ctx = document.getElementById("myChartS3").getContext('2d');

var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
                
        datasets: [
            {
                label: 'Fatigué',           
                data: [],                           //back id
                backgroundColor: ["#2c786c",],           
            },
            {
                label: 'Heureux',
                data:  [],            //back id
                backgroundColor: ["#f16731",],
            },
            {
                label: 'Stressé',
                data: [],                  //back id
                backgroundColor: ["#f8b400",],           
            }
        ],
    },    
        options : { 
        	cutoutPercentage:40,
        }
});

var ctx = document.getElementById("myChartS4").getContext('2d');

var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
                
        datasets: [
            {
                label: 'Fatigué',           
                data: [],                           //back id
                backgroundColor: ["#2c786c",],           
            },
            {
                label: 'Heureux',
                data:  [],            //back id
                backgroundColor: ["#f16731",],
            },
            {
                label: 'Stressé',
                data: [],                  //back id
                backgroundColor: ["#f8b400",],           
            }
        ],
    },    
        options : { 
        	cutoutPercentage:40,
        }
});