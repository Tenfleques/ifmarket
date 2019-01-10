<div class="row">
    <hr class="col-11 mt-5 mb-4">
    <div class="col-12">
        <span class="lang ru chart-title text-center h5">
            <i class="fa fa-history"></i>
            история
        </span>
        <span class="lang en chart-title text-center h5">
            <i class="fa fa-history"></i>history
        </span>
    </div>
    <div class="infospace col-12 pl-5">
        <p class="mt-2 lang en small">
            <i class="fa fa-info"></i>
            List is sortable and searcheable!
        </p>
        <p class="lang ru small">
            <i class="fa fa-info"></i>
            Список сортируется и доступен для поиска!
        </p>
    </div>
    
    <div class="col-12 mt-3 mb-3">
            <table id="table"
                data-search="true"
                data-show-refresh="false"
                data-show-toggle="false"
                data-show-columns="false"
                data-show-export="true"
                data-detail-view="false"
                data-minimum-count-columns="2"
                data-show-pagination-switch="false"
                data-pagination="true"
                data-smart-display="true"
                data-sort-class="text-secondary"
                data-page-size=25
                data-id-field="id"
                data-side-pagination="client">
        </table>
    </div>
</div>
<script>
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
        var data = @json(session('data'));
        var market = [];
        if(data){
            data = JSON.parse(data);
            market = data["market"];
        }
        
        const $table = $('#table');
        var timer = null;
        initTable(market);

        if(data && isDefined(data["code"])){
            if(data["code"] >= 400){
                console.log(data["code"])
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
</script>
