@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="spark-screen container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-md-3 spark-settings-tabs">
                    @include('shared.menu-global')
                </div>
                <div class="col-md-9">
                    @include('spark::shared.errors')
                    <div class="card card-default">
                        <div class="card-header">{{__('Nuevo Consorcio')}}</div>
                        <div class="card-body">
                            <form action="{{route('settings.consorcio.store', false)}}" method="post" role="form">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{__('Nombre')}}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="create-consorcio-name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="offset-md-4 col-md-6">
                                        <button type="submit" class="btn btn-primary">{{__('Crear')}}</button>
                                        {{ csrf_field() }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection
