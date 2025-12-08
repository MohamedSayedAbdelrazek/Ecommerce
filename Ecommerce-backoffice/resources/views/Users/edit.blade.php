@extends('layouts.app')

@section('title', 'Update User Role - E-commerce Backoffice')

@section('page-title', 'Update User Role')

@section('page-description', " Here's you can Update a user Role.")

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

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="role" class="form-label">User Role</label>
                <input type="text" name="role" id="role" class="form-control"
                    value="{{ old('role', $user->role) }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update User</button>
    </form>
@endsection
