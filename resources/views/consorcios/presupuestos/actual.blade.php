@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="spark-screen container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-md-3 spark-settings-tabs">@include('shared.menu_consorcio')</div>
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header">{{__('Presupusto período')}} {{ $presupuesto->periodo }} @if($history) <a href="{{ route('consorcios.presupuestos.history', $consorcio) }}">{{ _('History') }}</a>@endif</div>
                        <div class="card-body">
                            <form action="{{route('consorcios.presupuestos.liquidar', [$consorcio, $presupuesto], false)}}" method="post" role="form">
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

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa A')}}</label>
                                    <div class="col-md-6 input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="create-consorcio-total_expensa_a" name="total_expensa_a" value="{{ $presupuesto->total_expensa_a }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa B')}}</label>
                                    <div class="col-md-6 input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="create-consorcio-total_expensa_b" name="total_expensa_b" value="{{ $presupuesto->total_expensa_b }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa C')}}</label>
                                    <div class="col-md-6 input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="create-consorcio-total_expensa_c" name="total_expensa_c" value="{{ $presupuesto->total_expensa_c }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa Ext. A')}}</label>
                                    <div class="col-md-6 input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="create-consorcio-total_expensa_ext_a" name="total_expensa_ext_a" value="{{ $presupuesto->total_expensa_ext_a }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa Ext. B')}}</label>
                                    <div class="col-md-6 input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="create-consorcio-total_expensa_ext_b" name="total_expensa_ext_b" value="{{ $presupuesto->total_expensa_ext_b }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Total Expensa Ext. C')}}</label>
                                    <div class="col-md-6 input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="create-consorcio-total_expensa_ext_c" name="total_expensa_ext_c" value="{{ $presupuesto->total_expensa_ext_c }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="offset-md-4 col-md-6">
                                        <button type="submit" class="btn btn-primary">{{__('Liquidar')}}</button>
                                        {{ csrf_field() }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @include('consorcios.presupuestos.form_gastos')
                    @include('consorcios.presupuestos.grid_gastos')
                </div>
            </div>
        </div>
    </home>
@endsection
