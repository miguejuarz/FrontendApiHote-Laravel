@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <h6>Add Payment Method.</h6>
<div>
   <form action="{{ route('payment.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Payments Method</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your Payment Method" name="name">
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