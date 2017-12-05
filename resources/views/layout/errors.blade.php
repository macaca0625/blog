@foreach($errors->all() as $error)
    <div class="form-group row alert alert-danger" role="alert">{{ $error }}</div>
@endforeach
