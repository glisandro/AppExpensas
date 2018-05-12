@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">{{__('Propiedades')}} - {{ __('Consorcio') }} {{ $consorcio->name }}</div>

                        <div class="card-body">
                            <ul>
                            @foreach($propiedades as $propiedad)
                                    <li><a href="/settings/consorcios/{{ $propiedad->id }}/propiedades">{{ $propiedad->denominacion }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection
