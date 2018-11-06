@extends('spark::layouts.app')

@section('content')
    <div class="spark-screen container-full">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-3 spark-settings-tabs">
                @yield('menu')
            </div>
            <div class="col-md-9">
                @include('shared.messages')
                @include('spark::shared.errors')
                @yield('content-main')
            </div>
        </div>

    </div>
@endsection
