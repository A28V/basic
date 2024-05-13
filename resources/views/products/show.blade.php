@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>
    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <th>Color</th>
            <td>{{ $product->color->name }}</td>
        </tr>
        <tr>
            <th>Size</th>
            <td>{{ $product->size->name }}</td>
        </tr>
        @if($product->image)
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px;"></td>
            </tr>
        @endif
    </table>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
@endsection
