@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center"><strong>Rooms</strong></h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('room.create') }}">
                <button class="btn btn-primary">Add</button>
            </a>
          </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Hotel</th>
            <th scope="col">Type Room</th>
            <th scope="col">Night Price</th>
            <th scope="col">Capacity</th>
            <th scope="col">Description</th>
            <th scope="col">Available</th>
            <th class="text-center" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roomsData as $roomData)
          <tr>
            <td>{{ $roomData['id'] }}</td>
            @if (isset($roomData['hotel']))
            <td>{{ $roomData['hotel']['name_hotel'] }}</td>
            @endif
            <td>{{ $roomData['type_room'] }}</td>
            <td>{{ $roomData['night_price'] }}</td>
            <td>{{ $roomData['capacity'] }}</td>
            <td>{{ $roomData['description_room'] }}</td>
            <td>{{ $roomData['aviable'] }}</td>

            <td class="">
               <a href="{{ route('room.view', $roomData['id']) }}"><i class="fas fa-edit ml-4"></i></a>
              <a href="{{ route('room.show', $roomData['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>
             <a href="{{ route('room.delete', $roomData['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop