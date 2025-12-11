@extends('admin.layouts.app')

@section('title', 'Update product - E-commerce Backoffice')

@section('page-title', 'Update product')

@section('page-description', " Here's you can Update a product.")

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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" name="productName" id="productName" class="form-control"
                value="{{ old('productName', $product->productName) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price) }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="quantity" class="form-label">Product Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control"
                    value="{{ old('quantity', $product->quantity) }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="category_id" class="form-label">Product Category</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->categoryName }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Product Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            <small class="text-muted">You can upload multiple images</small>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Product</button>
    </form>

    @if ($product->images->count() > 0)
        <div class="mb-3 mt-4">
            <h4>Current Images</h4>
            <div class="row">
                @foreach ($product->images as $image)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $image->imagePath) }}" class="card-img-top"
                                style="height: 200px; object-fit: contain; background: #fff;" alt="Product Image">
                            <div class="card-body text-center">
                                <form action="{{ route('products.destroyImage', [$product->id, $image->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


@endsection
