$(function(){
    function loadChart(){
        /**
         * @args rows, gotten from getHist endpoint
         * loads the chart
         */
        var rows = (arguments[0])?arguments[0]:[[],[]]
        
        var local = {
            "open" : {
                "en" : "Open",
                "ru" : "Открытый"
            },
            "close" : {
                "en" : "Close",
                "ru" : "Закрытий"
            }
        };
        var lang = getCookie("lang");
        // localizing labels
        var opens = rows["Close"];
        var closes = rows["Open"]

        var data = [
            { label: local["open"][lang], color:"green", data: opens,lines: {show: true,lineWidth: 1} },
            { label: local["close"][lang], color:"red", data: closes,lines: {show: true,lineWidth: 1} },
            ];
            options = {
                series:{lines:{active:true}, points : {show: true, radius: 1}},
                grid: {hoverable: true,clickable: true},
                legend:{position:"se"},
                xaxis: { mode: "time",timeformat: "%y-%0m-%0d"}
            };
            //load the chart area
        $.plot(".market-chart", data,options);

            //activate tooltip for chart hovering
        $("<div id='tooltip'></div>").css({
            position: "absolute",
            display: "none",
            border: "1px solid #fdd",
            padding: "2px",
            "background-color": "#fee",
            opacity: 0.80
        }).appendTo("body");

        //bind tooltip to chart
        $(".market-chart").bind("plothover", function (event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                $("#tooltip").html(item.series.label 
                    + ": " + (new Date(parseInt(x))).formatYYYYMMDD() + " <b>" + y +"</b>")
                    .css({top: item.pageY+5, left: item.pageX+5})
                    .fadeIn(200);
            } else {
                $("#tooltip").hide();
            }			
        });
    }
    var data = [];
    var chart = [];
    data = $("#chart-area").data("market");
    chart = data["chart"];

    loadChart(chart);
})