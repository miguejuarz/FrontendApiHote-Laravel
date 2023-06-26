@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Add Hotel.</p>
<div>
   <form action="{{ route('hotel.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name_hotel" class="form-label">Name</label>
        <input type="text" class="form-control" id="name_hotel" placeholder="Enter the hotel name" name="name_hotel">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Enter the hotel address" name="address">
    </div>
    <div class="mb-3">
        <label for="city_id" class="form-label">City</label>
    </div>
        <select name="city_id" class="form-select  mb-3" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            @foreach ($citiesData as $city)
            <option value="{{ $city['id']}}">{{$city['name_city']}}</option>
            @endforeach
          </select>
          
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone_number" placeholder="Enter the phone number" name="phone_number">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Enter the email" name="email">
    </div>
    <div class="mb-3">
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Add</button>
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