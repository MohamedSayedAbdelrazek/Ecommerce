@extends('layouts.app')

@section('title', 'Users - E-commerce Backoffice')

@section('page-title', 'Users Overview')

@section('page-description', "Welcome back! Here you can manage your users.")

@section('content')

 
 <div class="table-card">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <h3>All Users</h3>
    <div class="table-responsive">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ?? 'User'}}</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>{{$user->created_at->format('M d, Y')}}</td>
                    <td class="d-flex gap-2">
                        <a href="{{route('users.show', $user->id)}}"
                             class="btn btn-primary btn-sm">Show</a>

                        <a href="{{route('users.edit', $user->id)}}" 
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('users.destroy', $user->id)}}"method="POST" 
                             onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-inline">Delete</button>
                        </form>
                    </td>
                </tr>
                    
                @empty 
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
                @endforelse

            </tbody>
        </div>
    </div>
 </div>
        
        
            


@endsection