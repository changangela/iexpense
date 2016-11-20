var xhr = new XMLHttpRequest();
xhr.open("GET", "expensesjsonarray.php");
xhr.setRequestHeader("Content-Type", "application/json"); // http expect a json
xhr.addEventListener("load", function(){
	
	var data = JSON.parse(this.responseText);

	var diff= parseInt(data.visiontotal, 10)-parseInt(data.visionclaimed, 10);
	var chart = new CanvasJS.Chart("chartmander",
	{
		title:{
			text: "Vision Care Claim",
			fontFamily: "arial black"
		},
                animationEnabled: true,
		legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center"
		},
		theme: "theme1",
		data: [
		{        
			type: "pie",
			indexLabelFontFamily: "Garamond",       
			indexLabelFontSize: 20,
			indexLabelFontWeight: "bold",
			startAngle:0,
			indexLabelFontColor: "MistyRose",       
			indexLabelLineColor: "darkgrey", 
			indexLabelPlacement: "inside", 
			toolTipContent: "{name}: {y}%",
			showInLegend: true,
			indexLabel: "#percent%", 
			dataPoints: [
				{  y: 100*data.visionclaimed/data.visiontotal, name: "Claimed", legendMarkerType: "triangle"},
				{  y: 100*diff/data.visiontotal, name: "Budget Left", legendMarkerType: "square"},
			]
		}
		]
	});
	chart.render();

});

xhr.send();
