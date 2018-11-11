
    <form action="{{route('settings.consorcio.propiedades.update', $consorcio, false)}}" method="post" role="form">
        <div class="card card-default">
            <div class="card-header">{{__('Propiedades')}} - {{ __('Consorcio') }} {{ $consorcio->name }}</div>
            <div class="card-body">
                <table class="table table-striped table-responsive-lg">
                        <thead>
                            <tr>
                                <th scope="col">ID PH</th>
                                <th scope="col">Denominación</th>
                                <th scope="col">Coef. A</th>
                                <th scope="col">Coef. B</th>
                                <th scope="col">Coef. C</th>
                                <th scope="col">Coef. Ext. A</th>
                                <th scope="col">Coef. Ext. B</th>
                                <th scope="col">Coef. Ext. C</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consorcio->propiedades as $propiedad)
                            <tr>
                                <td>{{ $propiedad->id }} <input type="hidden" name="propiedades[{{ $propiedad->id }}][id]" id="propiedades-id-{{ $propiedad->id }}" value="{{ $propiedad->id }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][denominacion]" id="propiedades-denominacion-{{ $propiedad->id }}" size="10" value="{{ old('propiedades.' . $propiedad->id . '.denominacion', $propiedad->denominacion) }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_a]" id="propiedades-coeficiente_a-{{ $propiedad->id }}" value="{{ old('propiedades.' . $propiedad->id . '.coeficiente_a', $propiedad->coeficiente_a) }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_b]" id="propiedades-coeficiente_b-{{ $propiedad->id }}" value="{{ old('propiedades.' . $propiedad->id . '.coeficiente_b', $propiedad->coeficiente_b) }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_c]" id="propiedades-coeficiente_c-{{ $propiedad->id }}" value="{{ old('propiedades.' . $propiedad->id . '.coeficiente_c', $propiedad->coeficiente_c) }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_d]" id="propiedades-coeficiente_d-{{ $propiedad->id }}" value="{{ old('propiedades.' . $propiedad->id . '.coeficiente_d', $propiedad->coeficiente_d) }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_e]" id="propiedades-coeficiente_e-{{ $propiedad->id }}" value="{{ old('propiedades.' . $propiedad->id . '.coeficiente_e', $propiedad->coeficiente_e) }}" class="form-control"></td>
                                <td><input type="text" name="propiedades[{{ $propiedad->id }}][coeficiente_f]" id="propiedades-coeficiente_f-{{ $propiedad->id }}" value="{{ old('propiedades.' . $propiedad->id . '.coeficiente_f', $propiedad->coeficiente_f) }}" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"><b>{{ __('Totales:') }}</b></td>
                                <td>
                                    <div
                                        @if(!$consorcio->validateColumnPropiedades('coeficiente_a') )
                                            class="alert alert-danger"
                                        @else
                                            class="alert alert-success"
                                        @endif role="alert">
                                        {{ $consorcio->propiedades()->sum('coeficiente_a') }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        @if(!$consorcio->validateColumnPropiedades('coeficiente_b') )
                                            class="alert alert-danger"
                                        @else
                                            class="alert alert-success"
                                        @endif role="alert">
                                        {{ $consorcio->propiedades()->sum('coeficiente_b') }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        @if(!$consorcio->validateColumnPropiedades('coeficiente_c') )
                                            class="alert alert-danger"
                                        @else
                                            class="alert alert-success"
                                        @endif role="alert">
                                        {{ $consorcio->propiedades()->sum('coeficiente_c') }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        @if(!$consorcio->validateColumnPropiedades('coeficiente_d') )
                                            class="alert alert-danger"
                                        @else
                                            class="alert alert-success"
                                        @endif role="alert">
                                        {{ $consorcio->propiedades()->sum('coeficiente_d') }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        @if(!$consorcio->validateColumnPropiedades('coeficiente_e') )
                                            class="alert alert-danger"
                                        @else
                                            class="alert alert-success"
                                        @endif role="alert">
                                        {{ $consorcio->propiedades()->sum('coeficiente_e') }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        @if(!$consorcio->validateColumnPropiedades('coeficiente_f') )
                                            class="alert alert-danger"
                                        @else
                                            class="alert alert-success"
                                        @endif role="alert">
                                        {{ $consorcio->propiedades()->sum('coeficiente_f') }}
                                    </div>
                                </td>
                                <td></td>

                            </tr>
                        </tbody>
                </table>
                <div>
                    <button type="submit" class="btn btn-primary">{{__('Editar Propiedades')}}</button>
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
    </form>


    <div class="card card-default">
        <div class="card-header">{{__('Nueva Propiedad')}}</div>
        <div class="card-body">
            <form action="{{ route('settings.consorcio.propiedades.store', $consorcio, false) }}" method="post" role="form">
                <div class="form-group">
                    <label for="denominacion">{{__('Denominacion')}}</label>
                    <input type="text" id="denominacion" name="denominacion" value="{{ old('denominacion') }}" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Ejemplo: Piso 1 A Torre 1 o Lote 18 Mza 3</small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="coeficiente_a">{{__('Coeficiente A')}}</label>
                        <input type="text" id="coeficiente_a" name="coeficiente_a" value="{{ old('coeficiente_a', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="coeficiente_b">{{__('Coeficiente B')}}</label>
                        <input type="text" id="coeficiente_b" name="coeficiente_b" value="{{ old('coeficiente_b', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="coeficiente_c">{{__('Coeficiente C')}}</label>
                        <input type="text" id="coeficiente_c" name="coeficiente_c" value="{{ old('coeficiente_c', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="coeficiente_d">{{__('Coeficiente Ext. A')}}</label>
                        <input type="text" id="coeficiente_d" name="coeficiente_d" value="{{ old('coeficiente_d', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="coeficiente_e">{{__('Coeficiente Ext. B')}}</label>
                        <input type="text" id="coeficiente_e" name="coeficiente_e" value="{{ old('coeficiente_e', '0.0000000') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="coeficiente_f">{{__('Coeficiente Ext. C')}}</label>
                        <input type="text" id="coeficiente_f" name="coeficiente_f" value="{{ old('coeficiente_f', '0.0000000') }}" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{__('Agregar Propiedad')}}</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>