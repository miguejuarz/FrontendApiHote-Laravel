@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Edit City.</p>
<div>
    <form action="{{ route('city.update')}}" method="POST">
        @csrf
        @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $cityData['id'] }}">
    <div class="mb-3">
        <label for="name_city" class="form-label">City</label>
        <input type="text" class="form-control" id="country"  name="name_city" value="{{ $cityData['name_city'] }}">
    </div>
    <div class="mb-3">
        <label for="country_id" class="form-label">Country</label>
        <select name="country_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="{{ $cityData['country_id'] }}">{{ $cityData['country']['name_country'] }}</option>
            @foreach ($countriesData as $country)
            <option value="{{ $country['id']}}">{{$country['name_country']}}</option>
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update</button>
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