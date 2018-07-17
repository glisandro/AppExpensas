
    <div class="card card-default">
        <div class="card-header">{{__('Nueva Propiedad')}}</div>
        <div class="card-body">
            <form action="{{route('consorcio.propiedades.store', $consorcio)}}" method="post" role="form">
                <div class="form-group">
                    <label for="denominacion">{{__('Denominacion')}}</label>
                    <input type="text" id="denominacion" name="denominacion" value="{{ old('denominacion') }}" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Ejemplo: Piso 1 A Torre 1 o Lote 18 Mza 3</small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="coeficiente_a">{{__('Coeficiente A')}}</label>
                        <input type="text" id="coeficiente_a" name="coeficiente_a" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coeficiente_b">{{__('Coeficiente B')}}</label>
                        <input type="text" id="coeficiente_b" name="coeficiente_b" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coeficiente_c">{{__('Coeficiente C')}}</label>
                        <input type="text" id="coeficiente_c" name="coeficiente_c" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="coeficiente_d">{{__('Coeficiente D')}}</label>
                        <input type="text" id="coeficiente_d" name="coeficiente_d" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coeficiente_e">{{__('Coeficiente E')}}</label>
                        <input type="text" id="coeficiente_e" name="coeficiente_e" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coeficiente_f">{{__('Coeficiente F')}}</label>
                        <input type="text" id="coeficiente_f" name="coeficiente_f" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{__('Agregar Propiedad')}}</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">{{__('Propiedades')}} - {{ __('Consorcio') }} {{ $consorcio->name }}</div>
        <div class="card-body">
            <form action="{{route('consorcio.propiedades.update', $consorcio)}}" method="post" role="form">
                <button type="submit" class="btn btn-primary">{{__('Editar')}}</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Denominación</th>
                            <th scope="col">Coef. A</th>
                            <th scope="col">Coef. B</th>
                            <th scope="col">Coef. C</th>
                            <th scope="col">Coef. D</th>
                            <th scope="col">Coef. E</th>
                            <th scope="col">Coef. F</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consorcio->propiedades as $propiedad)

                        <tr>
                            <th scope="row">{{ $propiedad->id }} <input type="hidden" name="propiedades[{{ $propiedad->id }}][id]" id="propiedades-id-{{ $propiedad->id }}" size="10" value="{{ $propiedad->id }}" class="form-control"></th>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][denominacion]" id="propiedades-denominacion-{{ $propiedad->id }}" size="10" value="{{ $propiedad->denominacion }}" class="form-control"></td>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_a]" id="propiedades-coeficiente_a-{{ $propiedad->id }}" value="{{ $propiedad->coeficiente_a }}" class="form-control"></td>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_b]" id="propiedades-coeficiente_b-{{ $propiedad->id }}" value="{{ $propiedad->coeficiente_b }}" class="form-control"></td>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_c]" id="propiedades-coeficiente_c-{{ $propiedad->id }}" value="{{ $propiedad->coeficiente_c }}" class="form-control"></td>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_d]" id="propiedades-coeficiente_d-{{ $propiedad->id }}" value="{{ $propiedad->coeficiente_d }}" class="form-control"></td>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_e]" id="propiedades-coeficiente_e-{{ $propiedad->id }}" value="{{ $propiedad->coeficiente_e }}" class="form-control"></td>
                            <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_f]" id="propiedades-coeficiente_f-{{ $propiedad->id }}" value="{{ $propiedad->coeficiente_f }}" class="form-control"></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">{{__('Editar')}}</button>
                        </div>
                    </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>