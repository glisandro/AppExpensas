@extends('layout.appexpensas')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
    <div class="card card-default">
        <div class="card-header">{{__('Cuenta corriente')}}</div>
        <div class="card-body">
            @foreach($propiedades as $propiedad)
                <ul>
                    <li><a href="{{route('consorcios.cuentacorriente.show', [$consorcio, $propiedad])}}">{{ $propiedad->denominacion }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
