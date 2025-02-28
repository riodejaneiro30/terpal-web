@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 flex-grow">
    <h1>Product Categories</h1>
    <a href="{{ route('productcategory.create') }}" class="btn btn-primary">Add Category</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->product_category_name }}</td>
                    <td>
                        <a href="{{ route('productcategory.edit', $category->product_category_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('productcategory.destroy', $category->product_category_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
