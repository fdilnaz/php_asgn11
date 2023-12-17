@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Quantity: {{ $product->quantity }}</p>
    <p>Price: {{ $product->price }}</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
