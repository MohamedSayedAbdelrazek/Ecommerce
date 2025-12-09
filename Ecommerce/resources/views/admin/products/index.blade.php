 @extends('admin.layouts.app')

 @section('title', 'Products - E-commerce Backoffice')

 @section('page-title', 'Products Overview')

 @section('page-description', "Welcome back! Here's You can manage your products.")

 @section('content')


     <div class="mb-3">
    <a href="{{route('products.create')}}" class="btn btn-secondary">
             <i class="bi bi-plus-circle"></i> add product
         </a>
     </div>

     <div class="table-card">
    @if(session('success'))
             <div class="alert alert-success">
            {{session('success')}}
             </div>
         @endif
         <h3>All Products</h3>
         <div class="table-responsive">
             <table class="custom-table">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>description</th>
                         <th>price</th>
                         <th>quantity</th>
                         <th>category</th>
                         <th>created at</th>
                         <th>actions</th>
                         </th>
                 </thead>
                 <tbody>
                     @forelse($products as $product)
                         <tr>
                    <td>{{$product->productName}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category->categoryName}}</td>
                    <td>{{$product->created_at}}</td>
                             <td class="d-flex gap-2">
                        <a href="{{route('products.show', $product->id)}}"
                             class="btn btn-primary btn-sm">Show</a>

                        <a href="{{route('products.edit', $product->id)}}" 
                                     class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('products.destroy', $product->id)}}"
                             method="POST" 
                                     onsubmit="return confirm('Are you sure?')">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm d-inline">Delete</button>
                                 </form>
                             </td>
                         </tr>

                     @empty
                         <tr>
                             <td colspan="6" class="text-center">No products found</td>
                         </tr>
                     @endforelse

                 </tbody>
         </div>
     </div>
     </div>





 @endsection