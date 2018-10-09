@extends('layout.consorcios')

@section('menu')
    @include('shared.menu-consorcio')
@endsection

@section('content-main')
    <div class="card card-default">
        <div class="card-header">{{__('First')}}</div>
        <div class="card-body">
            <button>First</button>
        </div>
    </div>
@endsection
