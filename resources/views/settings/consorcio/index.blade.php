@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">{{__('Dashboard')}}</div>

                        <div class="card-body">
                            <ul>
                            @foreach($consorcios as $consorcio)
                                    <li><a href="/settings/consorcios/{{ $consorcio->id }}/propiedades">{{ $consorcio->name }}</a> </li>
                            @endforeach
                            </ul>
                            <nav area-lavel="Pagination"> {!! $consorcios->render() !!}</nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection
