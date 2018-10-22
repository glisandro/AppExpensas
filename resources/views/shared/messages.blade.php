@if (session('warnings'))
    <div class="alert alert-warning">
        {{ session('warnings') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif