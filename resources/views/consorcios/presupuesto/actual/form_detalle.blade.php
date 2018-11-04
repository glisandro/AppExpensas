<form action="{{route('consorcios.detalles.store', [$consorcio], false)}}" method="post" role="form">
    <table class="table table-valign-middle mb-0">
        <thead>
        <tr>
            <td><input type="text" id="create-consorcio-concepto" name="concepto" value="{{ old('concepto') }}" class="form-control"></td>
            <td><input type="text" id="create-consorcio-importe_a" name="importe_a" value="{{ old('importe_a') }}" class="form-control"></td>
            <td><input type="text" id="create-consorcio-importe_b" name="importe_b" value="{{ old('importe_b') }}" class="form-control"></td>
            <td><input type="text" id="create-consorcio-importe_c" name="importe_c" value="{{ old('importe_c') }}" class="form-control"></td>
            <td><button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>{{ csrf_field() }}</td>
        </tr>

    </table>
</form>

<div class="card">
    <div class="card-header">{{ _('Ingresar Gasto') }}</div>
    <div class="card-body">
        <form action="{{route('consorcios.detalles.store', [$consorcio], false)}}" method="post" role="form">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Concepto')}}</label>
                <div class="col-md-6">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Importe A')}}</label>
                <div class="col-md-6">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Importe B')}}</label>
                <div class="col-md-6">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Importe C')}}</label>
                <div class="col-md-6">

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Rubro')}}</label>
                <div class="col-md-6">
                    <input type="text" id="create-consorcio-rubro_id" name="rubro_id" value="{{ $rubro->id }}" class="form-control">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="offset-md-4 col-md-6">

                </div>
            </div>
        </form>
    </div>
</div>

