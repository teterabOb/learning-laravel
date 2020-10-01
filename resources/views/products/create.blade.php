@extends('layouts.master')
@section('content')
    <h1>Create a product</h1>
    <form action="" method="post" action="{{ route('products.store') }}" >
        @csrf
        <div class="form-row">
            <label for="">Tittle</label>
            <input class="form-control" type="text" name="title" id="" value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input class="form-control" type="text" name="description" id="" value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" id="" value="{{ old('price') }}">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input class="form-control" type="number" min="0"  name="stock" id="" value="{{ old('stock') }}">
        </div>
        <div class="form-row">
        
            <label for="">Status</label>
            <select name="status"  class="custom-select">
                <option value="0" selected>-- Select --</option>
                <option {{ old('status') == 'available' ? 'selected' : ''}} value="available" selected>Available</option>
                <option {{ old('status') == 'unavailable' ? 'selected' : ''}} value="unavailable" selected>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>


    </form>
@endsection



