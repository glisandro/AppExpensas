<div class="card">
    <div class="card-header">{{ _('Ingresar Gasto') }}</div>
    <div class="card-body">
        <form action="{{route('consorcios.gastos.store', [$consorcio, $presupuesto], false)}}" method="post" role="form">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Concepto')}}</label>
                <div class="col-md-6">
                    <input type="text" id="create-consorcio-periodo" name="concepto" value="{{ old('concepto') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Importe A')}}</label>
                <div class="col-md-6">
                    <input type="text" id="create-consorcio-importe_a" name="importe_a" value="{{ old('importe_a') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Importe B')}}</label>
                <div class="col-md-6">
                    <input type="text" id="create-consorcio-importe_b" name="importe_b" value="{{ old('importe_b') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Importe C')}}</label>
                <div class="col-md-6">
                    <input type="text" id="create-consorcio-importe_c" name="importe_c" value="{{ old('importe_c') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Extraordinaria</div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" id="create-consorcio-extraordinaria" name="extraordinaria" value="{{ old('extraordinaria') }}" class="form-check-input">
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="offset-md-4 col-md-6">
                    <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </div>
</div>

