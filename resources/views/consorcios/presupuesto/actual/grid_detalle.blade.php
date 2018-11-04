<div class="card card-default">
    <div class="card-header">{{ $rubro->name }}</div>
    <div class="table-responsive">
        <table class="table table-valign-middle mb-0">
            <thead>
                <th>Concepto</th>
                <th>Importe A</th>
                <th>Importe B</th>
                <th>Importe C</th>
                <th>Eliminar</th>
            </thead>
            @foreach($presupuesto->detalles as $detalle)
                @if($detalle->rubro_id === $rubro->id)
                    <tr>
                        <td>{{ $detalle->concepto }}</td>
                        <td>{{ $detalle->importe_a }}</td>
                        <td>{{ $detalle->importe_b }}</td>
                        <td>{{ $detalle->importe_c }}</td>
                        <td><a href="{{ $detalle->id }}" class="btn btn-danger">{{ __('Eliminar') }}</a></td>
                    </tr>
                @endif
            @endforeach
        </table>
        <form action="{{route('consorcios.detalles.store', [$consorcio], false)}}" method="post" role="form">
            <table class="table table-valign-middle mb-0">
                <thead>
                <tr>
                    <td><input type="text" id="create-consorcio-concepto" name="concepto" value="{{ old('concepto') }}" class="form-control"></td>
                    <td><input type="text" id="create-consorcio-importe_a" name="importe_a" value="{{ old('importe_a') }}" class="form-control"></td>
                    <td><input type="text" id="create-consorcio-importe_b" name="importe_b" value="{{ old('importe_b') }}" class="form-control"></td>
                    <td><input type="text" id="create-consorcio-importe_c" name="importe_c" value="{{ old('importe_c') }}" class="form-control"></td>
                    <td><input type="hidden" id="create-consorcio-rubro_id" name="rubro_id" value="{{ $rubro->id }}" class="form-control"><button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>{{ csrf_field() }}</td>
                </tr>

            </table>
        </form>

    </div>
</div>
