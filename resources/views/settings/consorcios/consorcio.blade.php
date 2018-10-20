@extends('layout.appexpensas')

@section('scripts')

@endsection

@section('content')
    <settings :user="user" :teams="teams" inline-template>
        <div class="spark-screen container">
            <div class="row">
                <!-- Tabs -->
                <div class="col-md-3 spark-settings-tabs">
                    <aside>
                        <h3 class="nav-heading ">
                            {{__('Settings')}}
                        </h3>
                        <ul class="nav flex-column mb-4 ">

                            <li class="nav-item ">
                                <a class="nav-link" href="#basic" aria-controls="basic" role="tab" data-toggle="tab">
                                    <svg class="icon-20 " viewBox="0 0 20 20 " xmlns="http://www.w3.org/2000/svg ">
                                        <path d="M10 20C4.4772 20 0 15.5228 0 10S4.4772 0 10 0s10 4.4772 10 10-4.4772 10-10 10zm0-17C8.343 3 7
              4.343 7 6v2c0 1.657 1.343 3 3 3s3-1.343 3-3V6c0-1.657-1.343-3-3-3zM3.3472 14.4444C4.7822 16.5884 7.2262 18 10
              18c2.7737 0 5.2177-1.4116 6.6528-3.5556C14.6268 13.517 12.3738 13 10 13s-4.627.517-6.6528 1.4444z "></path>
                                    </svg>
                                    {{__('Basic info')}}
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="#uf" aria-controls="uf" role="tab" data-toggle="tab">
                                    <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 18 20 ">
                                        <path d="M3 8V6c0-3.3 2.7-6 6-6s6 2.7 6 6v2h1c1 0 2 1 2 2v8c0 1-1 2-2 2H2c-1 0-2-1-2-2v-8c0-1 1-2 2-2h1zm5
              6.7V17h2v-2.3c.6-.3 1-1 1-1.7 0-1-1-2-2-2s-2 1-2 2c0 .7.4 1.4 1 1.7zM6 6v2h6V6c0-1.7-1.3-3-3-3S6 4.3 6 6z "
                                        />
                                    </svg>
                                    {{__('Unidades Funcionales')}}
                                </a>
                            </li>

                        </ul>
                    </aside>

                </div>

                <!-- Tab cards -->
                <div class="col-md-9">
                    <div class="tab-content">
                        @include('spark::shared.errors')
                        @include('shared.messages')
                        <!-- Basic Info -->
                        <div role="tabcard" class="tab-pane active" id="basic">
                            @include('settings.consorcios.basicinfo')
                        </div>

                        <!-- Unidades funcionales -->
                        <div role="tabcard" class="tab-pane" id="uf">
                            @include('settings.consorcios.propiedades.propiedades')
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </settings>
@endsection
