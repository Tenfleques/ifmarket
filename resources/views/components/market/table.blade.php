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
                data-side-pagination="client"
                data-market="{{session('data')}}">
        </table>
    </div>
</div>
