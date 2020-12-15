@extends('layouts.guest')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>@section('title','Cart')</title>
</head>
@section('guest')
@forelse ($carts as $row)
<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title">{{$row['name']}}</h5>
        <ul>
            <li>Stationary Price: Rp{{number_format($row['price'])}}</li>
            <li>Quantity: {{$row['qty']}}</li>
        </ul>
        <div class="card-footer">
            <h5>Total: Rp{{ number_format($row['price'] * $row['qty']) }}</h5>
        </div>
        <div class="form-inline">
            <a href="{{ url('/update/cart/'.$row['name']) }}" class="btn btn-primary m-3">Update</a>

            <form action="{{ url('/cart/'.$row['name']) }}" method="post">
                @csrf
                @method('Delete')

                <button class="btn btn-danger">Delete</button>

        </div>
    </div>
    </form>
</div>
@endforeach
<div class="form form-group pl-4">
    <button class="btn btn-danger">Checkout</button>
</div>

@endsection
