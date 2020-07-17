@extends('layout.appexpensas')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">{{__('Presupuesto')}} @if ($hasHistory)<a href="{{ route('consorcios.presupuesto.historics', [$consorcio], false) }}">{{ __('History') }}</a>@endif</div>
                <div class="col-md-9 text-md-right">
                    <a href="{{route('consorcios.presupuesto.cupones', [$consorcio, $presupuesto])}}" target="_blank" class="btn btn-success">{{ __('Imprimir cupones') }}</a>
                    <a href="{{route('consorcios.presupuesto.liquidar', [$consorcio, $presupuesto])}}" class="btn btn-success">{{ __('Liquidar') }}</a>
                    <a href="{{route('consorcios.presupuesto.delete', $consorcio)}}" class="btn btn-danger">{{ __('Eliminar') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('consorcios.presupuesto.update', [$consorcio], false)}}" method="post" role="form">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Periodo')}}</label>
                    <div class="col-md-6">
                        <input type="text" id="create-consorcio-periodo" name="periodo" value="{{ $presupuesto->periodo }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Desde')}}</label>
                    <div class="col-md-6">
                        <input type="date" id="create-consorcio-desde" name="desde" value="{{ $presupuesto->desde }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Hasta')}}</label>
                    <div class="col-md-6">
                        <input type="date" id="create-consorcio-hasta" name="hasta" value="{{ $presupuesto->hasta }}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa A')}}</label>
                    <div class="col-md-6 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="create-consorcio-total_expensa_a" name="total_expensa_a" value="{{ old('total_expensa_a', $presupuesto->total_expensa_a) }}" class="form-control">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa B')}}</label>
                    <div class="col-md-6 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="create-consorcio-total_expensa_b" name="total_expensa_b" value="{{ old('total_expensa_b', $presupuesto->total_expensa_b) }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa C')}}</label>
                    <div class="col-md-6 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="create-consorcio-total_expensa_c" name="total_expensa_c" value="{{ old('total_expensa_c', $presupuesto->total_expensa_c) }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa Ext. A')}}</label>
                    <div class="col-md-6 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="create-consorcio-total_expensa_ext_a" name="total_expensa_ext_a" value="{{ old('total_expensa_ext_a', $presupuesto->total_expensa_ext_a) }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa Ext. B')}}</label>
                    <div class="col-md-6 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="create-consorcio-total_expensa_ext_b" name="total_expensa_ext_b" value="{{ old('total_expensa_ext_b', $presupuesto->total_expensa_ext_b) }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa Ext. C')}}</label>
                    <div class="col-md-6 input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="create-consorcio-total_expensa_ext_c" name="total_expensa_ext_c" value="{{ old('total_expensa_ext_c', $presupuesto->total_expensa_ext_c) }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="offset-md-4 col-md-6">
                        <button type="submit" class="btn btn-success">{{__('Guardar cambios')}}</button>
                        {{ csrf_field() }}
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach($rubros as $rubro)
        @include('consorcios.presupuesto.actual.grid_detalle')
    @endforeach

@endsection