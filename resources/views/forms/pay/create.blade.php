@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Add Pays</p>
<div>
   <form action="{{ route('pay.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="reservation_id" class="form-label">Codigo Reservacion</label>
    </div>
    <select name="reservation_id" class="form-select  mb-3" aria-label=".form-select-lg example">
        <option selected>Open this select menu</option>
        @foreach ($reservationData as $reservation)
        <option value="{{ $reservation['id']}}">{{$reservation['id']}}</option>
        @endforeach
    </select>
    <div class="mb-3">
        <label for="method_id" class="form-label">Payment Menthod</label>
    </div>
        <select name="method_id" class="form-select  mb-3" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            @foreach ($paymentData as $payment)
            <option value="{{ $payment['id']}}">{{$payment['name']}}</option>
            @endforeach
        </select>
          
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" class="form-control" id="phone_number" placeholder="Enter the amount payable" name="amount">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" placeholder="Enter the date" name="date">
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">State</label>
    </div>
    <div class="mb-3">
        <select name="state" class="form-select  mb-3" aria-label=".form-select-lg example">
            <option selected>select state</option>
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
            <button class="btn btn-primary" type="submit">Add</button>
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