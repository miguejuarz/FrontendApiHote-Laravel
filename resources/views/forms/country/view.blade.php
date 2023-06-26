@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <p>Edit Country.</p>
<div>
   <form action="{{ route('country.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $country['id'] }}">
    <div class="mb-3">
        <label for="name_country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country"  name="name_country" value="{{ $country['name_country'] }}">
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