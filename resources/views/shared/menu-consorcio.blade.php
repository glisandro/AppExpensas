<aside>
                <ul class="nav flex-column mb-4 ">

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('settings.consorcio.index', $consorcio) }}">
                            <i class="fa fa-fw text-left fa-btn fa-cog"></i>{{request('consorcio')->name}}
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('consorcios.presupuesto.actual',$consorcio) }}">
                            {{__('Presupuestos')}}
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/consorcios/{{ request('consorcio')->id }}/cc">
                            {{__('Cuenta corriente')}}
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/consorcios/{{ request('consorcio')->id }}/cobros">
                            {{__('Cobros')}}
                        </a>
                    </li>
               </ul>
            </aside>

