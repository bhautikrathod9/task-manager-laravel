@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Task #{{ $task->id }}</h1>
  <div>
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-primary">Edit</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h2 class="h4">{{ $task->title }}</h2>
    <p class="text-muted mb-2">
      Status:
      @if($task->status)
        <span class="badge bg-success">Completed</span>
      @else
        <span class="badge bg-secondary">Pending</span>
      @endif
    </p>
    <p class="mb-0" style="white-space: pre-wrap;">{{ $task->description }}</p>
  </div>
</div>
@endsection
