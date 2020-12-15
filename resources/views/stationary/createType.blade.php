@extends('layouts.guest')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
     <title>@section('title','Create Stationary')</title>
</head>
@section('guest')
<div class="container">
    <div class="row">
        <div class="col-4">
<table class="table">
    <thead>
        <tr>
        <th scope="col">Number</th>
        <th scope="col">Stationary Type Name</th>
        </tr>
      </thead>
      @foreach ($stationarys as $product)
        <tbody>
          <tr>
          <th scope="row">{{$product->id}}</th>
          <td>{{$product->Name}}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
    <div class="col">
        <form class="form col-6" action="{{ url('createType')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="Image">Browse Photos</label>
                <input type="file" class="form-control-file" id="Image" name="Image">
            </div>
            <div class="form-group">
                <label for="Stationary">Stationary Type</label>
                <input type="text" name="Stationary" class="form-control" id="Stationary" aria-describedby="Stationary" placeholder="Stationary Type">
        </div>
        <button type="submit" class="btn btn-primary">Add Stationary Type</button>
        </form>
    </div>
    </div>
    </div>
@endsection
    </html>







