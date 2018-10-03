<!-- Left Side Of Navbar -->

<!-- Switch Current Team -->
<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Consorcios
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach (Auth::user()->teams as $team)
                @foreach($team->consorcios as $consorcio)
                    @if (! empty(request('consorcio')) and request('consorcio')->id === $consorcio->id)
                        <i class="fa fa-fw text-left fa-btn fa-check text-success"></i> {{ $consorcio->name }}
                    @else
                        <a class="dropdown-item" href="/consorcios/{{ $consorcio->id }}">{{ $consorcio->name }}</a>
                    @endif
                @endforeach
        @endforeach
    </div>
</div>