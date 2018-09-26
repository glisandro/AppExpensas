@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row justify-content-center">
                <div class="col-md-3 spark-settings-tabs">
                    @include('shared.menu_consorcio')
                </div>
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header">{{__('Cuenta corriente')}}</div>


                            <div class="table-responsive">
                                <table class="table table-valign-middle mb-0">
                                    <thead>
                                        <th>Concepto</th>
                                        <th>Debe</th>
                                        <th>Haber</th>
                                        <th>Presupuesto</th>
                                    </thead>
                                    <tbody>
                                    @foreach($cupones as $cupon)
                                            @foreach($cupon->conceptos as $cuponDetalle)
                                                <tr>
                                                    <td>{{ $cuponDetalle->concepto->concepto }}</td>
                                                    <td>${{ $cuponDetalle->importe }}</td>
                                                    <td>$0,00</td>
                                                    <td>{{ $cupon->presupuesto->periodo }}</td>
                                                </tr>
                                            @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection
