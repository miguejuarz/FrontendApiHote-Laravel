@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center"><strong>Countries</strong></h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('country.create') }}">
                <button class="btn btn-primary">Add</button>
            </a>
          </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $country)
          <tr>
            <td>{{ $country['id'] }}</td>
            <td>{{ $country['name_country'] }}</td>
            <td>
                <a href="{{ route('country.view', $country['id']) }}"><i class="fas fa-edit"></i></a>
                <a href="{{ route('country.show', $country['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>
                <a href="{{ route('country.delete', $country['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
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