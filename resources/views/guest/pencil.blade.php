@extends('layouts.guest')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

    <title>@section('title','Pencil Stationary')</title>
</head>
@section('guest')
{{-- Welcome Guest Berdasarkan kategori  --}}
    @guest
    <div class="container">
        <div class="row row-cols-3">
            @foreach ($stationarys as $pencil)
            <div class="card-group p-3">
                <div class="card">
                        <img src="{{'storage/img/'.$pencil->Image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$pencil->Name}}</h5>
                            <p class="card-text">{{$pencil->Description}}</p>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$stationarys->links()}}
    </div>

    {{-- Else Guest --}}
    @else
    {{-- User --}}

    @if (Auth::user()->role == 'user' )
    <div class="container">
        <div class="row row-cols-3">
            @foreach ($stationarys as $pencil)
            <div class="card-group p-3">
                <div class="card">
                    <a href="{{ url('/detail/'.$pencil->Name)}}">
                        <img src="{{'storage/img/'.$pencil->Image}}" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$pencil->Name}}</h5>
                            <p class="card-text">{{$pencil->Description}}</p>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$stationarys->links()}}
    </div>
    {{-- End IF User --}}
    @endif

    {{-- Admin --}}
    @if (Auth::user()->role == 'admin')
    <div class="container">
        <div class="row row-cols-3">
            @foreach ($stationarys as $pencil)
            <div class="card-group p-3">
                <div class="card">
                    <a href="{{ url('/detail/'.$pencil->Name)}}">
                        <img src="{{'storage/img/'.$pencil->Image}}" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$pencil->Name}}</h5>
                            <p class="card-text">{{$pencil->Description}}</p>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$stationarys->links()}}

    </div>
    {{-- Endif Admin --}}
    @endif

    @endguest
    @endsection

    </html>
