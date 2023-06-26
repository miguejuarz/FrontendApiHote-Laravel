@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div>
    <form action="{{ route('hotel.update')}}" method="POST">
     @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $hotelData['id'] }}">
    <div class="mb-3">
        <label for="name_hotel" class="form-label">Name</label>
        <input type="text" class="form-control" id="country"  name="name_hotel" value="{{ $hotelData['name_hotel'] }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address"  name="address" value="{{ $hotelData['address'] }}">
    </div>
    <div class="mb-3">
        <label for="city_id" class="form-label">City</label>
    </div>
        <select name="city_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="{{ $hotelData['city_id'] }}">{{ $hotelData['city']['name_city'] }}</option>
            @foreach ($citiesData as $city)
            <option value="{{ $city['id']}}">{{$city['name_city']}}</option>
            @endforeach
          </select>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone_number"  name="phone_number" value="{{ $hotelData['phone_number'] }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control" id="email"  name="email" value="{{ $hotelData['email'] }}">
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