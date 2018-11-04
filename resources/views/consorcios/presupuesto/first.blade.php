@extends('layout.appexpensas')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
    <div class="card">
        <div class="card-body">
            @for($i = 1; $i <= 7; $i++)
                <a href="{{route('consorcios.presupuesto.selectfirst',[$consorcio, $periodosPaginate->format('Y-m') ])}}">{{ ucfirst($periodosPaginate->formatLocalized('%B %Y')) }}</a> |
                @php
                $periodosPaginate->addMonth()
                @endphp
            @endfor
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">{{__('Primer presupuesto')}} </div>
        <div class="card-body">
            <form action="{{route('consorcios.presupuesto.storefirst', [$consorcio], false)}}" method="post" role="form">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Periodo')}}</label>
                    <div class="col-md-6">
                        {{ $periodoSeleccionado['periodo'] }}
                        <input type="hidden" id="create-consorcio-periodo_date" name="periodo_date" value="{{ $periodoSeleccionado['periodo_date'] }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Desde')}}</label>
                    <div class="col-md-6">
                        {{ $periodoSeleccionado['desde_humans'] }}
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Hasta')}}</label>
                    <div class="col-md-6">
                        {{ $periodoSeleccionado['hasta_humans'] }}
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
