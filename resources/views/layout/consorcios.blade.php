@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="spark-screen container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-md-3 spark-settings-tabs">
                    @yield('menu')
                </div>
                <div class="col-md-9">
                    @yield('content-main')
                </div>
            </div>
        </div>
    </home>
@endsection
