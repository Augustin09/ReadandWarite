@extends('layouts.guest')

@section('guest')

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

{{-- Insert --}}

<div class="container">
    <div class="row justify-content-center ">
        <form class="form col-5" action="{{ url('insert')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="Image">Browse Photos</label>
                <input type="file" class="form-control-file" id="Image" name="Image">
            </div>
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" class="form-control" id="Name" aria-describedby="Name">
        </div>
        <div class=" form-group">
                <label for="Description">Description</label>
                <input type="text" name="Description" class="form-control" id="Description">
            </div>
            <div class="form-group">
                <label for="Stationary">Stationary Type</label>
                <select id="Stationary" name="Stationary" class="form-control">
                    @foreach ($stationarys as $stationary)
                    <option selected id="Stationary" selected value="{{$stationary->id}}">{{$stationary->Name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="number" name="Stock" class="form-control" id="Stock" aria-describedby="Stock">
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" class="form-control" name="Price" id="Price" aria-describedby="Price">
            </div>
            <button type="submit" class="btn btn-primary">Add Stationary Data</button>
        </form>
    </div>
</div>
@endsection
