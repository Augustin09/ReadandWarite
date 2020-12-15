@extends('layouts.guest')

@section('guest')

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Edit Failed</strong> Sorry there was an error when inputting data<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
<div class="row justify-content-center ">
    @if (session()->get('success'))
        <div class="alert alert-success">
            <p>{{session()->get('success') }}</p>
        </div>

        @endif
{{-- Update --}}

<form class="form col-5" action="{{ url('/update/edit/'.$products->Name) }}" method="POST" >
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name">Name</label>
    <input type="text" name="Name" class="form-control" id="Name" aria-describedby="Name" value="{{$products->Name}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
    <input type="text" name="Description" class="form-control" id="Description" value="{{$products->Description}}">
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
    <input type="number" name="Stock" class="form-control" id="Stock" aria-describedby="Stock" value="{{$products->Stock}}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
    <input type="number" class="form-control" name="Price" id="Price" aria-describedby="Price" value="{{$products->Price}}">
      </div>
    <button type="submit"  class="btn btn-primary">Update Stationary Data</button>
  </form>
</div>
</div>


@endsection
