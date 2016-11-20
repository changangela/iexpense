window.onload = function () {
    var personal = 17;
    var technology= 20;
    var groceries= 8;
    var entertainment= 20;
    var total = personal + technology + groceries +entertainment;

    var chart = new CanvasJS.Chart("chartmander", {
        
        title: {
            text: "Expenses per category",
            fontFamily: "Verdana",
            fontColor: "Peru",
            fontSize: 28

        },
        animationEnabled: true,
        axisY: {
            tickThickness: 0,
            lineThickness: 0,
            valueFormatString: " ",
            gridThickness: 0                    
        },
        axisX: {
            tickThickness: 0,
            lineThickness: 0,
            labelFontSize: 18,
            labelFontColor: "Peru"

        },
        data: [
        {
            indexLabelFontSize: 26,
            toolTipContent: "<span style='\"'color: {color};'\"'><strong>{indexLabel}</strong></span><span style='\"'font-size: 20px; color:peru '\"'><strong> {y}%</strong></span>",

            indexLabelPlacement: "inside",
            indexLabelFontColor: "black",
            indexLabelFontWeight: 600,
            indexLabelFontFamily: "Verdana",
            color: "#62C9C3",
            type: "bar",
            dataPoints: [ 
                { y: 100*entertainment/total, label: (100*entertainment/total).toFixed(2) + "%", indexLabel: "Entertainment" },
                { y: 100*groceries/total, label: (100*groceries/total).toFixed(2) + "%", indexLabel: "Groceries" },
                { y: 100*personal/total, label: (100*personal/total).toFixed(2) + "%", indexLabel: "Personal" },
                { y: 100*technology/total, label: (100*technology/total).toFixed(2) + "%", indexLabel: "Technology" },                
            ]
        }
        ]
    });

    chart.render();
}