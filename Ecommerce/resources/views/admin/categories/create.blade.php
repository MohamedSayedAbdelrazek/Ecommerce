@extends('admin.layouts.app')

@section('title', 'Create Category - E-commerce Backoffice')

@section('page-title', 'Create Category')

@section('page-description', "Create a new product category.")

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

    <form action="{{ route('categories.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
        <input type="text" name="categoryName" id="categoryName"
               class="form-control"
               value="{{ old('categoryName') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Category</button>
    </form>

@endsection
