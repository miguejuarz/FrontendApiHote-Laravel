@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Add Country.</p>
<div>
   <form action="{{ route('country.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name_country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" placeholder="Enter your country name" name="name_country">
    </div>
    <div class="mb-3">
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Agregar</button>
          </div>
    </div>
   </form>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop