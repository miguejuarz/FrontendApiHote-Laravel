@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center"><strong>Customers</strong></h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('customer.create') }}">
                <button class="btn btn-primary">Add</button>
            </a>
          </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody> 
            @foreach ($data as $customer)
          <tr>
            <td>{{ $customer['id'] }}</td>
            <td>{{ $customer['customer_name'] }}</td>
            <td>{{ $customer['last_name'] }}</td>
            <td>{{ $customer['email'] }}</td>
            <td>{{ $customer['phone_number'] }}</td>
            <td>
                <a href="{{ route('customer.view', $customer['id']) }}"><i class="fas fa-edit"></i></a> 

                <a href="{{ route('customer.show', $customer['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>
                <a href="{{ route('customer.delete', $customer['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
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