@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST" class="card">
  @csrf
  @method('PUT')
  <div class="card-body">
    @include('tasks.partials._form', ['task' => $task])
  </div>
  <div class="card-footer d-flex gap-2">
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
