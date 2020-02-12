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

