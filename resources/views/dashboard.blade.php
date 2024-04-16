@extends('layouts.app')

@section('content')

    <a class="" href="/clients/add"><button class="btn btn-primary float-end" type="button">+ Create Client</button></a>
    <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>
    <div class="row row-cols-1 row-cols-md-3 g-0">
        @foreach ($clients as $client)
            <div class="col">
                <div class="card text-center h-100 w-75 border-secondary">
                    <img src="{{ $client->company_logo }}" alt="" class="card-img-top">
                    <div class="card-body bg-light">
                        <h4 class-title>{{ $client->name }}</h4>
                        <p class="card-text">
                        <strong>{{ $client->email }}</strong> <br>
                        <strong>{{ $client->telephone }}</strong> <br>
                        <strong>{{ $client->address }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection