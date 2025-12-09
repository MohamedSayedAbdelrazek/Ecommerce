@extends('admin.layouts.app')

@section('title', 'Categories - E-commerce Backoffice')

@section('page-title', 'Categories Overview')

@section('page-description', "Manage your product categories.")

@section('content')

    <div class="mb-3">
    <a href="{{route('categories.create')}}" class="btn btn-secondary">
            <i class="bi bi-plus-circle"></i> Create Category
        </a>
    </div>

    <div class="table-card">
    @if(session('success'))
            <div class="alert alert-success">
            {{session('success')}}
            </div>
        @endif
        <h3>All Categories</h3>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->categoryName}}</td>
                    <td>{{$category->created_at}}</td>
                            <td class="d-flex gap-2">
                         <a href="{{route('categories.show', $category->id)}}"
                                    class="btn btn-primary btn-sm">Show</a>
                        <a href="{{route('categories.edit', $category->id)}}" 
                                    class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('categories.destroy', $category->id)}}"
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
                            <td colspan="4" class="text-center">No categories found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
