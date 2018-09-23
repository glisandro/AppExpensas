<div class="card card-default">
    <div class="card-header">{{ _('Gastos') }}</div>
    <div class="table-responsive">
        <table class="table table-valign-middle mb-0">
            <thead>
                <th>Id</th>
                <th>Concepto</th>
                <th>Rubro</th>
                <th>Importe A</th>
                <th>Importe B</th>
                <th>Importe C</th>
            </thead>
            @foreach($presupuesto->gastos as $gasto)
                <tr>
                    <td>{{ $gasto->id }}</td>
                    <td>Concepto</td>
                    <td>{{ $gasto->concepto }}</td>
                    <td>{{ $gasto->importe_a }}</td>
                    <td>{{ $gasto->importe_b }}</td>
                    <td>{{ $gasto->importe_c }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
