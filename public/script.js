
// moyenne du jour, chart:

var ctx = document.getElementById("myChart").getContext('2d');

var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',

    data: {
        // labels: [datasMyChart[0]['label'],datasMyChart[1]['label'],datasMyChart[2]['label']],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [datasMyChart[0]['backgroundColor'],datasMyChart[1]['backgroundColor'],datasMyChart[2]['backgroundColor']],
            data: [datasMyChart[0]['data'][0],datasMyChart[1]['data'][0],datasMyChart[2]['data'][0]]
        }]
    },
        options : { 
            cutoutPercentage:0,
            tooltips : {
                enabled : false,
            },
            responsive:false,
        }

});

// chart par services:
var ctxS1 = document.getElementById("myChartS1").getContext('2d');
var myDoughnutChartS1 = new Chart(ctxS1, {
    type: 'doughnut',
    data: {
        labels: [datasEachService.Service2[0]['label'],datasEachService.Service2[1]['label'],datasEachService.Service2[2]['label']],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [datasEachService.Service2[0]['backgroundColor'],datasEachService.Service2[1]['backgroundColor'],datasEachService.Service2[2]['backgroundColor']],
            data: [datasEachService.Service2[0]['data'][0],datasEachService.Service2[1]['data'][0],datasEachService.Service2[2]['data'][0]]
        }]
    },
        options : { 
        	cutoutPercentage:40,
        }
});
// chart par services:
var ctxS2 = document.getElementById("myChartS2").getContext('2d');
var myDoughnutChartS2 = new Chart(ctxS2, {
    type: 'doughnut',
    data: {
        labels: [datasEachService.Service3[0]['label'],datasEachService.Service3[1]['label'],datasEachService.Service3[2]['label']],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [datasEachService.Service3[0]['backgroundColor'],datasEachService.Service3[1]['backgroundColor'],datasEachService.Service3[2]['backgroundColor']],
            data: [datasEachService.Service3[0]['data'][0],datasEachService.Service3[1]['data'][0],datasEachService.Service3[2]['data'][0]]
        }]
    },
        options : { 
        	cutoutPercentage:40,
        }
});

// chart par services:
var ctxS3 = document.getElementById("myChartS3").getContext('2d');
var myDoughnutChartS3 = new Chart(ctxS3, {
    type: 'doughnut',
    data: {
        labels: [datasEachService.Service4[0]['label'],datasEachService.Service4[1]['label'],datasEachService.Service4[2]['label']],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [datasEachService.Service4[0]['backgroundColor'],datasEachService.Service4[1]['backgroundColor'],datasEachService.Service4[2]['backgroundColor']],
            data: [datasEachService.Service4[0]['data'][0],datasEachService.Service4[1]['data'][0],datasEachService.Service4[2]['data'][0]]
        }]
    },
        options : { 
        	cutoutPercentage:40,
        }
});

// chart par services:
var ctxS4 = document.getElementById("myChartS4").getContext('2d');
var myDoughnutChartS4 = new Chart(ctxS4, {
    type: 'doughnut',
    data: {
        labels: [datasEachService.Service5[0]['label'],datasEachService.Service5[1]['label'],datasEachService.Service5[2]['label']],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [datasEachService.Service5[0]['backgroundColor'],datasEachService.Service5[1]['backgroundColor'],datasEachService.Service5[2]['backgroundColor']],
            data: [datasEachService.Service5[0]['data'][0],datasEachService.Service5[1]['data'][0],datasEachService.Service5[2]['data'][0]]
        }]
    },
        options : { 
        	cutoutPercentage:40,
        }
});

// var ctx = document.getElementById("myChartS2").getContext('2d');

// var myDoughnutChart = new Chart(ctx, {
//     type: 'doughnut',
//     data: {
                
//         datasets: [
//             {
//                 label: 'Fatigué',           
//                 data: [],                           //back id
//                 backgroundColor: ["#2c786c",],           
//             },
//             {
//                 label: 'Heureux',
//                 data:  [],            //back id
//                 backgroundColor: ["#f16731",],
//             },
//             {
//                 label: 'Stressé',
//                 data: [],                  //back id
//                 backgroundColor: ["#f8b400",],           
//             }
//         ],
//     },    
//         options : { 
//         	cutoutPercentage:40,
//         }
// });

// var ctx = document.getElementById("myChartS3").getContext('2d');

// var myDoughnutChart = new Chart(ctx, {
//     type: 'doughnut',
//     data: {
                
//         datasets: [
//             {
//                 label: 'Fatigué',           
//                 data: [],                           //back id
//                 backgroundColor: ["#2c786c",],           
//             },
//             {
//                 label: 'Heureux',
//                 data:  [],            //back id
//                 backgroundColor: ["#f16731",],
//             },
//             {
//                 label: 'Stressé',
//                 data: [],                  //back id
//                 backgroundColor: ["#f8b400",],           
//             }
//         ],
//     },    
//         options : { 
//         	cutoutPercentage:40,
//         }
// });

// var ctx = document.getElementById("myChartS4").getContext('2d');

// var myDoughnutChart = new Chart(ctx, {
//     type: 'doughnut',
//     data: {
                
//         datasets: [
//             {
//                 label: 'Fatigué',           
//                 data: [],                           //back id
//                 backgroundColor: ["#2c786c",],           
//             },
//             {
//                 label: 'Heureux',
//                 data:  [],            //back id
//                 backgroundColor: ["#f16731",],
//             },
//             {
//                 label: 'Stressé',
//                 data: [],                  //back id
//                 backgroundColor: ["#f8b400",],           
//             }
//         ],
//     },    
//         options : { 
//         	cutoutPercentage:40,
//         }
// });