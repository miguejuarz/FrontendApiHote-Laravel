@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Add Room.</p>
<div>
   <form action="{{ route('room.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="hotel_id" class="form-label">Hotel</label>
    </div>
        <select name="hotel_id" class="form-select  mb-3" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            @foreach ($hotelsData as $hotel)
            <option value="{{ $hotel['id']}}">{{$hotel['name_hotel']}}</option>
            @endforeach
          </select>    
    <div class="mb-3">
        <label for="type_room" class="form-label">Type Room</label>
    </div>
    <div class="mb-3">
        <select id="type_room" name="type_room">
            <option selected>Open this select menu</option>
            <option value="Individual">Individual</option>
            <option value="Double">Double</option>
            <option value="Matrimonial">Matrimonial</option>
            <option value="Suite">Suite</option>
            <option value="Executive">Executive</option>
            </select>
        </div>
    <div class="mb-3">
        <label for="night_price" class="form-label">Night Price</label>
        <input type="number" class="form-control" id="night_price" placeholder="Enter the night price" name="night_price">
    </div>
    <div class="mb-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input type="number" class="form-control" id="capacity" placeholder="Enter the capacity" name="capacity">
    </div>
    <div class="mb-3">
        <label for="description_room" class="form-label">Decription</label>
        <input type="text" class="form-control" id="description_room" placeholder="Enter the description" name="description_room">
    </div>
    <div class="mb-3">
            <label for="availability">¿Disponible?</label>
            <input type="checkbox" name="availability" value="disponible">
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