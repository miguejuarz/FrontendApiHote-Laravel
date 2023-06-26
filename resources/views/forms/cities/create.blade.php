@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Add City.</p>
<div>
   <form action="{{ route('city.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name_city" class="form-label">City</label>
        <input type="text" class="form-control" id="name_city" placeholder="Enter your city name" name="name_city">
    </div>
    <div class="mb-3">
        <label for="country_id" class="form-label">Country</label>
        <select name="country_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            @foreach ($countriesData as $country)
            <option value="{{ $country['id']}}">{{$country['name_country']}}</option>
            @endforeach
          </select>
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