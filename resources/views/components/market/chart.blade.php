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
        <div id="chart-area" class="col-md-12 market-chart" 
            data-market="{{session('data')}}">
        </div>
    </div>
</div>