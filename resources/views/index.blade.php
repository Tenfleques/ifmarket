@extends('layouts.app')

@section('navigation')
    @component('components.welcome')
        Добро пожоловать в Маркет
    @endcomponent
@endsection

@section('content')    
    @component('components.market.form')
        Форма отправки недоступна
    @endcomponent
    @component('components.market.chart', ['data' => $data])
        График рынка недоступен
    @endcomponent
    @component('components.market.table',['data' => $data])
        Таблица истории рынка недоступна
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
        Маркет &copy; 2019
    @endcomponent
@endsection

    
