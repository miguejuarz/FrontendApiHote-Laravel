@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center"><strong>Hotel</strong></h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('hotel.create') }}">
                <button class="btn btn-primary">Add</button>
            </a>
          </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">city</th>
            <th scope="col">Phone</th>
            <th scope="col">email</th>
            <th class="text-center" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hotelsData as $hotelData)
          <tr>
            <td>{{ $hotelData['id'] }}</td>
            <td>{{ $hotelData['name_hotel'] }}</td>
            <td>{{ $hotelData['address'] }}</td>
            @if (isset($hotelData['city']))
            <td>{{ $hotelData['city']['name_city'] }}</td>
            @endif
            <td>{{ $hotelData['phone_number'] }}</td>
            <td>{{ $hotelData['email'] }}</td>

            <td class="">
              <a href="{{ route('hotel.view', $hotelData['id']) }}"><i class="fas fa-edit ml-4"></i></a>
              <a href="{{ route('hotel.show', $hotelData['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>
              <a href="{{ route('hotel.delete', $hotelData['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
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