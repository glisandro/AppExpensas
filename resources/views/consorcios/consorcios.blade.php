@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="col-md-3 spark-settings-tabs">
                    @include('shared.menu')
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-header">{{__('Dashboard')}}</div>

                    <div class="card-body">
                        @foreach($consorcios as $consorcio)
                            <ul>
                                <li><a href="{{ route('consorcios.redirectToDefaultSection', $consorcio->id) }}">{{ $consorcio->name }}</a> </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
