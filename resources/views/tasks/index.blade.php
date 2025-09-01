@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Tasks</h1>
  <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ New Task</a>
</div>

<div class="row g-3 mb-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="fw-bold">Total</div>
        <div class="display-6">{{ $stats['total'] }}</div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="fw-bold">Completed</div>
        <div class="display-6">{{ $stats['completed'] }}</div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="fw-bold">Pending</div>
        <div class="display-6">{{ $stats['pending'] }}</div>
      </div>
    </div>
  </div>
</div>

@if ($tasks->count())
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Status</th>
          <th>Created</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $task)
          <tr>
            <td>{{ $task->id }}</td>
            <td>
              <a href="{{ route('tasks.show', $task) }}" class="text-decoration-none">
                {{ $task->title }}
              </a>
            </td>
            <td>
              @if($task->status)
                <span class="badge bg-success">Completed</span>
              @else
                <span class="badge bg-secondary">Pending</span>
              @endif
            </td>
            <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button class="btn btn-sm btn-outline-info">
                  {{ $task->status ? 'Mark Pending' : 'Mark Complete' }}
                </button>
              </form>

              <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">Edit</a>

              <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Delete this task?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ $tasks->links() }}
@else
  <div class="alert alert-light">No tasks yet. <a href="{{ route('tasks.create') }}">Create one</a>.</div>
@endif
@endsection
