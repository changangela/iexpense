var xhr = new XMLHttpRequest();
xhr.open("GET", "../expensesjsonarray.php");
xhr.setRequestHeader("Content-Type", "application/json"); // http expect a json
xhr.addEventListener("load", function(){
	
	var data = JSON.parse(this.responseText);

	var diff= parseInt(data.dentaltotal, 10)-parseInt(data.dentalclaimed, 10);
	var chart = new CanvasJS.Chart("dental-chart",
	{
		title:{
			text: "Dental Claim",
			fontFamily: "Ubuntu"
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
			indexLabelFontFamily: "Ubuntu",       
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
				{  y: 100*data.dentalclaimed/data.dentaltotal, name: "Claimed", legendMarkerType: "triangle"},
				{  y: 100*diff/data.dentaltotal, name: "Budget Left", legendMarkerType: "square"},
			]
		}
		]
	});
	chart.render();

});

xhr.send();
