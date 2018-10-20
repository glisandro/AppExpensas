@extends('layout.appexpensas')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
    <div class="card card-default">
        <div class="card-header">{{__('Cuenta corriente')}}</div>
        <div class="table-responsive">
            <table class="table table-valign-middle mb-0">
                <thead>
                <th>{{__('Presupuesto')}}</th>
                <th>{{__('Concepto')}}</th>
                <th>{{__('Débitos')}}</th>
                <th>{{__('Créditos')}}</th>
                <th>{{__('Saldo')}}</th>
                </thead>
                <tbody>
                @foreach($cupones as $cupon)
                    <tr>
                        <td colspan="5"><b>Período: {{$cupon->presupuesto->periodo}} Total: {{$cupon->total}}</b></td>

                    </tr>
                    @foreach($cupon->conceptos as $cuponDetalle)
                        <tr>
                            <td>{{ $cupon->presupuesto->periodo }}</td>
                            <td>{{ $cuponDetalle->concepto->concepto }}</td>
                            <td>${{ $cuponDetalle->importe }}</td>
                            <td>$0,00</td>
                            <td>$0,00</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
