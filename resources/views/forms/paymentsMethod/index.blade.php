@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center"><strong>Payments Methods</strong></h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('payment.create') }}">
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
            @foreach ($data as $payment)
          <tr>
            <td>{{ $payment['id'] }}</td>
            <td>{{ $payment['name'] }}</td>
            <td>
                 <a href="{{ route('payment.view', $payment['id']) }}"><i class="fas fa-edit"></i></a>
                <a href="{{ route('payment.show', $payment['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>
               <a href="{{ route('payment.delete', $payment['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
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