@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Details Room.</p>
<div>
   <form>
    @csrf
    <input type="hidden" name="id" value="{{ $roomData['id'] }}">
    <div class="mb-3">
        <label for="name_hotel" class="form-label">Hotel</label>
        @if (isset($roomData['hotel']))
        <input disabled type="text" class="form-control" id="name_hotel"  name="name_hotel" value="{{ $roomData['hotel']['name_hotel'] }}">
        @endif
    </div>  
    <div class="mb-3">
        <label for="type_room" class="form-label">Type Room</label>
        <input disabled type="text" class="form-control" id="type_room" name="type_room" value="{{ $roomData['type_room']}}">
    </div>
    <div class="mb-3">
        <label for="night_price" class="form-label">Night Price</label>
        <input disabled type="number" class="form-control" id="night_price" name="night_price" value="{{ $roomData['night_price']}}">
    </div>
    <div class="mb-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input disabled type="number" class="form-control" id="capacity" name="capacity" value="{{ $roomData['capacity']}}">
    </div>
    <div class="mb-3">
        <label for="description_room" class="form-label">Decription</label>
        <input disabled type="text" class="form-control" id="description_room" name="description_room" value="{{ $roomData['description_room']}}">
    </div>
    <div class="mb-3">
            <label for="availability">¿Disponible?</label>
            @if (isset($roomData['aviable']) && $roomData['aviable'] == "disponible")            
            <input disabled type="checkbox" checked name="availability" value="disponible">
            @else
            <input disabled type="checkbox" name="availability" value="disponible">
            @endif
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