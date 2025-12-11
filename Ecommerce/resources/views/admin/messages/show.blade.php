@extends('admin.layouts.app')

@section('title', 'View Message')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="{{ route('messages.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back to Messages
                </a>
            </div>
            <div class="d-flex gap-2">
                <!-- @TODO: Add reply functionality -->
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-success">
                    <i class="fas fa-envelope"></i> Reply
                </a>
                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <!-- Sender Info Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0"><i class="fas fa-user me-2"></i>Sender Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="text-muted small text-uppercase fw-bold">Name</label>
                            <p class="mb-0 fs-5">{{ $message->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small text-uppercase fw-bold">Email</label>
                            <p class="mb-0">
                                <a href="mailto:{{ $message->email }}" class="text-decoration-none">
                                    <i class="fas fa-envelope me-1 text-primary"></i>{{ $message->email }}
                                </a>
                            </p>
                        </div>
                        <div class="mb-0">
                            <label class="text-muted small text-uppercase fw-bold">Received</label>
                            <p class="mb-1">
                                <i class="fas fa-calendar me-1 text-secondary"></i>
                                {{ $message->created_at->format('M d, Y') }}
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-clock me-1 text-secondary"></i>
                                {{ $message->created_at->format('h:i A') }}
                                <span class="badge bg-info ms-2">{{ $message->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Content Card -->
            <div class="col-lg-8 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-white border-bottom">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope-open-text text-primary me-2 fs-5"></i>
                            <div>
                                <small class="text-muted">Subject</small>
                                <h5 class="mb-0">{{ $message->subject }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="text-muted small text-uppercase fw-bold mb-2">
                            <i class="fas fa-comment-dots me-1"></i> Message Content
                        </label>
                        <div class="border rounded p-4" style="background-color: #f8f9fa; min-height: 200px;">
                            <p class="mb-0 fs-6" style="white-space: pre-wrap; line-height: 1.8;">{{ $message->message }}
                            </p>
                        </div>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Message ID: #{{ $message->id }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
