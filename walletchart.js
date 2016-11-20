window.onload = function () {
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
            toolTipContent: "<span style='\"'color: {color};'\"'><strong>{indexLabel}</strong></span><span style='\"'font-size: 20px; color:peru '\"'><strong>{y}</strong></span>",

            indexLabelPlacement: "inside",
            indexLabelFontColor: "white",
            indexLabelFontWeight: 600,
            indexLabelFontFamily: "Verdana",
            color: "#62C9C3",
            type: "bar",
            dataPoints: [
                { y: 2, label: "21%", indexLabel: "Personal" },
                { y: 25, label: "25%", indexLabel: "Groceries" },
                { y: 33, label: "33%", indexLabel: "Entertainment" },
                { y: 36, label: "36%", indexLabel: "Technology" },

            ]
        }
        ]
    });

    chart.render();
}