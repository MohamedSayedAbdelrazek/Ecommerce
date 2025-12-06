@extends('layouts.app')

@section('title', 'Edit Category - E-commerce Backoffice')

@section('page-title', 'Edit Category')

@section('page-description', "Edit category details.")

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="categoryName" class="form-label">Category Name</label>
        <input type="text" name="categoryName" id="categoryName"
               class="form-control"
               value="{{ old('categoryName', $category->categoryName) }}">
    </div>

    <button type="submit" class="btn btn-warning mt-3">Update Category</button>
</form>

@endsection
