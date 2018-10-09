@extends('layout.consorcios')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
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
@endsection

