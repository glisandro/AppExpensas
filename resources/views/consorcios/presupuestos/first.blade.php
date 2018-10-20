@extends('layout.appexpensas')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
    <div class="card">
        <div class="card-body">
            @for($i = -3; $i < 4; $i++)
                <a href="{{route('consorcios.presupuestos.first',[$consorcio, $i + $mes])}}">{{ ucfirst($seleccionarPeriodo->addMonth()->formatLocalized('%B %Y')) }}</a> |
            @endfor
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">{{__('Primer presupuesto')}} </div>
        <div class="card-body">
            <form action="{{route('consorcios.presupuestos.storefirst', [$consorcio], false)}}" method="post" role="form">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Periodo')}}</label>
                    <div class="col-md-6">
                        <input type="text" id="create-consorcio-periodo" name="periodo" value="{{ $presupuesto->periodo }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Desde')}}</label>
                    <div class="col-md-6">
                        <input type="date" id="create-consorcio-desde" name="desde" value="{{ $presupuesto->desde }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Hasta')}}</label>
                    <div class="col-md-6">
                        <input type="date" id="create-consorcio-hasta" name="hasta" value="{{ $presupuesto->hasta }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="offset-md-4 col-md-6">
                        <button type="submit" class="btn btn-primary">{{__('Seleccionar')}}</button>
                        {{ csrf_field() }}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection