@extends('layouts.app')

@section('content')
    <div class="container align-content-center">

        <hr>
    <a href="{{route('ordertype.index')}}" class="btn btn-lg btn-primary">Back</a>
        <hr>
        <form action="{{(Route::is('ordertype.create'))? route('ordertype.store') : route('ordertype.update',$types->id)}}" method="post">
            @if(!Route::is('ordertype.create'))
            @method('PUT')
            @endif
            @csrf
            <div class="form-group align-content-center">
              <label for="type" class="col-sm-2 col-form-label">Order Type</label>         
            <input type="text" class="form-control" name="type" id="type" placeholder="Enter Order Type" value="{{$types->type ?? ''}}"required>         
            </div>
            <button type="submit" class="btn btn-primary">{{(Route::is('ordertype.create')) ? 'Create' : 'Update'}}</button>
          </form>
    </div>
@endsection