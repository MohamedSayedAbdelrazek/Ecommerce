@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Welcome to E-Shop!</h1>

        @foreach ($categories as $category)
            <h2>{{$category->categoryName}}</h2>
            <div class="row">
                @foreach ($category->products as $product)
                   <h6>{{$product->productName}}</h6>
                @endforeach
            </div>
        @endforeach


    </div>
@endsection

{{-- Optional sections --}}
@section('cart-count', '3')
@section('wishlist-count', '5')
@section('show-categories', true)

@section('extra-css')
    <style>/* Additional page-specific styles */</style>
@endsection

@section('extra-js')
    <script>// Additional page-specific scripts</script>
@endsection