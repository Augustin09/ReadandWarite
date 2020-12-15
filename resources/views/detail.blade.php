@extends('layouts.guest')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>@section('title','Detail')</title>
</head>

@section('guest')
{{-- Detail User --}}
@if (Auth::user()->role == 'user')
<div class="container">
    <div class="card-deck justify-content-center">
        <div class="card" style="max-width: 800px;">
            <div class="row no-gutters">
                <div class="col-md-3 m-1">
                    <img src="/{{'storage/img/'.$products->Image}}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Stationary Name: {{$products->Name}} </h5>
                        <p class="card-text">Stationary Price: {{$products->Price}}</p>
                        <p class="card-text">Stationary Stock: {{$products->Stock}}</p>
                        <p class="card-text">Stationary Type: {{$stationarys->Name}}</p>
                        <p class="card-text">Description: {{$products->Description}}</p>


                        <form class="card-link form-inline" action="{{ route('cart') }}" method="POST">
                            @csrf
                            @method('Post')
                            <div class="form-group mr-3">
                              <label for="qty" class="sr-only">Qty</label>
                              <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" value="1">
                              <input type="hidden" name="id" value="{{ $products->id }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-dark">Add to Cart</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Detail Admin --}}
@if (Auth::user()->role == 'admin')
<div class="container">
    <div class="card-deck justify-content-center">
        <div class="card" style="max-width: 800px;">
            <div class="row no-gutters">
                <div class="col-md-3 m-1">
                    <img src="/{{'storage/img/'.$products->Image}}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Stationary Name: {{$products->Name}} </h5>
                        <p class="card-text">Stationary Price: {{$products->Price}}</p>
                        <p class="card-text">Stationary Type: {{$stationarys->Name}}</p>
                        <p class="card-text">Description: {{$products->Description}}</p>
                        <p class="card-text">Stationary Stock: {{$products->Stock}}</p>
                        <div class="card-link form-inline">
                            <a href={{ url('/detail/edit/'.$products->Name)}}>
                                <button class="btn-primary">Edit</button>
                            </a>
                            <form class="m-0 p-2" action="{{ url('delete', ['name'=>$products->Name])}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

</html>

