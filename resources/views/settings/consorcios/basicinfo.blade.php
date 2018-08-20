
    <div class="card card-default">
        <div class="card-header">{{__('Informacion General')}}</div>
        <div class="card-body">
            <form action="{{route('settings.consorcio.edit', $consorcio, false)}}" method="post" role="form">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Nombre')}}</label>
                    <div class="col-md-6">
                        <input type="text" id="basicinfo-consorcio-name" name="name" value="{{ $consorcio->name }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="offset-md-4 col-md-6">
                        <button type="submit" class="btn btn-primary">{{__('Modificar')}}</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
