$(function(){
    function getHeight() {
        /**
         * aautomatically calculates height when window size change
         */
        return $(window).height() - $('h1').outerHeight(true);
    }
    function openCloseCompare(value, row, index, field) {
        /**
         * compare dates on sorting the date column
         */
        if(value < row.Open)
            return {classes: 'text-success'};
        if(value == row.Open)
            return {classes: 'text-warn'};
        return {classes: 'text-danger'};
    }
    function initTable(market) {
        $table.bootstrapTable({
            height: getHeight(),
            columns: [{
                    field: 'Date',
                    title: '<span class="lang ru">Дата</span><span class="lang en">Date</span>',
                    sortable: true,
                    sorter : function(a,b) {
                        return new Date(b) - new Date(a);
                    },
                    align: 'center',
                    class: 'market-date'
                }, {
                    field: 'Open',
                    title: '<span class="lang ru">Открытый</span><span class="lang en">Open</span>',
                    sortable: true,
                    align: 'center',
                    class: 'market-open'
                },{
                    field: 'High',
                    title: '<span class="lang ru">Высокий</span><span class="lang en">High</span>',
                    sortable: true,
                    align: 'center',
                    class: 'market-high'
                }, {
                    field: 'Low',
                    title: '<span class="lang ru">Нижний</span><span class="lang en">Low</span>',
                    sortable: true,
                    align: 'center',
                    class: 'market-low'
                }, {
                    field: 'Close',
                    title: '<span class="lang ru">Закрытий</span><span class="lang en">Close</span>',
                    sortable: true,
                    align: 'center',
                    class: 'market-close',
                    cellStyle: openCloseCompare
                }, {
                    field: 'Volume',
                    title: '<span class="lang ru">Объем</span><span class="lang en">Volume</span>',
                    sortable: true,
                    align: 'center',
                    class: 'market-volume'
                }, {
                    field: 'id',
                    visible: false
                }
            ],
            data : market
        });
    }
    setTimeout(() => {
        $table.bootstrapTable('resetView');
    }, 200);
    $(window).resize(() => {
        $table.bootstrapTable('resetView', {
            height: getHeight()
        });
    });
    var data = [];
    var market = [];
    var timer = null;

    const $table = $('#table');

    data = $table.data("market");
    market = data["market"];
    initTable(market);

    if(data && isDefined(data["code"])){
        if(data["code"] >= 400){
            $(".response-info").removeClass("hidden");
            $(".empty-response").addClass("hidden");
        }else if(!market.length){
            $(".response-info").removeClass("hidden");
            $(".error-params").addClass("hidden");
        }
        if(timer){
            clearTimeout(timer); 
        }
        timer = setTimeout(() => {
            $(".response-info").addClass("hidden");
        }, 5000);  
    } 
});