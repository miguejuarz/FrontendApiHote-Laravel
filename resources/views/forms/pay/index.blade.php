@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h5 class="text-center"><strong>Pay</strong></h5>
@stop

@section('content')
    
    <div class="mb-3">
        <div class="d-grid gap-2">
            <a href="{{ route('pay.create') }}">
                <button class="btn btn-primary">Add</button>
            </a>
          </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No. reservacion</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">State</th>
            <th class="text-center" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>


            @foreach ($paysData as $payData)
          <tr>
            <td>{{ $payData['id'] }}</td>
            <td>{{ $payData['reservation_id'] }}</td>
            @if (isset($payData['pay_method']))
            <td>{{ $payData['pay_method']['name'] }}</td>
            @else
            <p>No Payment Method Found</p>
            @endif
            <td>{{ $payData['amountPayable'] }}</td>
            <td>{{ $payData['date'] }}</td>
            <td>{{ $payData['state'] }}</td>

            <td class="">
             <a href="{{ route('pay.view', $payData['id']) }}"><i class="fas fa-edit ml-4"></i></a>
              <a href="{{ route('pay.show', $payData['id']) }}"><i class="fas fa-eye ml-3" style="color: #31a04b;"></i></a>  
              <a href="{{ route('pay.delete', $payData['id']) }}"><i class="fas fa-trash-alt ml-3" style="color: #ff0000;"></i></a>
                
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