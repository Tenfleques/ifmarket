<div class="row">
    <hr class="col-11 mt-5 mb-4">
    <div class="col-12"> 
        <span class="lang ru chart-title text-center h5">диаграмма открытия и закрытия</span>
        <span class="lang en chart-title text-center h5">chart of the open and close</span>
        <div class="response-info bg-info error-params hidden text-danger p-3">
            <i class='fa fa-info fa-2x'></i>
            <span class='lang en'>File not found</span>
            <span class='lang ru'>Файл не найдено</span>
        </div>
        <div class="response-info bg-info empty-response hidden text-warning p-3">
            <i class='fa fa-info fa-2x'></i>
            <span class='lang en'>The parameters returned an empty dataset</span>
            <span class='lang ru'>Параметры вернули пустой набор данных</span>
        </div>
    </div>
    <div class="col-12 mt-3 mb-3">
        <div class="col-md-12 market-chart">
        </div>
    </div>
</div>
<script>
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
        var data = @json(session('data'));
        var chart = [];
        if(data){
            data = JSON.parse(data);
            chart = data["chart"];
        }
        loadChart(chart);
    })
</script>