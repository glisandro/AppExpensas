@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row justify-content-center">
                <div class="col-md-3">
                    @include('shared.menu_consorcio')
                </div>
                <div class="col-md-9">
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
                </div>
            </div>
        </div>
    </home>
@endsection
