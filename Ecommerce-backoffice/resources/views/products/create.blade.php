@extends('layouts.app')

@section('title', 'Create product - E-commerce Backoffice')

@section('page-title', 'Create product')

@section('page-description', " Here's you can create a new product.")

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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf

    <div class="mb-3">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" name="productName" id="productName"
               class="form-control"
               value="{{ old('productName') }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Product Description</label>
        <textarea name="description" id="description" rows="3"
                  class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="number" name="price" id="price"
                   class="form-control"
                   value="{{ old('price') }}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="quantity" class="form-label">Product Quantity</label>
            <input type="number" name="quantity" id="quantity"
                   class="form-control"
                   value="{{ old('quantity') }}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="category_id" class="form-label">Product Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->categoryName }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="images" class="form-label">Product Images</label>
        <input type="file" name="images[]" id="images"
               class="form-control" multiple>
        <small class="text-muted">You can upload multiple images</small>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Create Product</button>
</form>


@endsection
