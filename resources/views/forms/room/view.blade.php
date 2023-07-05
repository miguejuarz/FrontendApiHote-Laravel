@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop 

@section('content')

    <p>Details Room.</p>
<div>
    <form action="{{ route('room.update')}}" method="POST">
        @csrf
        @method('PUT')
    <input type="hidden" name="id" value="{{ $roomData['id'] }}">
    <div class="mb-3">
        <label for="name_hotel" class="form-label">Hotel</label>
    </div>
    <div class="mb-3">
        <select name="hotel_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="{{ $roomData['hotel_id'] }}">{{ $roomData['hotel']['name_hotel'] }}</option>
            @foreach ($hotelsData as $hotel)
            <option value="{{ $hotel['id']}}">{{$hotel['name_hotel']}}</option>
            @endforeach
          </select>

    </div>  
    <div class="mb-3">
        <label for="type_room" class="form-label">Type Room</label>
    </div>

    <div class="mb-3">
        <select id="type_room" name="type_room">
            <option selected value="{{ $roomData['type_room']}}">{{ $roomData['type_room']}}</option>
            <option value="Individual">Individual</option>
            <option value="Double">Double</option>
            <option value="Matrimonial">Matrimonial</option>
            <option value="Suite">Suite</option>
            <option value="Executive">Executive</option>
            </select>
        </div>
    <div class="mb-3">
        <label for="night_price" class="form-label">Night Price</label>
        <input type="number" class="form-control" id="night_price" name="night_price" value="{{ $roomData['night_price']}}">
    </div>
    <div class="mb-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $roomData['capacity']}}">
    </div>
    <div class="mb-3">
        <label for="description_room" class="form-label">Decription</label>
        <input type="text" class="form-control" id="description_room" name="description_room" value="{{ $roomData['description_room']}}">
    </div>
    <div class="mb-3">
            <label for="availability">¿Disponible?</label>
            @if (isset($roomData['aviable']) && $roomData['aviable'] == "disponible")            
            <input type="checkbox" checked name="availability" value="disponible">
            @else
            <input type="checkbox" name="availability" value="disponible">
            @endif
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