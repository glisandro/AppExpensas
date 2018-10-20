@extends('spark::layouts.app')

@section('content')
    <div class="spark-screen container">
        <!-- Application Dashboard -->
        <div class="row" style="background-color: red;">
            <div class="col-md-3 spark-settings-tabs">
                @yield('menu')
            </div>
            <div class="col-md-9">
                @yield('content-main')
            </div>
        </div>

    </div>
@endsection
