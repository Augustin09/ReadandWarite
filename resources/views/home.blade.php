@extends('layouts.guest')

@section('guest')


<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ asset('css/content.css') }}">

<div class="container">
    {{-- Guest --}}
    @guest
    <div class="container">
        <div class="row row-cols-3">
            @if (count($products)>0)
            @foreach ($products as $p)
            <div class="card-group p-3">
                <div class="card">
                        <img src="{{'storage/img/'.$p->Image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$p->Name}}</h5>
                            <p class="card-text">{{$p->Description}}</p>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->links()}}
        @else
        <div class="text-danger">There is no product match with the keyword</div>
        @endif

    </div>

    {{-- Else Guest --}}
    @else
    {{-- User --}}

    @if (Auth::user()->role == 'user' )
    <div class="container">
        <div class="row row-cols-3">
            @if (count($products)>0)
            @foreach ($products as $p)
            <div class="card-group p-3">
                <div class="card">
                    <a href="{{ url('/detail/'.$p->Name) }}">
                        <img src="{{'storage/img/'.$p->Image}}" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$p->Name}}</h5>
                            <p class="card-text">{{$p->Description}}</p>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->links()}}
        @else
        <div class="text-danger">There is no product match with the keyword</div>
        @endif

    </div>
    {{-- End IF User --}}
    @endif

    {{-- Admin --}}
    @if (Auth::user()->role == 'admin')
    <div class="container">
    <a class="btn btn-primary" href="{{ url('/insert') }}" type="submit">Add New Stationary</a>
        <a class="btn btn-primary" href="{{ url('/createType') }}" type="submit">Add New Stationary Type</a>
        <a class="btn btn-primary" href="{{ url('/edit') }}" type="submit">Edit Stationary Type</a>
    </div>

    <div class="container">
        <div class="row row-cols-3">
            @if (count($products)>0)
            @foreach ($products as $p)
            <div class="card-group p-3">
                <div class="card">
                        <a href="{{ url('/detail/'.$p->Name)}}">
                            <img src="{{'storage/img/'.$p->Image}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$p->Name}}</h5>
                            <p class="card-text">{{$p->Description}}</p>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->links()}}
        @else
        <div class="text-danger">There is no product match with the keyword</div>
        @endif

    </div>
    {{-- Endif Admin --}}
    @endif

    @endguest
</div>

@endsection
