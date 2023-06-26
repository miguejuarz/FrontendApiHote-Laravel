@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <h4>Details Pay</h4>
<div>
    <form action="">
    @csrf
    <input type="hidden" name="id" value="{{ $payData['id'] }}">
    <div class="mb-3">
        <label for="reservation_id" class="form-label">No. Reservation</label>
        <input disabled type="text" class="form-control" id="reservation_id"  name="reservation_id" value="{{ $payData['reservation_id'] }}">
    </div>
    <div class="mb-3">
        <label for="method_id" class="form-label">Payment Method</label>
        <input disabled type="text" class="form-control" id="method_id"  name="method_id" value="{{ $payData['method']['name'] }}">
    </div>
    <div class="mb-3">
        <label for="amountPayable" class="form-label">Amout</label>
        <input disabled type="text" class="form-control" id="amountPayable"  name="amountPayable" value="{{ $payData['amountPayable'] }}">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input disabled type="text" class="form-control" id="date"  name="date" value="{{ $payData['date'] }}">
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">State</label>
        <input disabled type="text" class="form-control" id="state"  name="state" value="{{ $payData['state'] }}">
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