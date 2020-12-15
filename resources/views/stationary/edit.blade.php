@extends('layouts.guest')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>@section('title,Edit Stationary')</title>
</head>


@section('guest')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Update Failed</strong> Sorry there was an error when inputting data<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- Edit Stationary --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Stationary Type Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($stationarys as $product)
                <tbody>
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->Name}}</td>
                        <td>
                            <div class="form-inline">
                                <form class="form" action="{{ url('stationary/edit',[$product->id])}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('Put')
                                    <div class="form-group">
                                        <input type="text" name="Name" class="form-control" id="Stationary"
                                            aria-describedby="Stationary" placeholder="Stationary Type">
                                        <button type="submit" class="btn btn-primary ml-1 mr-1">Update</button>
                                    </div>
                                </form>
                                <form class="form" action="{{url('stationary/delete',[$product->id])}}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

</html>
