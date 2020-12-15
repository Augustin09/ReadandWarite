@extends('layouts.guest')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title','Dictionary Stationary')</title>
</head>


<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@section('guest')
{{-- Welcome Guest Berdasarkan kategori  --}}
    @guest
    <div class="container">
        <div class="row row-cols-3">
            @foreach ($stationarys as $dictionary)
            <div class="card-group p-3">
                <div class="card">
                        <img src="{{'storage/img/'.$dictionary->Image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$dictionary->Name}}</h5>
                            <p class="card-text">{{$dictionary->Description}}</p>
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
            @foreach ($stationarys as $dictionary)
            <div class="card-group p-3">
                <div class="card">
                    <a href="{{ url('/detail/'.$dictionary->Name)}}">
                        <img src="{{'storage/img/'.$dictionary->Image}}" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$dictionary->Name}}</h5>
                            <p class="card-text">{{$dictionary->Description}}</p>
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
            @foreach ($stationarys as $dictionary)
            <div class="card-group p-3">
                <div class="card">
                    <a href="{{ url('/detail/'.$dictionary->Name)}}">
                        <img src="{{'storage/img/'.$dictionary->Image}}" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$dictionary->Name}}</h5>
                            <p class="card-text">{{$dictionary->Description}}</p>
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
