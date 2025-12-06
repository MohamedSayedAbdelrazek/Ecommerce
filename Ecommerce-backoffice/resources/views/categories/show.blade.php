@extends('layouts.app')

@section('title', 'Category Details - E-commerce Backoffice')

@section('page-title', 'Category Details')

@section('page-description', "View category details.")

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Category #{{ $category->id }}</h5>
            <div>
                 <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning btn-sm">Edit</a>
                 <a href="{{route('categories.index')}}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Category Name:</div>
                <div class="col-md-8">{{ $category->categoryName }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Created At:</div>
                <div class="col-md-8">{{ $category->created_at }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-4 fw-bold">Updated At:</div>
                <div class="col-md-8">{{ $category->updated_at }}</div>
            </div>
        </div>
    </div>

@endsection
