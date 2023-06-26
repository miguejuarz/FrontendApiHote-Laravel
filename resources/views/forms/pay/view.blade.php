@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div>
    <form action="{{ route('pay.update')}}" method="POST">
        @csrf
       @method('PUT')
    <input type="hidden" name="id" value="{{ $payData['id'] }}">
    <div class="mb-3">
        <label for="reservation_id" class="form-label">No. Reservation</label>
        <input type="text" class="form-control" id="reservation_id"  name="reservation_id" value="{{ $payData['reservation_id'] }}">
    </div>
    <div class="mb-3">
        <label for="method_id" class="form-label">Payment Method</label>
        <input type="text" class="form-control" id="method_id"  name="method_id" value="{{ $payData['method']['name'] }}">
    </div>
    <div class="mb-3">
        <label for="amountPayable" class="form-label">Amount</label>
        <input type="text" class="form-control" id="amountPayable"  name="amountPayable" value="{{ $payData['amountPayable'] }}">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date"  name="date" value="{{ $payData['date'] }}">
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">State</label>
    </div>
    <div class="mb-3">
        <select name="state" class="form-select  mb-3" aria-label=".form-select-lg example">
            <option selected>{{ $payData['state'] }}</option>
            <option value="pending">Pending</option>
            <option value="inProgress">In progress</option>
            <option value="authorized">Authorized</option>
            <option value="paid">Paid</option>
            <option value="rejected">Rejected</option>
            <option value="canceled">Canceled</option>
        </select>
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