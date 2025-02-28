@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product Category</h1>
    <form action="{{ route('productcategory.update', $category->product_category_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Category Name</label>
        <input type="text" name="product_category_name" value="{{ $category->product_category_name }}" required class="form-control">
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
