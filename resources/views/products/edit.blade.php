@extends('layouts.app')
@section('content')
    <h1>Edit a product</h1>

    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="">Tittle</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') ?? $product->title }}">
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input class="form-control" type="text" name="description"
                value="{{ old('description') ?? $product->description }}">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price"
                value="{{ old('price') ?? $product->price }}">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') ?? $product->stock }}">
        </div>
        <div class="form-row">
            <label for="">Status</label>
            <select name="status" class="custom-select">
                <option
                    {{ old('status') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }}
                    value="available">Available</option>
                <option
                    {{ old('status') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '') }}
                    value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
        </div>


    </form>
@endsection
