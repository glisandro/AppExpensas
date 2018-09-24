@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="spark-screen container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-md-3 spark-settings-tabs">@include('shared.menu')</div>
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header">{{__('Dashboard')}} <a href="{{ route('consorcios.presupuestos', [$consorcio], false) }}">{{ __('actual') }}</a></div>
                        <div class="card-body">
                            <ul>
                            @foreach($presupuestos as $presupuesto)
                                    <li><a href="/consorcios/{{ $consorcio->id }}/presupuesto/{{ $presupuesto->id }}">{{ $presupuesto->periodo }}</a> </li>
                            @endforeach
                            </ul>
                            <nav area-lavel="Pagination"> {!! $presupuestos->render() !!}</nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection
