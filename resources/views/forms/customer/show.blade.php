@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Detalle Customer.</p>
<div>
    <form action="">
    @csrf
    <input type="hidden" name="id" value="{{ $customer['id'] }}">

    <div class="mb-3">
        <label for="customer_name" class="form-label">Name</label>
        <input disabled type="text" class="form-control" id="customer_name" placeholder="Enter customer name" name="customer_name" value="{{ $customer['customer_name']}}">
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input disabled type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="{{ $customer['last_name']}}">
    </div>
    <div class="mb-3">
        <label  for="email" class="form-label">Email</label>
        <input disabled type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $customer['email']}}">
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input disabled type="text" class="form-control" id="phone_number" placeholder="Enter email" name="phone_number" value="{{ $customer['phone_number']}}">
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