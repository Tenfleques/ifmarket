<div class="row">
    <div class="col-12">
        <form class="needs-validation" novalidate method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="company_symbol">
                        <span class="lang en">Company Symbol</span>
                        <span class="lang ru">Фирменный знак</span>
                    </label>
                <input type="text" class="form-control autocomplete text-uppercase {{$errors->has('company_symbol')?'border-danger':''}}" name="company_symbol" id="company_symbol" placeholder="Company Symbol" value="{{ old('company_symbol') }}" required 
                data-tags="{{file_get_contents(asset('storage/symbols.json'))}}">
                    <small id="companyError" class="form-text text-danger">
                        {{implode("<br>",$errors->get("company_symbol")) }}
                    </small>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="start_date">
                        <span class="lang en">Start Date</span>
                        <span class="lang ru">Начальная дата</span>
                    </label>
                    <input type="text" class="form-control datepicker {{$errors->has('start_date')?'border-danger':''}}" name="start_date" id="start_date" placeholder="YYYY-mm-dd" value="{{ old('start_date') }}" required>
                    <small id="startDateError" class="form-text text-danger">
                        {{implode("<br>",$errors->get("start_date"))}}
                    </small>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="end_date">
                        <span class="lang en">End Date</span>
                        <span class="lang ru">Конечная дата</span>
                    </label>
                    <input type="text" class="form-control datepicker {{$errors->has('end_date')?'border-danger':''}}" name="end_date" id="end_date" placeholder="YYYY-mm-dd" value="{{ old('end_date') }}" required>
                    <small id="endDateError" class="form-text text-danger">
                        {{implode("<br>", $errors->get("end_date"))}}                        
                    </small>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="email">
                        <span class="lang en">Email</span>
                        <span class="lang ru">Эл. почта</span>
                    </label>
                    <input type="text" class="form-control {{$errors->has('email')?'border-danger':''}}" name="email" id="email" placeholder="ivan@ivanovic.ru" value="{{ old('email') }}" required>
                    <small id="emailError" class="form-text text-danger">
                        {{implode("<br>",$errors->get('email'))}}
                    </small>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">
                <span class="lang ru">Отправить</span>
                <span class="lang en">Submit</span>
            </button>
        </form>
    </div>
</div>