@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center">Cities</h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('city.create') }}">
                <button class="btn btn-primary">Add</button>
            </a>
          </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($citiesData as $cityData)
          <tr>
            <td>{{ $cityData['id'] }}</td>
            <td>{{ $cityData['name_city'] }}</td>
            @if (isset($cityData['country']))
            <td>{{ $cityData['country']['name_country'] }}</td>
            @else
            <p>Country: N/A</p>
            @endif
            <td>
              <a href="{{ route('city.view', $cityData['id']) }}"><i class="fas fa-edit"></i></a>
              <a href="{{ route('city.show', $cityData['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>
              <a href="{{ route('city.delete', $cityData['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
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