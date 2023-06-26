@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Details Payment Method.</p>
<div>
    <form action="">
    @csrf
    <input type="hidden" name="id" value="{{ $Payment['id'] }}">
    <div class="mb-3">
        <label for="name" class="form-label">Payment Method</label>
        <input disabled type="text" class="form-control" id="name"  name="name" value="{{ $Payment['name'] }}">
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