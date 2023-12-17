@extends('layouts.app')

@section('content')
    <h2>Add New Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <label for="name">Product Name:</label>
        <input type="text" name="name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>

        <button type="submit">Add Product</button>
    </form>
@endsection
