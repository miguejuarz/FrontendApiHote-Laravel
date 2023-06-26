@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Detalle City.</p>
<div>
    <form action="">
    @csrf
    <input type="hidden" name="id" value="{{ $cityData['id'] }}">
    <div class="mb-3">
        <label for="name_country" class="form-label">City</label>
        <input disabled type="text" class="form-control" id="country"  name="name_country" value="{{ $cityData['name_city'] }}">
    </div>
    <div class="mb-3">
        <label for="name_country" class="form-label">Country</label>
        <input disabled type="text" class="form-control" id="country"  name="name_country" value="{{ $cityData['country']['name_country'] }}">
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