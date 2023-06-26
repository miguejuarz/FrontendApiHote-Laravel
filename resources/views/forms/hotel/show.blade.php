@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <h4>Details <strong> {{$hotelData['name_hotel'] }}</strong></h4>
<div>
    <form action="">
    @csrf
    <input type="hidden" name="id" value="{{ $hotelData['id'] }}">
    <div class="mb-3">
        <label for="name_hotel" class="form-label">Name</label>
        <input disabled type="text" class="form-control" id="name_hotel"  name="name_hotel" value="{{ $hotelData['name_hotel'] }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input disabled type="text" class="form-control" id="address"  name="address" value="{{ $hotelData['address'] }}">
    </div>
    <div class="mb-3">
        <label for="name_city" class="form-label">City</label>
        <input disabled type="text" class="form-control" id="name_city"  name="name_city" value="{{ $hotelData['city']['name_city'] }}">
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone</label>
        <input disabled type="text" class="form-control" id="phone_number"  name="phone_number" value="{{ $hotelData['phone_number'] }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input disabled type="text" class="form-control" id="email"  name="email" value="{{ $hotelData['email'] }}">
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