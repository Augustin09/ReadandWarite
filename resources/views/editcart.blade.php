@extends('layouts.guest')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title','Edit Cart')</title>
</head>

{{-- Edit Cart User --}}
@section('guest')
<div class="container">
    <div class="card-deck justify-content-center">
        <div class="card" style="max-width: 800px;">
            <div class="row no-gutters">
                <div class="col-md-3 m-1">
                    {{-- @foreach ($data as $data) --}}
                    <img src="/{{'storage/img/'.$data['products']['Image']}}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Stationary Name: {{$data['carts']['name']}} </h5>
                        <p class="card-text">Stationary Price: {{$data['carts']['price']}}</p>
                        <p class="card-text">Stationary Quantity: {{$data['carts']['qty']}}</p>
                        <p class="card-text">Stationary Type: {{$data['products']['Name']}}</p>
                        <p class="card-text">Description: {{$data['products']['Description']}}</p>


                        <form class="card-link form-inline" action="{{ url('/update/cart/'.$data['carts']['name']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mr-3">
                              <label for="qty" class="sr-only">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty[]" placeholder="Quantity" value="{{$data['carts']['qty']}}">
                              <input type="hidden" name="id[]" value="{{ $data['carts']['id']}}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-dark">Update Cart</button>
                          </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
</html>
