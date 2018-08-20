@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row justify-content-center">
                <div class="col-md-2">@include('shared.menu')</div>
                <div class="col-md-8">
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
