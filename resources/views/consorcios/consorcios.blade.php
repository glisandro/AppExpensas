@extends('layout.appexpensas')

@section('menu')
    @include('shared.menu-global')
@endsection

@section('content-main')
    <div class="card card-default">
        <div class="card-header">{{__('Dashboard')}}</div>
        <div class="card-body">
            @foreach($consorcios as $consorcio)
                <ul>
                    <li><a href="{{ route('consorcios.presupuesto.actual', $consorcio->id) }}">{{ $consorcio->name }}</a> </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
