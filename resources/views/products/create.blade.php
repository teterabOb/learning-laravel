@extends('layouts.master')
@section('content')
    <h1>Create a product</h1>
    <form action="" method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="form-row">
            <label for="">Tittle</label>
            <input class="form-control" type="text" name="title" id="" required>
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input class="form-control" type="text" name="description" id="" required>
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" id="" 
            required>
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input class="form-control" type="number" min="0"  name="stock" id="" 
            required>
        </div>
        <div class="form-row">
        
            <label for="">Status</label>
            <select name="status"  class="custom-select" required>
                <option value="" selected>-- Select --</option>
                <option value="available" selected>Available</option>
                <option value="unavailable" selected>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>


    </form>
@endsection



