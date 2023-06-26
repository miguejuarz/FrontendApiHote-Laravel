@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Edit Payment Method.</p>
<div>
    <form action="{{ route('payment.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $payment['id'] }}">
    <div class="mb-3">
        <label for="name" class="form-label">Payment Method</label>
        <input type="text" class="form-control" id="name"  name="name" value="{{ $payment['name'] }}">
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