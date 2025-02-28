@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product Category</h1>
    <form action="{{ route('productcategory.store') }}" method="POST">
        @csrf
        <label>Category Name</label>
        <input type="text" name="product_category_name" required class="form-control">
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection
